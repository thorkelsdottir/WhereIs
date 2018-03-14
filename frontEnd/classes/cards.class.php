<?php
class Cards {
 public function getAllNavbars($pageID) {
        // Connecting to Database
        $db = $GLOBALS['gdb'];
        $mysqli = $db->getConnection();
        $stmt = $mysqli->prepare("SELECT Category.pageID, Category.color, Description.description FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID");
        $stmt->execute();
        $stmt->bind_result($page, $color, $description);
        while (mysqli_stmt_fetch($stmt)) {
          if($page == $pageID){
          echo'<nav class="navbar navbar-default navbar-fixed-top" style=" background: #'.$color.';">';
            echo'<div class="container-fluid">';

              echo'<div class="navbar-header">';
                echo'<a class="navbar-brand" href="landingpage.php">';
                  echo'<img alt="Brand" src="images/logo2.svg" height="70px">';
                echo'</a>';
              echo'</div>';

              echo'<h1>'.$description.'</h1>';

              echo'<a class="smoothScroll navbar-info_icon" href="#bottom">';
                echo'<img alt="info" src="images/info_icon.svg" height="30px">';
              echo'</a>';

            echo'</div>';
          echo'</nav>';
        }
      }
       /* Close connection */
       $stmt->close();
     //$mysqli->close();
    }

    public function getAllCards($pageID, $render) {
           // Connecting to Database
           $db = $GLOBALS['gdb'];
           $mysqli = $db->getConnection();
           $stmt = $mysqli->prepare("SELECT Card.cardID, Card.location, Card.locationLat, Card.locationLong, Card.sideUrl, Category.pageID, Category.color, Description.picture, Description.title, Description.description, PhoneNumber.phoneNumber FROM Card INNER JOIN Category ON Card.pageId=Category.pageID INNER JOIN Description ON Card.descriptionID=Description.descriptionID INNER JOIN PhoneNumber ON Card.phoneNumberID=PhoneNumber.PhoneNumberID");
           $stmt->execute();
           $stmt->bind_result($card, $location, $latitude, $longitude, $website, $page, $color, $picture, $title, $description, $phonenumber );
           $number=1;
           while (mysqli_stmt_fetch($stmt)) {

             if($page == $pageID){
                 if ($render) {
                   echo '<div class="eachcard">';
                    echo '<img style="background-image: url(./images/'.$picture.');" alt="" />';
                    echo '<h3 class="info_eachcard_number" style=" background: #'.$color.';"><span>'.$number.'</span></h3>';
                      echo '<div class="info_eachcard">';
                      echo '<h2>'.$title.'</h2>';
                      echo '<h4>'.$location.', '.$phonenumber.'</h4>';
                       echo '<p>'.$description.'</p>';
                     echo '</div>';
                     echo '<ul class="card_allButtons">';
                       echo '<li><a class="btn cardButtons" href="http://maps.google.com/?q='.$latitude.','.$longitude.'" target="_blank" style=" background: #'.$color.'; border-right: 1px solid #ffffff;
                       ">Location</a></li>';
                       echo '<li><a class="btn cardButtons" style=" background: #'.$color.'; border-right: 1px solid #ffffff;
                       " href="http://'.$website.'" target="_blank">Website</a></li>';
                       echo '<li><a class="btn cardButtons open_reviews" style=" background: #'.$color.';" data-id="'.$card.'" >Reviews</a></li>';
                     echo '</ul>';
                   echo '</div>';
                   $number++;
                 } else {
                   //get info for map markers
                   $myLocationArray[] = array($latitude, $longitude, $color);
                 }
              }
         }
         if(!$render){
          //send info for map markers
          echo json_encode($myLocationArray);
        }
          /* Close connection */
          $stmt->close();
        //$mysqli->close();
       }

       public function getAllBottomCards($pageID) {
              // Connecting to Database
              $db = $GLOBALS['gdb'];
              $mysqli = $db->getConnection();
              // $stmt = $mysqli->prepare("SELECT pageID, color, descr, fullname FROM Category INNER JOIN (SELECT description AS descr, 0 AS fullname FROM Description UNION SELECT 0 AS descr, fullName FROM User) AS k ON Category.pageID= k.fullname ");
              // $stmt->execute();
              // $stmt->bind_result($fullname);
              $stmt = $mysqli->prepare("SELECT Category.pageID, Category.color, Description.description , User.fullName FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID
              INNER JOIN PageHasUser ON PageHasUser.pageID=Category.pageID INNER JOIN User ON PageHasUser.userID = User.userID WHERE PageHasUser.pageID=$pageID");
                // $stmt = $mysqli->prepare("SELECT Category.pageID, Category.color, Description.description FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID");
              $stmt->execute();
              $stmt->bind_result($page, $color, $description, $fullname);

                while (mysqli_stmt_fetch($stmt)) {
                  if($page == $pageID){
                    echo'<div class="info_eachcard bottom_card" id="bottom">';
                    echo'<img class="logo_image_bottom_card" alt="Brand" src="images/logo2dark.svg" height="70px">';
                      echo'<h1 class="bottom_card_title" style=" color: #'.$color.';">'.$description.'</h1>';
                      echo'<h4>By '.$fullname.'</h4>';
                      echo'<h2>About the Project</h2>';
                      echo'<p>Where.is has a passion for helping people find the best of everything in Reykjavik, Iceland.
                      <br>We love top lists, reviews and we love maps!
                      <br>
                      <br>We invite you to make a Top List of your choosing, just <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank">pitch us</a> an idea and get your very own Where.is login.
                      <br>It´s as easy as can be, you just see!</p>';

                        echo'<div class="card_shareButton">';
                          echo'<div class="share" >';
                            echo'<a href="page_category.php?pageID='.$page.'" target="_blank" class="ico fb"><i class="fa fa-facebook"></i></a>';
                            echo'<a href="page_category.php?pageID='.$page.'" target="_blank" class="ico tw"><i class="fa fa-twitter"></i></a>';
                            echo'<a href="page_category.php?pageID='.$page.'" target="_blank" class="ico gp"><i class="fa fa-google-plus"></i></a>';
                            echo'<span class="text"><em>SHARE</em></span>';
                            echo'<svg class="ico-share"><use xlink:href="#ico-share"></use></svg>';
                          echo'</div>';
                          echo'<div class="share" style=" background: #'.$color.';">';
                            echo'<a href="https://www.facebook.com/sharer/sharer.php?page_category.php?pageID='.$page.'" target="_blank" class="ico fb"><i class="fa fa-facebook"></i></a>';
                            echo'<a href="https://twitter.com/home?status=Social%20Share%20by%20%40'.$fullname.'%20http%3Apage_category.php?pageID='.$page.'" target="_blank" class="ico tw"><i class="fa fa-twitter"></i></a>';
                            echo'<a href="https://plus.google.com/share?page_category.php?pageID='.$page.'" target="_blank" class="ico gp"><i class="fa fa-google-plus"></i></a>';
                            echo'<span class="text"><em>SHARE</em></span>';
                            echo'<svg class="ico-share"><use xlink:href="#ico-share"></use></svg>';
                          echo'</div>';
                          echo'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">';
                          echo'<symbol id="ico-share" x="0px" y="0px"
                         viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                          <g>
                        <path fill="#FFFFFF" d="M13.26,10.387c-0.781,0-1.484,0.328-1.982,0.854L5.445,8.385c0.02-0.133,0.034-0.27,0.034-0.41
                            c0-0.136-0.013-0.269-0.032-0.399l5.823-2.824c0.5,0.529,1.205,0.861,1.99,0.861c1.514,0,2.74-1.227,2.74-2.74
                            s-1.227-2.74-2.74-2.74c-1.513,0-2.739,1.227-2.739,2.74c0,0.136,0.013,0.269,0.032,0.399L4.73,6.097
                            c-0.5-0.529-1.205-0.861-1.99-0.861C1.227,5.236,0,6.462,0,7.976c0,1.513,1.227,2.739,2.74,2.739c0.781,0,1.484-0.328,1.983-0.854
                            l5.832,2.855c-0.021,0.134-0.035,0.27-0.035,0.41c0,1.514,1.227,2.739,2.74,2.739S16,14.641,16,13.127S14.773,10.387,13.26,10.387z
                            "/></g>
                          </symbol>';
                          echo'</svg>';
                        echo'</div>';
                      echo'</div>';
                }
            }
             /* Close connection */
             $stmt->close();
           //$mysqli->close();
          }
    }
 ?>
