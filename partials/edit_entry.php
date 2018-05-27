<?php

require_once 'session_start.php';

header('Location: ../main.php');
require_once 'database.php';

$entryID = $_SESSION['entryID'];
$statement = $pdo->prepare("UPDATE entries 
    SET title = :title, 
    content = :content 
    WHERE entries. `entryID` = :entryId");
$statement->execute([":title" => $_POST["edit-title"], 
":content" => $_POST["edit-content"], ":entryId" => $_POST["edit-entry-id"]]);
       
$_SESSION['msg'] = "Successfully updated..";

