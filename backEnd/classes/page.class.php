<?php
class Page {
	private $_db;
	private $_mysqli;

	public function createCard($cardName, $cardAddress, $cardPhoneNumber, $cardDesc, $cardPic, $cardWebside, $cardLocationLat, $cardLocationLon, $cardCategoryID) {
	 	// Connecting to Database
		$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	 	// prepare and bind
	 	$stmt = $mysqli->prepare("INSERT INTO PhoneNumber(phoneNumber) VALUES (?)");
		$stmt->bind_param("s", $cardPhoneNumber);
		$stmt->execute();
		$stmt = $mysqli->prepare("INSERT INTO Description (title, picture, description) VALUE (?,?,?);");
		$stmt->bind_param("sss", $cardName, $cardPic, $cardDesc);
		$stmt->execute();

		$stmt = $mysqli->prepare("SELECT phoneNumberID FROM PhoneNumber WHERE phoneNumber='$cardPhoneNumber'");
    	$stmt->execute();
    	$stmt->bind_result($cardPhoneNumberID);
    	while (mysqli_stmt_fetch($stmt)) {
    		error_log($cardPhoneNumberID);
    	}
    	$stmt = $mysqli->prepare("SELECT descriptionID FROM Description WHERE title='$cardName'"); 	
    	$stmt->execute();
    	$stmt->bind_result($cardDescriptionID);
    	while (mysqli_stmt_fetch($stmt)) {
    		error_log($cardDescriptionID);
    	}

    	$stmt = $mysqli->prepare("INSERT INTO Card(PhoneNumberID, descriptionID, pageID, location, locationLat, locationLong, sideUrl) VALUES (?,?,?,?,?,?,?)");
    	$stmt->bind_param("iiissss", $cardPhoneNumberID, $cardDescriptionID, $cardCategoryID, $cardAddress, $cardLocationLat, $cardLocationLon, $cardWebside);
	 	$stmt->execute();

	 	$stmt->close();
	  	header('Location: ./pages.php');
	}
	
	public function getAllPages() {
		// Connecting to Database
	   	$db = $GLOBALS['gdb'];
	   	$mysqli = $db->getConnection();

	    $stmt = $mysqli->prepare("SELECT title, id , picture, color, cardid, pageid FROM Description INNER JOIN (SELECT descriptionID AS id,0 as color, cardID as cardid, pageID as pageid FROM Card UNION SELECT descriptionID AS id, color, 0 as cardid, pageID as pageid FROM Category) AS k ON Description.descriptionID=k.id");
	    $stmt->execute();
	    $stmt->bind_result($title, $descID, $categoryIcon, $categoryColor, $cardid, $categoryid);
	    
	    while (mysqli_stmt_fetch($stmt)) {
	    	$stuff = (object)'';
	    	$stuff->title = $title;
	    	$stuff->descID = $descID;
	    	$stuff->color = $categoryColor;
	    	$stuff->icon = $categoryIcon;
	    	$stuff->cardID = $cardid;
	    	$stuff->categoryID = $categoryid;

	    	$myArray[] = $stuff;
	    }
	    //var_dump($myArray);
	    $length = count($myArray);
	    for($i= 0 ; $i< $length; $i++){
	    	if($myArray[$i]->color !== '0'){
	    		echo '<div class="pageCategoryBox">';
		    	echo '<div class="pageCategoryName" style="border-bottom: 10px solid #'.$myArray[$i]->color.'">';
	            	echo '<img class="pageIconSize" src="images/'.$myArray[$i]->icon.'" style="fill: #000;">';
	            	echo '<p>'.$myArray[$i]->title.'</p> <div class="hamburger-menu pull-right"> <div class="bar"></div> </div></div>';
	            echo '<div class="pageCategoryBody">';
	            echo '<ol>';
	    		for($j= 0 ; $j< $length; $j++){
	    			if($myArray[$j]->color == '0' && $myArray[$i]->color !== '0' && $myArray[$i]->categoryID==$myArray[$j]->categoryID){
	            		echo '<li><div class="pageCategoryBodyLi"><p>'.$myArray[$j]->title.'</p> <div class="editDeletePage"><a class="btn btn-primary btn-sm m-r-1" href="editpage.php?editpage=true&pageid='.$myArray[$j]->cardID.'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> <a class="btn btn-danger btn-sm" href="pages.php?delete=true&cardID='.$myArray[$j]->cardID.'"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </div></div></li>';
	            	}
	    		}
	    		echo '</ol>';
	    		echo '<button class="createCardButton" style="background-color: #'.$myArray[$i]->color.'; border: 0px; color: #fff;" data-categoryid="'.$myArray[$i]->categoryID.'">Add Page</button> </div>';
	    		echo '</div>';
	    	}
	    }
	   	/* Close connection */
	   	$stmt->close();
	}

	public function getPageById($pageid) {
	   // Connecting to Database
	   $db = $GLOBALS['gdb'];
	   $mysqli = $db->getConnection();
	  	// prepare and bind
	  	$stmt = $mysqli->prepare("SELECT Card.cardID, Card.location, Card.sideUrl, Card.locationLat, Card.locationLong, Description.title, Description.description, Description.picture, PhoneNumber.phoneNumber From Card INNER JOIN Description ON Card.descriptionID=Description.descriptionID INNER JOIN PhoneNumber ON Card.phoneNumberID=PhoneNumber.phoneNumberID WHERE Card.cardID = ?");
	    $stmt->bind_param('i', $pageid);
	    $stmt->execute();
	    $stmt->bind_result($cardID, $cardAddress, $cardUrl, $cardLat, $cardLong, $cardName, $cardDesc, $cardPic, $phoneNumber);

	    $cardArr;
	    while ($stmt->fetch()) {
	    	$cardArr['cardid'] = $cardID;
			$cardArr['cardname'] = $cardName;
			$cardArr['cardaddress'] = $cardAddress;
			$cardArr['cardphoneNumber'] = $phoneNumber;
			$cardArr['carddescription'] = $cardDesc;
			$cardArr['cardPic'] = $cardPic;
			$cardArr['cardwebside'] = $cardUrl;
			$cardArr['cardlocationlat'] = $cardLat;
			$cardArr['cardlocationlon'] = $cardLong;
	    }
	   	// Close connection
	   	$stmt->close();
	   	return $cardArr;
	}

	public function updatePage($editCardName, $editCardAddress, $editCardPhoneNumber, $editCardDesc, $editCardPic, $editCardWebside, $editCardLocationLat, $editCardLocationLon, $cardid){
		// Connecting to Database
		$db = $GLOBALS['gdb'];
		$mysqli = $db->getConnection();

		// prepare and bind
		$stmt = $mysqli->prepare("UPDATE Card INNER JOIN PhoneNumber ON Card.phoneNumberID=PhoneNumber.phoneNumberID INNER JOIN Description ON Card.descriptionID=Description.descriptionID SET Card.location=?, Card.sideUrl=?, Card.locationLat=?, Card.locationLong=?, Description.title=?, Description.description=?, Description.picture=?, PhoneNumber.phoneNumber=? WHERE Card.cardID=?");
		$stmt->bind_param("ssssssssi", $editCardAddress, $editCardWebside, $editCardLocationLat, $editCardLocationLon, $editCardName, $editCardDesc, $editCardPic, $editCardPhoneNumber, $cardid);
		$stmt->execute();
		  	
		// Close connection
		$stmt->close();
		header('Location: ./pages.php');
	}

	public function deletePage($cardid) {
  		// Connecting to Database
		$db = $GLOBALS['gdb'];
		$mysqli = $db->getConnection();

		// prepare and bind
	  	$stmt = $mysqli->prepare("DELETE Card, Description, PhoneNumber FROM Card INNER JOIN Description ON Card.descriptionID=Description.descriptionID INNER JOIN PhoneNumber ON Card.phoneNumberID=PhoneNumber.phoneNumberID WHERE Card.cardID=?");
	  	$stmt->bind_param("i", $cardid);
	  	$stmt->execute();

	  	// Close connection
	  	$stmt->close();
	  	//$mysqli->close();
	}
}
?>