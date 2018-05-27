<?php require_once 'partials/header.php';?>


   <?php if (!isset($_SESSION["loggedIn"])): ?> 
      <div class="content-login content">
         <form action="partials/login.php" method="POST">
            Användarnamn<br>
            <input type="text" name="username">
            <br>
            Lösenord<br>
            <input type="password" name="password">
            <br><br>
            <input class="submit-button" type="submit" value="Logga in">
            <input class="submit-button" type="submit" value="Register">
         </form>
      </div>
      
    <?php else : header('Location: /main.php'); ?>   

    <?php endif; ?>
   </body>
