<?php
	include ("includes/config.php");
  	loginCheck();
	include ("includes/header.php");
?>
	<form action="users.php?update=true" method="POST" class="createForm1" id="editUser">
	    <div class="upperLine"></div>
	    <h3>Edit User</h3>

	    <div class="form-group">
	    	<label for="update_fullName">Full Name</label>
	      	<input name="update_fullName" class="form-control" type="text" placeholder="Enter Full Name" value="<?php echo $userInfo['fullname']; ?>">
	    </div>
	    <div class="twoItemsInLine">
	      	<div class="form-group">
	        	<label for="update_email">Email</label>
	        	<input name="update_email" class="form-control" type="email" placeholder="Enter email" value="<?php echo $userInfo['email']; ?>">
	      	</div>
	      	<div class="form-group">
	        	<label for="update_phoneNumber">Phone nr.</label>
	        	<input name="update_phoneNumber" class="form-control" type="text" placeholder="555XXXX" value="<?php echo $userInfo['phonenumber']; ?>">
	      	</div>
	    </div>
	    <div class="form-group">
	      	<label for="update_username">Username</label>
	      	<input name="update_username" class="form-control" type="text" placeholder="Enter Username" value="<?php echo $userInfo['username']; ?>">
	    </div>
		<div class="form-group logInInfo">
	    	<label for="update_pagehasuser">Category</label>
	    	<input name="update_pagehasuser" class="form-control" type="text" placeholder="Enter what Category user has" value="<?php echo $userInfo['category']; ?>"> 
	    </div>
	    <ul class="editSubmit">
	      	<li><input type="userCancel" id="closeEditUser" class="btn" value="Cancel"></li>
	    	<li><input type="hidden" name="update_userid" value="<?php echo $userid ?>"></li>
			<li><input type="submit" class="btn" value="Update User"></li>
	    </ul>
	</form>

  	<div class="container-fluid blur">
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




