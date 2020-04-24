<?php
require_once("functions.php");

$id = $_GET['id'];

$game = sanitizeData($_POST["planning_name"]);
$date = $_POST["planning_date"];
$explainer = sanitizeData($_POST["planning_explainer"]);



if($game != NULL && $date != NULL && $explainer != NULL) {
    try {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("UPDATE planning SET game = :game, `date` = :date, explainer = :explainer WHERE id = :id");
    $stmt->bindParam(":game", $game);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":explainer", $explainer);
    $stmt->bindParam(":id", $id);
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

?>