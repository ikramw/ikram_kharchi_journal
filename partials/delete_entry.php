<?php 

require_once 'session_start.php';
require_once "../classes/entry.php";
require_once 'database.php';

$statement = $pdo->prepare("DELETE FROM entries 
WHERE 
 	entryID = :entryId");
$statement->execute(["entryId" => $_POST["entry-id"]]);

$_SESSION['msg'] = "Successfully deleted..";
header('Location: /main.php');

?>