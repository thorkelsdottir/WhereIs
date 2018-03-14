<?php
  include ("includes/config.php");
  loginCheck();
  include ("includes/header.php");
?>
  <form action="categorys.php?update=true" method="POST" class="createForm1" id="editCategory">
    <div class="upperLine"></div>
    <h3>Edit Category</h3>
    <div class="form-group logInInfo">
      <label for="update_categoryName">Category Name</label>
      <input name="update_categoryName" class="form-control" type="text" placeholder="Enter Category Name" value="<?php echo $categoryInfo['categoryname']; ?>">
    </div>
    <div class="form-group logInInfo">
      <label for="update_categoryDescription">Category Description</label>
      <input name="update_categoryDescription" class="form-control" type="text" placeholder="Enter Category Description" value="<?php echo $categoryInfo['categorydescription']; ?>">
    </div>
    <div class="form-group logInInfo">
        <label for="update_categoryColor">Color</label></br>
        <input name="update_categoryColor" class="jscolor" value="<?php echo $categoryInfo['categorycolor']; ?>">
    </div>
    <div class="form-group logInInfo">
        <label for="update_categoryIcon">Icon Image</label></br>
        <input name="update_categoryIcon" type="hidden" accept="image/*"  value="<?php echo $categoryInfo['categoryicon']; ?>">
        <input type="file" name="update_categoryIcon2" accept="image/*">
    </div>    
    <ul class="editSubmit">
      <li><input type="categoryCancel" id="closeEditCategory" class="btn" value="Cancel" style="border-right: 1px solid #fff;"></li>
      <li><input type="hidden" name="update_categoryid" value="<?php echo $categoryInfo['categoryid'];  ?>"></li>
      <li><input type="submit" class="btn" value="Update Category"></li>
    </ul>
  </form>

  <div class="container-fluid blur">
    <div class="row">
      <!--SideBar-->
      <?php include('sidebar.php');?>

      <div class="col-md-9 dashRight">
        <div class="userTop">
          <h2>Category Management</h2>
        </div>

        <div class="userTable">
          <table class="table">
            <thead> 
              <tr> 
                <th>#</th> 
                <th>Category Name</th>
                <th>Category Description</th>  
                <th>Color</th> 
                <th>Icon</th> 
                <th>Edit / Delete</th>
              </tr> 
            </thead>
            <tbody>
              <?php getCategory(); ?>  
            </tbody>
          </table>
          <button class="createCategoryButton">Add User</button>
        </div>
      </div>
    </div>
  </div>
<?php
  include ("includes/footer.php");
 ?>