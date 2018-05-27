<?php require_once 'partials/header.php';?>


   <?php if (!isset($_SESSION["loggedIn"])): ?> 
      <div class="content-login content">
         <form action="partials/login.php" method="POST">
            User name<br>
            <input type="text" name="username">
            <br>
            Password<br>
            <input type="password" name="password">
            <br><br>
            <input class="submit-button" type="submit" value="Logga in">
         </form>
      </div>
      <div class="content-register content">
         <form action="partials/register.php" method="POST">
            User name<br>
            <input type="text" name="username">
            <br>
            Password<br>
            <input type="password" name="password">
            <br><br>
            <input class="submit-button" type="submit" value="Register">
         </form>
    <?php else : header('Location: /main.php'); ?>   

    <?php endif; ?>
   </body>
