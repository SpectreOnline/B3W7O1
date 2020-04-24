<?php 
require_once("functions.php");



$game = sanitizeData($_POST["planning_game"]);
$date = $_POST["planning_date"];
$explainer = sanitizeData($_POST["planning_explainer"]);


// $valid_game = validateGame($game);
// //$valid_date = validateDate($date);
// $valid_explainer = validateExplainer($explainer);

if($game != NULL && $date != NULL && $explainer != NULL) {
    try {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("INSERT INTO planning (game, `date`, explainer)
    VALUES
    (:game, :date, :explainer)"
    );
    $stmt->bindParam(":game", $game);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":explainer", $explainer);
    $stmt->execute();
    
    $pdo = NULL;

    header("Location: ../../planning.php");
} catch (Exception $e) {
    echo "Something went wrong: ".$e->getMessage();
}
}

function sanitizeData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}

// function validateGame($game) {
//     $isValid = FALSE;
//     if ($game != NULL && $game != "") {
//         if (preg_match("/^[a-zA-Z]*$/",$game)){
//         $isValid = TRUE;
//     }
// }
//     return $isValid;
// }


// function validateExplainer($explainer) {
//     $isValid = FALSE;
//     if ($explainer != NULL && $explainer != "") {
//         if (preg_match("/^[a-zA-Z]*$/",$explainer)){
//         $isValid = TRUE;
//     }
// }
//     return $isValid;
// }
?>