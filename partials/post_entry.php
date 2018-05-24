<?php 
$pdo = new PDO(
    "mysql:host=localhost:3306;dbname=journal;charset=utf8",
    "root",  //username
    "root", // password
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
require_once 'session_start.php';

$_SESSION["journal_title"] = $_POST['journal_title'];



echo "EntryID: " . $_SESSION['entryID'] . "<br/>";
echo "Title: " . $_POST['journal_title'] . "<br/>";
echo "TextArea: " . $_POST['journal_area'] . "<br/>";
echo "Date: " . $_POST['journal_date'] . "<br/>";
echo "UserID: " . $_SESSION['user_id'];

if(isset($_POST['save'])){
    $statement = $pdo->prepare("INSERT INTO entries (entryID, title, content, createdAt, userID) 
    VALUES (NULL, :title, :content, :created, :userId);");

    $statement->execute([
        ":title" =>     $_POST['journal_title'],
        ":content" =>   $_POST['journal_area'],
        ":created" =>   $_POST['journal_date'],
        ":userId" =>    $_SESSION['user_id']
    ]);
   // header('Location: /journal.php'); 
    $_SESSION['msg'] = "Successfully saved..";
}

    

?>