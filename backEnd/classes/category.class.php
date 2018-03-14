<?php
class Category {
	private $_db;
	private $_mysqli;

	public function createCategory($categoryName, $categoryDesc, $categoryColor, $categoryIcon) {
	 	// Connecting to Database
		$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	 	// prepare and bind
	 	$stmt = $mysqli->prepare("INSERT INTO Description(title, description, picture) VALUES (?, ?, ?)");
	    $stmt->bind_param("sss", $categoryName, $categoryDesc, $categoryIcon);
	    $stmt->execute();

	    $stmt = $mysqli->prepare("SELECT descriptionID FROM Description WHERE title='$categoryName'");
    	$stmt->execute();
    	$stmt->bind_result($descriptionID);
    	while (mysqli_stmt_fetch($stmt)) {
    		error_log($descriptionID);
    	}
    	
	 	$stmt = $mysqli->prepare("INSERT INTO Category(color, descriptionID) VALUES (?,?)");
	 	$stmt->bind_param("si", $categoryColor, $descriptionID);
	 	$stmt->execute();

	 	/* Close connection */
	 	$stmt->close();
	  	header('Location: ./categorys.php');
	}

	public function getAllCategorys() {
		// Connecting to Database
	   	$db = $GLOBALS['gdb'];
	   	$mysqli = $db->getConnection();

	  	$stmt = $mysqli->prepare("SELECT Category.pageID, Description.title, Description.description, Category.color, Description.picture FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID");
	    $stmt->execute();
	    $stmt->bind_result($categoryid, $categoryName, $categoryDesc, $categoryColor, $categoryIcon);

	    while (mysqli_stmt_fetch($stmt)) {
	    	echo '<tr>';
	    		echo '<th scope="row">' .$categoryid. '<td>' .$categoryName. '</td> <td>' . $categoryDesc.'</td> <td>#' .$categoryColor.'</td> <td>' . $categoryIcon.'</td> <td> <a class="btn btn-primary btn-sm m-r-1" href="editcategory.php?editcategory=true&categoryid='.$categoryid.'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> <a class="btn btn-danger btn-sm" href="categorys.php?delete=true&categoryID='.$categoryid.'"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>';
	      	echo '</tr>';
	    }
        
	   // Close connection
	   $stmt->close();
	}

	public function getCategoryById($categoryid) {
	   // Connecting to Database
	   $db = $GLOBALS['gdb'];
	   $mysqli = $db->getConnection();

	  	// prepare and bind
	  	$stmt = $mysqli->prepare("SELECT Category.pageID, Description.title, Description.description, Category.color, Description.picture FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID WHERE pageID = ?");
	    $stmt->bind_param('i', $categoryid);
	    $stmt->execute();
	    $stmt->bind_result($category_id, $categoryname, $categorydesc, $categorycolor, $categoryicon);

	    $categoryArr;
	    while ($stmt->fetch()) {
	    	$categoryArr['categoryid'] = $category_id;
	    	$categoryArr['categoryname'] = $categoryname;
	    	$categoryArr['categorydescription'] = $categorydesc;
	    	$categoryArr['categorycolor'] = $categorycolor;
	    	$categoryArr['categoryicon'] = $categoryicon;
	    }
	   	// Close connection
	   	$stmt->close();
	   	return $categoryArr;
	}
	
	public function updateCategory($categoryid, $editCategoryName, $editCategoryDesc, $editCategoryColor, $editCategoryIcon) {
		// Connecting to Database
	  	$db = $GLOBALS['gdb'];
	  	$mysqli = $db->getConnection();

	  	// prepare and bind
	  	$stmt = $mysqli->prepare("UPDATE Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID SET Description.title=?, Description.description=?, Category.color=?, Description.picture=? WHERE pageID=?");
	  	$stmt->bind_param("ssssi", $editCategoryName, $editCategoryDesc, $editCategoryColor, $editCategoryIcon, $categoryid);
	  	$stmt->execute();

	  	$stmt->close();
	}

	public function deleteCategory($categoryid) {
  		// Connecting to Database
		$db = $GLOBALS['gdb'];
		$mysqli = $db->getConnection();
		// prepare and bind
	  	$stmt = $mysqli->prepare("DELETE Category, Description FROM Category INNER JOIN Description ON Category.descriptionID=Description.descriptionID WHERE Category.pageID=?");
	  	$stmt->bind_param("i", $categoryid);
	  	$stmt->execute();
	  	$stmt->close();
	  	//$mysqli->close();
	}
}
?>