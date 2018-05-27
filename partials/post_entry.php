<?php 
require_once 'database.php';
require_once 'session_start.php';
header('Location: ../main.php');
$_SESSION["journal_title"] = $_POST['journal_title'];




$userID = $_SESSION["user"]["userID"];


if(isset($_POST['save'])){
    $statement = $pdo->prepare("INSERT INTO entries 
    (entryID, title, content, createdAt, userID) 
    VALUES (NULL, :title, :content, NOW(), '{$userID}')");
   $statement->execute([":title" => $_POST["title"], ":content" => $_POST["content"]]);
   echo "EntryID: " . $_SESSION['entryID'] . "<br/>";
   echo "Title: " . $_POST['journal_title'] . "<br/>";
   echo "TextArea: " . $_POST['journal_area'] . "<br/>";
   echo "Date: " . $_POST['journal_date'] . "<br/>";
   echo "UserID: " . $_SESSION['user_id'];
  
   // header('Location: /journal.php'); 
    $_SESSION['msg'] = "Successfully saved..";
}

    

?>