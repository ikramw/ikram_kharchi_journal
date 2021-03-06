<?php   require_once "partials/header.php"; 
        require_once "classes/entry.php";
        require_once 'partials/database.php'; 
        require_once 'partials/timeout.php';     
       

    ?>


<!-- Alert Dialog -->
<?php if(isset($_SESSION['msg'])):?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div> 

<?php endif ?>


<main class="container">
    
    <section class="jornal_form content"> <!-- Section Journal Entries -->
        <h1 class="saved_articles">Create Entry</h1>
        <form class="form" action='./partials/get_all_entries.php' method='POST'>

            <label for="journal_title" >Title</label> <!-- Title -->
            <input type="text" name ="journal_title" value= "" 
                    id="journal_title"  
                    placeholder="Journal Title.." required autofocus> <!-- Title -->
            
            <label for="journal_area" >Journal:</label>  <!-- Journal annotation -->
            <textarea  name="journal_area" id="journal_area" 
                    placeholder="Write you journal here.." required autofocus></textarea>  <!-- Journal annotation -->

            <label for="journal_date" >Date:</label>  <!-- Date -->
            <input type="date" name="journal_date" value="<?php echo $date[0]?>" 
                    placeholder="yyyy/mm/dd" required autofocus/>  <!-- Date -->

            <div class="signin_btn"> <!-- Save/Logout button -->
                <button id="logout"class="submit-button" type="button">
                    <a href='partials/logout.php'>Logout here</a>
                </button>    
              
                <input class="submit-button" name="save" value="Save" type="submit">             
                  
                
            </div> <!-- Save/Logout button -->
            

        </form>
    </section><!-- Section Journal Entries -->
    <hr>
    


    <br/>
    <section > <!-- Section Journals from database -->
        <article class="saved_journal content" id="db_articles">
            <h1 class="saved_articles">Saved Articles</h1>
            <div class="journal_container">
                <?php
                $statement = $pdo->prepare("SELECT * FROM entries WHERE userID = :user_id 
                                            ORDER BY createdAt");
                $statement->execute([
                    ":user_id" => $_SESSION['user_id']
                ]);

                $entries = $statement->fetchAll();
                $journalsList = array();

                foreach ($entries as $entry): ?>
                <div class="post">
                   <div class="form">
                      <h2><?= $entry['title']; ?></h2>
                      <p><?= $entry['content']; ?></p>
                      <form action="partials/delete_entry.php" method="post">
                         <input type="hidden" name="entry-id" value="<?= $entry['entryID']; ?>">
                         <div class="button-div">
                            <div><button class="submit-button" type="submit" name="delete">Delete</button></div>
                      </form>
                      
                      <div><a class="submit-button"  href="partials/edit_page.php?postID=<?=$entry['entryID']?>">Edit</a></div>
                      </div>
                      <form action="partials/edit_page.php?postID=<?=$entry['entryID']?>" method="post">
                         <input type="hidden" name="entry-id" value="<?= $entry['entryID']; ?>">
                         <div class="button-div">
                            
                      </form>
                      
                   </div>
                </div>
                <?php 
                   endforeach;
                   ?>      
                                
            </div>
        </article>


    </section>
    

</main>



