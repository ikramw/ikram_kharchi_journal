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
