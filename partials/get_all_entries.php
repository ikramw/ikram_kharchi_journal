<?php   require_once "partials/journal_head.php"; 
        require_once "classes/entry.php";
        require_once 'partials/database.php';
       
        require_once 'partials/session_timeout.php';
        
    ?>

    <h1 class="journal_title">My Journal</h1>    



<main class="container">
    
    <section class="jornal_form"> 
        <h1 class="saved_articles">Create Entry</h1>
        <form action='./partials/post_entrty.php' method='POST'>

            <label for="journal_title" >Username</label> <!-- Title -->
            <input type="text" name ="journal_title" value= "<?php echo $record['title'] ?>" 
                    id="journal_title" class="form-control" 
                    placeholder="Journal Title.." required autofocus> <!-- Title -->
            
            <label for="journal_area" >Journal:</label>  
            <textarea class="form-control" name="journal_area" id="journal_area" 
                    placeholder="Write you journal here.." rows="4" required autofocus><?php echo $record['content'] ?></textarea>  <!-- Journal annotation -->

            <label for="journal_date" >Date:</label>  <!-- Date -->
            <input type="date" class="form-control" name="journal_date" value="<?php echo $date[0]?>" 
                    placeholder="yyyy/mm/dd" required autofocus/>  <!-- Date -->

            <div class="signin_btn"> <!-- Save/Logout button -->
                <button id="logout" class="btn btn-warning" type="button">
                    <a href='logout.php'>Logout here</a>
                </button>    

                <?php if($edit_state == false): ?>
                    <input class="btn btn-lg btn-primary" name="save" value="Save" type="submit">
                <?php else: ?>
                    <input class="btn btn-lg btn-primary" name="update" value="Update" type="submit">
                <?php endif ?>

                   
                
            </div> <!-- Save/Logout button -->
            

        </form>
    </section><!-- Section Journal Entries -->
    <hr>
    


    <br/>
    <section> <!-- Section Journals from database -->
        <article class="saved_journal" id="db_articles">
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

                foreach ($entries as $entry) {
                    $date = explode(" ",$entry["createdAt"]);
                    $journal = new Entries(
                                        $entry["entryID"], 
                                        $entry["title"], 
                                        $entry["content"], 
                                        $date[0],
                                        $entry["userID"]
                                        );
                        array_push($journalsList, $journal);
                        echo $journal-> createCardElement();                    
                }          
                
                ?>
            </div>
        </article>


    </section>
    

</main>



<?php require_once "partials/footer.php";  ?>