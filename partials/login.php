<?php
require_once 'session_start.php';
$pdo = new PDO(
    "mysql:host=localhost:3306;dbname=journal;charset=utf8",
    "root",  //username
    "root", // password
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );

$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->execute([
  "username" => $_POST["username"]
]);

$user = $statement->fetch();

if(password_verify($_POST["password"], $user["password"])){
    header('Location: /index.php');

    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["user_id"] = $user["userID"];

}else{
    header('Location: /index.php?message=login failed');
}

?>