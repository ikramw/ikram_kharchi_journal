
<?php

require_once 'database.php';

$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $pdo->prepare("INSERT INTO users (username, password)
                            VALUES (:username, :password)"
);
$statement_status =  $statement->execute([
  ":username" => $_POST["username"], 
  ":password" => $hashed
]);

if($statement_status){
  header('Location: /index.php?message=Successfully Registered!');
}else{
  header('Location: /index.php?message=Register Failed!');
}
