<?php

session_start();
session_destroy();

echo "<h1>Logout Successfully!!</h1>";

header('Location: /index.php');

?>