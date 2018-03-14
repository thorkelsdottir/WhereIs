<?php
  //Database
	include('Database.class.php');
	$GLOBALS['gdb'] = Database::getInstance();

	include('user.class.php');
	include('category.class.php');
	include('page.class.php');
	include('review.class.php');
?>