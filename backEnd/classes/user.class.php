<?php
class User {
	private $_db;
	private $_mysqli;

	public function createUsers($fullName, $email, $phoneNumber, $userName, $passWord, $pagehasuser) {
	 	// Connecting to Database
		$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	 	// prepare and bind
	 	$stmt = $mysqli->prepare("INSERT INTO PhoneNumber(phoneNumber) VALUES (?)");
	    $stmt->bind_param("s", $phoneNumber);
	    $stmt->execute();
	    $stmt = $mysqli->prepare("SELECT phoneNumberID FROM PhoneNumber WHERE phoneNumber='$phoneNumber'");
    	$stmt->execute();
    	$stmt->bind_result($phoneNumberID);
    	while (mysqli_stmt_fetch($stmt)) {
    		error_log($phoneNumberID);
    	}
    	
	 	$stmt = $mysqli->prepare("INSERT INTO User(fullName, email, userName, passWord, phoneNumberID) VALUES (?,?,?,?,?)");
	 	$stmt->bind_param("ssssi", $fullName, $email, $userName, $passWord, $phoneNumberID);
	 	$stmt->execute();
	 	$stmt = $mysqli->prepare("SELECT userID FROM User WHERE fullName='$fullName'");
    	$stmt->execute();
	 	$stmt->bind_result($userID);
    	while (mysqli_stmt_fetch($stmt)) {
    		error_log($userID);
    	}
	 	
	 	$stmt = $mysqli->prepare("INSERT INTO PageHasUser(userID, pageID) VALUES (?,?)");
	 	$stmt->bind_param("ii", $userID, $pagehasuser);
	 	$stmt->execute();

	 	/* Close connection */
	 	$stmt->close();
	  	header('Location: ./users.php');
	}

	public function getAllUsers() {
		// Connecting to Database
	   	$db = $GLOBALS['gdb'];
	   	$mysqli = $db->getConnection();

	  	$stmt = $mysqli->prepare("SELECT User.userID, User.username, User.fullName, User.email, PhoneNumber.PhoneNumber FROM User INNER JOIN PhoneNumber ON User.phoneNumberID=PhoneNumber.phoneNumberID");
	    $stmt->execute();
	    $stmt->bind_result($userid, $username, $fullName, $email, $phoneNumber);

	    while (mysqli_stmt_fetch($stmt)) {
	    	echo '<tr>';
	    		echo '<th scope="row">' .$userid. '<td>' .$username. '</td> <td>' . $fullName.'</td> <td>' .$email.'</td> <td>' . $phoneNumber.'</td> <td> <a class="btn btn-primary btn-sm m-r-1" href="edituser.php?edit=true&userid='.$userid.'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> <a class="btn btn-danger btn-sm" href="users.php?delete=true&userID='.$userid.'"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>';
	      	echo '</tr>';
	    }
        
	   /* Close connection */
	   $stmt->close();
	}
	public function getUserById($userid) {
	   // Connecting to Database
	   $db = $GLOBALS['gdb'];
	   $mysqli = $db->getConnection();

	  	// prepare and bind
	  	$stmt = $mysqli->prepare("SELECT User.fullName, User.email, PhoneNumber.phoneNumber, User.username, PageHasUser.pageID FROM User INNER JOIN PhoneNumber ON User.phoneNumberID=PhoneNumber.phoneNumberID INNER JOIN PageHasUser ON User.userID=PageHasUser.userID WHERE User.userID = ?");
	    $stmt->bind_param('i', $userid);
	    $stmt->execute();
	    $stmt->bind_result($fullname, $email, $phonenumber, $username, $pagehasuser);

	    $userArr;
	    while ($stmt->fetch()) {
	      $userArr['fullname'] = $fullname;
	      $userArr['email'] = $email;
	      $userArr['phonenumber'] = $phonenumber;
	      $userArr['username'] = $username;
	      $userArr['category'] = $pagehasuser;
	    }

	   // Close connection
	   $stmt->close();
	   return $userArr;
	}

	public function updateUser($userid, $fullName, $email, $phoneNumber, $username, $pagehasuser) {
		// Connecting to Database
	  	$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	  	// prepare and bind
	  	$stmt = $mysqli->prepare("UPDATE User INNER JOIN PhoneNumber ON User.phoneNumberID=PhoneNumber.phoneNumberID INNER JOIN PageHasUser ON User.userID=PageHasUser.userID SET User.fullName=?, User.email=?, User.username=?, PhoneNumber.phoneNumber=?, PageHasUser.pageID=? WHERE User.userID=?");
	  	$stmt->bind_param("ssssii", $fullName, $email, $username, $phoneNumber, $pagehasuser, $userid);
	  	$stmt->execute();

	  	// Close connection
	  	$stmt->close();
	}

	public function deleteUser($userid) {
  		// Connecting to Database
		$db = $GLOBALS['gdb'];
		$mysqli = $db->getConnection();
		// prepare and bind
		$stmt = $mysqli->prepare("DELETE PageHasUser FROM PageHasUser WHERE PageHasUser.userID=?");
		$stmt->bind_param("i", $userid);
	  	$stmt->execute();
	  	$stmt = $mysqli->prepare("DELETE User, PhoneNumber FROM User INNER JOIN PhoneNumber ON User.phoneNumberID=PhoneNumber.phoneNumberID WHERE User.userID=?");
	  	$stmt->bind_param("i", $userid);
	  	$stmt->execute();

	  	// Close connection
	  	$stmt->close();
	  	//$mysqli->close();
	}
}
?>