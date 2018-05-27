<?php
   require_once 'partials/header.php';
   require_once 'partials/database.php';
  // require_once 'partials/timeout.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Playfair+Display" rel="stylesheet">
      <title>PHP</title>
   </head>
   <body>
      <div class="content">
         <h1 class="header"> Journal</h1>
         <div class="form">
            <form action="partials/create_post.php" method="POST">
               <br>
               <span class="header">Titel</span><br>
               <input type="text" name="title">
               <br>
               <span class="header">Text</span><br>
               <textarea name="content" maxlength="999" cols="30" rows="10"></textarea>
               <br><br>
               <div><input class="submit-logout-button" type="submit" value="Submit"></div>
            </form>
            <div><a class="submit-logout-button" href="partials/logout.php">Logga ut</a></div>
         </div>
        
         <?php
            $statement = $db->prepare(
              "SELECT * FROM entries 
              WHERE userID = :userID"
            );
            $statement->execute([
              ":userID" => $_SESSION["user"]["userID"]
            ]);
            
            $entries = $statement->fetchAll();
            
            foreach ($entries as $entry): ?>
         <div class="post">
            <div class="form">
               <h2><?= $entry['title']; ?></h2>
               <p><?= $entry['content']; ?></p>
               <form action="partials/delete_post.php" method="post">
                  <input type="hidden" name="entry-id" value="<?= $entry['entryID']; ?>">
                  <div class="button-div">
                     <div><button class="change-delete-button" type="submit" name="delete">Radera</button></div>
               </form>
               <div><a class="change-delete-button" href="partials/edit_page.php?postID=<?=$entry['entryID']?>">Ändra</a></div>
               </div>
            </div>
         </div>
         <?php 
            endforeach;
            ?>
      </div>
   </body>
</html>