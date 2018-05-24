<?php

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    
    session_unset();     
    session_destroy();  
    header('location: /index.php?logout=Session is timed out, login again!');  
}

$_SESSION['LAST_ACTIVITY'] = time(); 