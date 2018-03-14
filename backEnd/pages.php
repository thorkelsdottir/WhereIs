<?php
  include ("includes/config.php");
  loginCheck();
  include ("includes/header.php");
?>
  <form action="" method="POST" class="createForm" id="createCard">
    <div class="upperLine"></div>
    <h3>Add New Page</h3>

    <input name="catID" class="form-control" type="hidden" value="" id="catID">
    <div class="form-group logInInfo">
      <label for="create_card_name">Title</label>
      <input name="create_card_name" class="form-control" type="text" placeholder="Name your Place">
    </div>
    <div class="twoItemsInLine">
      <div class="form-group logInInfo">
        <label for="create_card_address">Address</label>
        <input name="create_card_address" class="form-control" type="text" placeholder="Address">
      </div>
      <div class="form-group logInInfo">
        <label for="create_card_phoneNumber">Phone nr.</label>
        <input name="create_card_phoneNumber" class="form-control" type="text" placeholder="551 xxxx">
      </div>
    </div>
    <div class="form-group logInInfo">
      <label for="create_card_description">Description</label>
      <textarea rows="4" cols="50" name="create_card_description" class="form-control"  placeholder="Description of place (max 50 words)"></textarea>
    </div>
    <div class="form-group logInInfo">
      <label for="create_cardPic">Image <span class="span">Recommended size: 500px x 200px</span></label>
      <input type="file" name="create_cardPic" accept="image/*">
    </div>
    <div class="form-group logInInfo">
      <label for="create_card_webside">Website</label>
      <input name="create_card_webside" class="form-control" type="text" placeholder="www. Your website url">
    </div>
    <div class="twoItemsInLine">
      <div class="form-group logInInfo">
        <label for="create_card_location_lat">Latitude</label>
        <input name="create_card_location_lat" class="form-control" type="text" placeholder="64.13xxxx">
      </div>
      <div class="form-group logInInfo">
        <label for="create_card_location_lon">Lonigtude</label>
        <input name="create_card_location_lon" class="form-control" type="text" placeholder="-21.90xxxx">
      </div>
    </div>
    <ul class="createSubmit">
      <li><input type="pageCancel" id="closeCreatePage" class="btn" value="Cancel"></li>
      <li><input type="pageDelete" class="btn" value="Delete"></li>
      <li><input type="submit" class="btn" value="Save"></li>
    </ul>
  </form>

  <div class="container-fluid toBlur">
    <div class="row">
      <!--SideBar-->
      <?php include('sidebar.php');?>

      <div class="col-md-9 dashRight">
        <div class="userTop">
          <h2>Page Management</h2>
        </div>
        <?php getPages();?>
      </div>
    </div>
  </div>
<?php
  include ("includes/footer.php");
?>























