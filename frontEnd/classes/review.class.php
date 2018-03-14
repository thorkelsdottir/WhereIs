<?php
class Review {

  public function createReview($cardID, $review_name, $review_title, $review_description, $review_rating) {
 	// Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

 	// prepare and bind
 	$stmt = $mysqli->prepare("INSERT INTO Reviews(cardID, reviewName, reviewTitle, reviewDescription, reviewRating) VALUES (?, ?, ?, ?, ?)");
 	$stmt->bind_param("isssi", $cardID, $review_name, $review_title, $review_description, $review_rating);
 	$stmt->execute();
  //echo "New records created successfully";
  $stmt->close();
  // 	$mysqli->close();
  }

  public function getCardReviews($cardID) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();
  // prepare and bind
  $stmt = $mysqli->prepare("SELECT Category.color, Description.title FROM Card INNER JOIN Category ON Category.pageID=Card.pageID INNER JOIN Description ON Description.descriptionID=Card.descriptionID WHERE Card.cardID=".$cardID);
  $stmt->execute();
  $stmt->bind_result($color, $card_title);
  //echo "New records created successfully";
  while (mysqli_stmt_fetch($stmt)) {
   echo'<div class="reviews-content">';
      echo'<div class="reviewHeader" style="background: #'.$color.';" >';
       echo'<h2>'.$card_title.'</h2>';
       echo'<span class="close">x</span>';
      echo'</div>';

      echo'<div class="reviewSubheader">';
        echo'<div class="basedOn">';
          echo'<p>Based on all reviews</p>';
            echo'<div class="br-wrapper br-theme-fontawesome-stars rating_calculation">';
              echo'<select id="stars_calc" value="">';
                echo'<option value="1">1</option>';
                echo'<option value="2">2</option>';
                echo'<option value="3">3</option>';
                echo'<option value="4">4</option>';
                echo'<option value="5">5</option>';
              echo'</select>';
            echo'</div>';
        echo'</div>';
        echo'<a href="#" class="button_writeReview" id="button_writeReview">Write a review</a>';
        echo'<a href="#" class="button_writeReview" id="button_backReview">Back to reviews</a>';
      echo'</div>';

      echo'<div class="eachReviewAll">';
      echo'<div class="writeReview" id="writeReview">';
       echo'<h3>Write a Review</h3>';
       echo'<form action="" method="post">';
       echo'<input name="cardID" type="hidden" value="'.$cardID.'">';

         echo'<div class="name_stars">';
           echo'<div class="form-rating">';
             echo'<label for="rating_username">Name</label><br>';
             echo'<input type="text" name="rating_username" value="" placeholder="Enter your name">';
           echo'</div>';
           echo'<div class="form-rating form-rating_stars">';
             echo'<label for="rating_stars">Rating</label><br>';
             echo'<div class="br-wrapper br-theme-fontawesome-stars rating_writereview">';
               echo'<select id="stars_give" name="rating_give">';
                 echo'<option value="1">1</option>';
                 echo'<option value="2">2</option>';
                 echo'<option value="3">3</option>';
                 echo'<option value="4">4</option>';
                 echo'<option value="5">5</option>';
               echo'</select>';
            echo'</div>';
           echo'</div>';
         echo'</div>';

         echo'<div class="form-rating">';
           echo'<label for="rating_title">Review Title</label><br>';
           echo'<input type="text" name="rating_title" value="" placeholder="Give your review a title">';
         echo'</div>';
         echo'<div class="form-rating">';
           echo'<label for="rating_body">Body of Review (1500)</label><br>';
           echo'<textarea rows="4" cols="50" maxlength="1500" type="text" name="review_body" value="" placeholder="Write your comments here"></textarea>';
         echo'</div>';

         echo'<input type="submit" class="btn reviewButton" style="background: #'.$color.';">';

      echo'</form>';
    echo'</div>';
  }
  $stmt->close();
  // 	$mysqli->close();
  $stmt = $mysqli->prepare("SELECT Reviews.cardID, Reviews.reviewName, Reviews.reviewDate, Reviews.reviewTitle, Reviews.reviewDescription, Reviews.reviewRating, Category.color, Description.title FROM Card INNER JOIN Reviews ON Reviews.cardID=Card.cardID INNER JOIN Category ON Category.pageID=Card.pageID INNER JOIN Description ON Description.descriptionID=Card.descriptionID WHERE Card.cardID=".$cardID);
  $stmt->execute();
  $stmt->bind_result($card, $review_name, $review_date, $review_title, $review_description, $review_rating, $color, $card_title);
  //echo "New records created successfully";
  while (mysqli_stmt_fetch($stmt)) {
    if($card == $cardID){
          echo'<div class="eachReview">';
             echo'<div class="eachReview_info">';
               echo'<h3>'.$review_title.'</h3>';
               echo'<h4>'.$review_name.'</h4>';
               echo'<p>'.$review_description.'</p>';
             echo'</div>';
             echo'<div class="br-wrapper br-theme-fontawesome-stars rating_eachcard">';
               echo'<select class="stars_each" data-stars="'.$review_rating.'">';
                 echo'<option value="1">1</option>';
                 echo'<option value="2">2</option>';
                 echo'<option value="3">3</option>';
                 echo'<option value="4">4</option>';
                 echo'<option value="5">5</option>';
               echo'</select>';
             echo'</div>';
         echo'</div>';
      }
    }
  }
}
 ?>
