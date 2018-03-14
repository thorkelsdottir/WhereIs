<?php
 //Database
    include('Database.class.php');
    $GLOBALS['gdb'] = Database::getInstance();
    include('pages.class.php');
    include('cards.class.php');
    include('review.class.php');
 ?>
