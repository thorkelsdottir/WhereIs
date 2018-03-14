<?php
//to get location and color for maps
if(isset($_GET['ajaxpageID'])){
  include('../classes/classes.php');
  $allReview = new Cards();
  $allReview->getAllCards($_GET['ajaxpageID'], false);
}
//get cardID for each review
if(isset($_GET['cardID'])){
  include('../classes/classes.php');
  $allReview = new Review();
  $allReview->getCardReviews($_GET['cardID']);
}
else {
  include('./classes/classes.php');
  // Þessi kóði segir hvað á að fara inn í review töflu þegar að ið submitum review
  if(isset($_POST['rating_username']) && !empty($_POST['rating_username']) && isset($_POST['rating_title']) && !empty($_POST['rating_title'])){
    $review_name = $_POST['rating_username'];
    $review_title = $_POST['rating_title'];
    $review_description = $_POST['review_body'];
    $review_rating = $_POST['rating_give'];
    $createReview = new Review();
    $createReview->createReview($_POST['cardID'] ,$review_name, $review_title, $review_description, $review_rating);
  }
  // þetta function kallar á category inn í landingpage
  function getCategorys() {
    $allCategory = new Category();
    $allCategory->getAllCategorys();
    }
  // þetta function kallar á navbarinn inn í pages
  function getNavbar() {
    $allNavbar = new Cards();
    $allNavbar->getAllNavbars($_GET['pageID']);
    }
  // þetta function kallar á card-in inn í pages
  function getCards() {
    $allNavbar = new Cards();
    $allNavbar->getAllCards($_GET['pageID'], true);
    }
  // þetta function kallar á bottom card-in inn í pages
  function getBottomCards() {
    $allNavbar = new Cards();
    $allNavbar->getAllBottomCards($_GET['pageID']);
    }
}
 ?>
