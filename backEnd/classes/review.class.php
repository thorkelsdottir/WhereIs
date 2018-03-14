<?php
class Review {
	private $_db;
	private $_mysqli;

	public function getAllReviews() {
		// Connecting to Database
	   	$db = $GLOBALS['gdb'];
	   	$mysqli = $db->getConnection();

	  	$stmt = $mysqli->prepare("SELECT Reviews.reviewID, Reviews.reviewName, Reviews.reviewDate, Reviews.reviewRating, Reviews.reviewTitle, Reviews.reviewDescription, Reviews.cardID, Description.title, Category.color FROM Card INNER JOIN Reviews ON Card.cardID= Reviews.cardID INNER JOIN Description ON Card.descriptionID=Description.descriptionID INNER JOIN Category ON Card.pageID=Category.pageID");
	    $stmt->execute();
	    $stmt->bind_result($reviewID, $reviewName, $reviewDate, $reviewRating, $reviewTitle, $reviewDesc, $reviewCardID, $placeName, $categoryColor);

	    while (mysqli_stmt_fetch($stmt)) {
	    	echo '<tr>';
	    		echo '<td style="color: #'.$categoryColor.'">' .$placeName. '</td> <td>' .$reviewName. '</td> <td>' . $reviewDate.'</td> <td>' .$reviewCardID.'</td> <td>' . $reviewTitle.'</td> <td>' .$reviewDesc.'</td> <td>' . $reviewRating.'</td> <td> <a class="btn btn-danger btn-sm" href="review.php?delete=true&reviewID='.$reviewID.'"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>';
	      	echo '</tr>';
	    }
	   // Close connection
	   $stmt->close();
	}

	public function deleteReview($reviewid) {
  		// Connecting to Database
	  	$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	  	// prepare and bind
	  	$stmt = $mysqli->prepare("DELETE FROM Reviews WHERE reviewID=? LIMIT 1");
	  	$stmt->bind_param("i", $reviewid);
	  	$stmt->execute();

	  	// Close connection
	  	$stmt->close();
	  	//$mysqli->close();
	}
}
?>