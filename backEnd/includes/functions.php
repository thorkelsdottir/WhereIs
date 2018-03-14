<?php
	include('./classes/classes.php');

	/************* USER *************/
	if(isset($_POST['create_username']) && !empty($_POST['create_username']) && isset($_POST['create_password']) && !empty($_POST['create_password'])) {
		$fullName = $_POST['create_fullName'];
		$email = $_POST['create_email'];
		$phoneNumber = $_POST['create_phoneNumber'];
		$userName = $_POST['create_username'];
		$passWord = $_POST['create_password'];
		$pagehasuser = $_POST['create_pagehasuser'];

		$user = new User();
		$user->createUsers($fullName, $email, $phoneNumber, $userName, $passWord, $pagehasuser);
	}

	/************* Get USER *************/
	function getUsers() {
		$alluser = new User();
		$alluser->getAllUsers();
	}

	/************* Delete USER from list *************/
	if(isset($_GET['userID'])){
		$user = new User();
		$user->deleteUser($_GET['userID']);
	}

	/************* Update USER *************/
	if(isset($_POST['update_userid'])) {
		$userid = $_POST['update_userid'];
		$fullName = $_POST['update_fullName'];
		$email = $_POST['update_email'];
		$phoneNumber = $_POST['update_phoneNumber'];
		$username = $_POST['update_username'];
		$pagehasuser = $_POST['update_pagehasuser'];

		$user = new User();
		$user->updateUser($userid, $fullName, $email, $phoneNumber, $username, $pagehasuser);
	}

	/************* Edit USER *************/
	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$userid = $_GET['userid'];
		$user = new User();
		$userInfo = $user->getUserById($userid);
	}



/*-------------------------------------------------------------------------------------------------*/
	/************* CATEGORY *************/
	if(isset($_POST['create_categoryName']) && !empty($_POST['create_categoryName'])){
		$categoryName = $_POST['create_categoryName'];
		$categoryDesc = $_POST['create_categoryDescription'];
		$categoryColor = $_POST['create_categoryColor'];
		$categoryIcon = $_POST['create_categoryIcon'];

		$category = new Category();
		$category->createCategory($categoryName, $categoryDesc, $categoryColor, $categoryIcon);
	}

	/************* Get CATEGORY *************/
	function getCategory() {
		$allCategorys = new Category();
		$allCategorys->getAllCategorys();
	}

	/************* Delete CATEGORY from list *************/
	if(isset($_GET['categoryID'])){
		$category = new Category();
		$category->deleteCategory($_GET['categoryID']);
	}

	/************* Update CATEGORY *************/
	if(isset($_POST['update_categoryid'])) {
		$categoryid = $_POST['update_categoryid'];
		$editCategoryName = $_POST['update_categoryName'];
		$editCategoryDesc = $_POST['update_categoryDescription'];
		$editCategoryColor = $_POST['update_categoryColor'];
		$editCategoryIcon = $_POST['update_categoryIcon'];
		$editCategoryIcon2 = $_POST['update_categoryIcon2'];
		if($editCategoryIcon2 !=="") {
			$editCategoryIcon = $editCategoryIcon2;
		}

		$user = new Category();
		$user->updateCategory($categoryid, $editCategoryName, $editCategoryDesc, $editCategoryColor, $editCategoryIcon);
	}

	/************* Edit CATEGORY *************/
	if(isset($_GET['editcategory']) && $_GET['editcategory'] == 'true') {
		$categoryid = $_GET['categoryid'];
		$category = new Category();
		$categoryInfo = $category->getCategoryById($categoryid);
	}



/*-------------------------------------------------------------------------------------------------*/
	/************* PAGES *************/
	if(isset($_POST['create_card_name']) && !empty($_POST['create_card_name'])) {
		$cardName = $_POST['create_card_name'];
		$cardAddress = $_POST['create_card_address'];
		$cardPhoneNumber = $_POST['create_card_phoneNumber'];
		$cardDesc = $_POST['create_card_description'];
		$cardPic = $_POST['create_cardPic'];
		$cardWebside = $_POST['create_card_webside'];
		$cardLocationLat = $_POST['create_card_location_lat'];
		$cardLocationLon = $_POST['create_card_location_lon'];
		$cardCategoryID = $_POST['catID'];

	    $user = new Page();
		$user->createCard($cardName, $cardAddress, $cardPhoneNumber, $cardDesc, $cardPic, $cardWebside, $cardLocationLat, $cardLocationLon, $cardCategoryID);
	}

	/************* Get PAGES *************/
	function getPages() {
		$allpages = new Page();
		$allpages->getAllPages();
	}

	/************* Delete PAGES from list *************/
	if(isset($_GET['cardID']) && $_GET['delete'] == 'true'){
		$card = new Page();
		$card->deletePage($_GET['cardID']);
	}

	/************* Update PAGES *************/
	if(isset($_POST['update_cardid'])) {
		$cardid = $_POST['update_cardid'];
		$editCardName = $_POST['update_card_name'];
		$editCardAddress = $_POST['update_card_address'];
		$editCardPhoneNumber = $_POST['update_card_phoneNumber'];
		$editCardDesc = $_POST['update_card_description'];
		$editCardPic = $_POST['update_cardPic'];
		$editCardPic2 = $_POST['update_cardPic2'];
		$editCardWebside = $_POST['update_card_webside'];
		$editCardLocationLat = $_POST['update_card_location_lat'];
		$editCardLocationLon = $_POST['update_card_location_lon'];

		if($update_cardPic2 !=="") {
			$update_cardPic = $update_cardPic2;
		}

		$card = new Page();
		error_log("her");
		$card->updatePage($editCardName, $editCardAddress, $editCardPhoneNumber, $editCardDesc, $editCardPic, $editCardWebside, $editCardLocationLat, $editCardLocationLon, $cardid);
	}

	/************* Edit PAGES *************/
	if(isset($_GET['editpage']) && $_GET['editpage'] == 'true') {
		$cardid = $_GET['pageid'];
		$card = new Page();
		$cardInfo = $card->getPageById($cardid);
	}



/*-------------------------------------------------------------------------------------------------*/
	/************* Get REVIEW *************/
	function getReviews() {
		$allreviews = new Review();
		$allreviews->getAllReviews();
	}

	/************* Delete REVIEW from list *************/
	if(isset($_GET['reviewID'])){
		$review = new Review();
		$review->deleteReview($_GET['reviewID']);
	}
?>