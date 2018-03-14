<?php
	session_start();
	include('functions.php');
	include('authentication.php');

	//Check if user is logged in
	function loginCheck(){
		if($_SESSION['isLoggedin'] == false){
			header('Location: login.php');
		}
	}
	//Log out and destroy session
	if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
		$_SESSION['isLoggedin'] = false; //mætti sleppa þessu því við erum með unset og destroy
		//remove all session variables
		session_unset();
		//destroy the session
		session_destroy();
	}
	
	//ErrorMessage in logIn
	define('LOGINERROR', 'Username or Password is wrong!', false);
	define('LOGINEMPTY', 'Username or Password is empty!', false);

	//SideBar
	$navItems = array(
		array('Dashboard','dashboard.php'),
		array('Categorys','categorys.php'),
		array('Pages','pages.php'),
		array('Reviews','review.php'),
		array('Users','users.php'),
		array('Log Out','login.php?logout=true') );
	function createNavigation($nav){
		if($nav == 'mainNav'){
			$navArr = $GLOBALS['navItems'];
			$className = 'main';
			$navBarRight = '';
		}
		echo '<ul class="nav navbar-nav '.$navBarRight.' '.$className.'-nav">';
		foreach($navArr as $key => $value) {
			echo '<a href="'.$value[1].'"><li>'.$value[0].'</li></a>';
		}
		echo '</ul>';
	}
?>