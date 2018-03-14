<?php
	function loginUserCheck($username, $password){
		$db = $GLOBALS['gdb'];
		$mysqli = $db->getConnection();

		$stmt = $mysqli->prepare("SELECT username, password FROM User");
    	$stmt->execute();
    	$stmt->bind_result($_username, $_password);
    	while ($stmt->fetch()) {
    		if($username ==  $_username && $password == $_password){
    			$_SESSION['isLoggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: ./dashboard.php');
    			break;
    		}
    		else{
    			header('Location: ./login.php?login=denied');
    		}
    	}
    	$stmt->close();
    	$mysqli->close();
	}

	//Check if username & password is empty
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		loginUserCheck($username, $password);
	}
?>