<?php
require_once 'header.php';

require_once 'database.php';


$entry = $_GET["postID"];
$statement = $pdo->prepare("SELECT * FROM entries
      WHERE entryID = :entryID");
$statement->execute(["entryID" => $entry]);
$post = $statement->fetch();

// fills the form with previous data so the user can edit it.

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <title>PHP</title>
   </head>
   <body>
      <div class="content">
         <h1>Edit blog</h1>
         <form action="edit_entry.php" method="POST">
         <input type="hidden" name="entry-id" value="<?= $entry['entryID']; ?>">
            Titel<br>
            <input type="text" name="edit-title" value=<?= $post["title"]?>>
            <br>
            Text<br>
            <textarea class="form-field" name="edit-content" id="content" maxlength="999" cols="30" rows="10" placeholder="Write here"><?= $post["content"] ?></textarea>
            <br><br>
            <input type="hidden" name="edit-entry-id" value="<?= $post['entryID']; ?>">
            <div class="button-div">
               <div><input class="submit-button" type="submit" value="Submit"></div>
         </form>
         <div><a class="submit-button" href="../main.php?postID=<?=$post['entryID']?>">Tillbaka</a></div>
         </div>
      </div>
   </body>
</html>
