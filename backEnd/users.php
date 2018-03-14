<?php
	include ("includes/config.php");
  loginCheck();
	include ("includes/header.php");
?>
  <form action="" method="POST" class="createForm" id="createUser">
    <div class="upperLine"></div>
    <h3>Add New User</h3>

    <div class="form-group logInInfo">
      <label for="create_fullName">Full Name</label>
      <input name="create_fullName" class="form-control" type="text" placeholder="Enter Full Name">
    </div>
    <div class="twoItemsInLine">
      <div class="form-group logInInfo">
        <label for="create_email">Email</label>
        <input name="create_email" class="form-control" type="email" placeholder="Enter email">
      </div>
      <div class="form-group logInInfo">
        <label for="create_phoneNumber">Phone nr.</label>
        <input name="create_phoneNumber" class="form-control" type="text" placeholder="555XXXX">
      </div>
    </div>
    <div class="form-group logInInfo">
      <label for="create_username">Username</label>
      <input name="create_username" class="form-control" type="text" placeholder="Enter Username">
    </div>
    <div class="form-group logInInfo">
      <label for="create_password">Password</label>
      <input name="create_password" class="form-control" type="password" id="passwordfield" placeholder="Enter Password"> 
    </div>
    <div class="form-group logInInfo">
      <label for="create_pagehasuser">Category</label>
      <input name="create_pagehasuser" class="form-control" type="text" placeholder="Enter what CategoryNumber user has"> 
    </div>
    <ul class="createSubmit">
      <li><input type="userCancel" id="closeCreateUser" class="btn" value="Cancel"></li>
      <li><input type="userDelete" class="btn" value="Delete"></li>
      <li><input type="submit" class="btn" value="Save"></li>
    </ul>
  </form>

  <div class="container-fluid toBlur">
    <div class="row">
      <!--SideBar-->
      <?php include('sidebar.php');?>

      <div class="col-md-9 dashRight">
        <div class="userTop">
          <h2>User Management</h2>
        </div>

        <div class="userTable">
          <table class="table">
            <thead> 
              <tr> 
                <th>#</th> 
                <th>Username</th> 
                <th>FullName</th> 
                <th>Email</th>
                <th>PhoneNumber</th> 
                <th>Edit / Delete</th>
              </tr> 
            </thead>
            <tbody>
              <?php getUsers(); ?>  
            </tbody>
          </table>
          <button class="createUserButton">Add User</button>
        </div>
      </div>
    </div>
  </div>
<?php
	include ("includes/footer.php");
 ?>