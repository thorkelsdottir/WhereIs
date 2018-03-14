<?php
  include ("includes/config.php");
  loginCheck();
  include ("includes/header.php");
?>
  <form action="" method="POST" class="createForm" id="createCategory">
    <div class="upperLine"></div>
    <h3>Add Category</h3>

    <div class="form-group logInInfo">
      <label for="create_categoryName">Category Name</label>
      <input name="create_categoryName" class="form-control" type="text" placeholder="Enter Category Name">
    </div>
    <div class="form-group logInInfo">
      <label for="create_categoryDescription">Category Description</label>
      <input name="create_categoryDescription" class="form-control" type="text" placeholder="Enter Category Description">
    </div>
    <div class="form-group logInInfo">
        <label for="create_categoryColor">Color</label></br>
        <input name="create_categoryColor" class="jscolor" value="607D8B">
    </div>
    <div class="form-group logInInfo">
        <label for="create_categoryIcon">Icon Image</label></br>
        <input type="file" name="create_categoryIcon" accept="image/*">
    </div>    
    <ul class="createSubmit">
      <li><input type="categoryCancel" id="closeCreateCategory" class="btn" value="Cancel"></li>
      <li><input type="categoryDelete" class="btn" value="Delete"></li>
      <li><input type="submit" class="btn" value="Save"></li>
    </ul>
  </form>

  <div class="container-fluid toBlur">
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
          <button class="createCategoryButton">Add Category</button>
        </div>
      </div>
    </div>
  </div>
<?php
  include ("includes/footer.php");
 ?>