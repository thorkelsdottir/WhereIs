<?php 
	include('includes/config.php');
	
	if($isLoggedIn) {
		header('Location: dashboard.php');		
	} else {
		header('Location: login.php');	
	}
?>