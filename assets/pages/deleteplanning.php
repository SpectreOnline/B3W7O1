<?php 
require_once("functions.php");

$id = $_GET['id'];

try{
$pdo = ConnectToDatabase();
$stmt = $pdo->prepare("DELETE FROM planning WHERE id = $id");
$stmt->execute();

$pdo = NULL;
} catch (Exception $e) {
    echo "Something went wrong: ".$e->getMessage();
}

header("Location: ../../planning.php");

?>