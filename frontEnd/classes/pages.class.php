<?php
class Category {
 public function getAllCategorys() {
        // Connecting to Database
        $db = $GLOBALS['gdb'];
        $mysqli = $db->getConnection();
        $stmt = $mysqli->prepare("SELECT Category.pageID, Category.color, Description.title, Description.picture, Description.description, User.fullname FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID INNER JOIN PageHasUser ON Category.pageID=PageHasUser.pageID INNER JOIN User ON User.userID=PageHasUser.userID");
        $stmt->execute();
        $stmt->bind_result($page, $color, $title, $icon, $description, $fullname);
        //var_dump($stmt);
        while (mysqli_stmt_fetch($stmt)) {
            echo'<li>';
    				  echo'<figure>';
    						  echo'<div class="blue" style="border-bottom: 10px solid #'.$color.'; border-right: 1px solid #'.$color.'; border-top: 1px solid #'.$color.'; border-left: 1px solid #'.$color.'; ">';
    							  echo'<a href="page_category.php?pageID='.$page.'" class="landingpage_card" >';
    										  echo'<div class="landingpage_card_icon">';
    											  echo'<img src="./images/'.$icon.'" height="90px">';
    										  echo'</div>';
    										  echo'<div class="landingpage_card-text">';
    										  echo'<h3>'.$title.'</h3>';
    											  echo'<p>'.$description.'</p>';
    										  echo'</div>';
    							  echo'</a>';
    						  echo'</div>';
    						  echo'<figcaption style=" background: #'.$color.';" >';
    							  echo'<h3>Top List</h3>';
    							  echo'<p>by '.$fullname.'</p>';
    							  echo'<a class="toPage" href="page_category.php?pageID='.$page.'"><img src="images/arrow_inn_icon.svg" height="25px"></a>';
    						  echo'</figcaption>';
    					echo'</figure>';
    				echo'</li>';
            }
       /* Close connection */
       $stmt->close();
  }
}
 ?>
