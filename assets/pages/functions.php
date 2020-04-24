<?php

function ConnectToDatabase() {

$host = "localhost";
$username = "root";
$password = "mysql";
$database = "clubactiviteiten";
//With this try catch statement connect.php tries to make a connection by logging into the database
// A PDO is a connection with a database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;", "$username", "$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $err){
    die("something went wrong in the database". $err);
}

}
//$stmt stands for statement here below is the mysql querry that orders the items by name
function PrepareStatementGames() {
$pdo = ConnectToDatabase();
$stmt = $pdo->prepare("SELECT * FROM games ORDER BY name ");
$stmt->execute();

$result = $stmt->fetchall();

$pdo = null;

return $result;
}

function PrepareStatementPlanning() {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM planning ORDER BY date ");
    $stmt->execute();
    
    $result = $stmt->fetchall();
    
    $pdo = null;
    
    return $result;
    }

function PrepareStatementDetails(){
$pdo = ConnectToDatabase();
$name = $_GET['name'];

$stmt = $pdo->prepare("SELECT * FROM games WHERE name =?");
$stmt->execute([$name]);

$result = $stmt -> fetch();

$pdo = null;

return $result;
}
?>