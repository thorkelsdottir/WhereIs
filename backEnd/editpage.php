<?php
  include ("includes/config.php");
  loginCheck();
  include ("includes/header.php");
?>
  <form action="" method="POST" class="createForm1" id="editCard">
    <div class="upperLine"></div>
    <h3>Edit Page</h3>

    <input name="catID" class="form-control" type="hidden" value="" id="catID">
    <div class="form-group logInInfo">
      <label for="update_card_name">Title</label>
      <input name="update_card_name" class="form-control" type="text" placeholder="Name your Place" value="<?php echo $cardInfo['cardname']; ?>">
    </div>
    <div class="twoItemsInLine">
      <div class="form-group logInInfo">
        <label for="update_card_address">Address</label>
        <input name="update_card_address" class="form-control" type="text" placeholder="Address" value="<?php echo $cardInfo['cardaddress']; ?>">
      </div>
      <div class="form-group logInInfo">
        <label for="update_card_phoneNumber">Phone nr.</label>
        <input name="update_card_phoneNumber" class="form-control" type="text" placeholder="551 xxxx" value="<?php echo $cardInfo['cardphoneNumber']; ?>">
      </div>
    </div>
    <div class="form-group logInInfo">
      <label for="update_card_description">Description</label>
      <textarea rows="4" cols="50" name="update_card_description" class="form-control"  placeholder="Description of place (max 50 words)"><?php echo $cardInfo['carddescription']; ?></textarea>
    </div>
    <div class="form-group logInInfo">
      <label for="update_cardPic">Image <span class="span">Recommended size: 500px x 200px</span></label>
      <input name="update_cardPic" type="hidden" accept="image/*" value="<?php echo $cardInfo['cardPic']; ?>">
      <input type="file" name="update_cardPic2" accept="image/*">
    </div>
    <div class="form-group logInInfo">
      <label for="update_card_webside">Website</label>
      <input name="update_card_webside" class="form-control" type="text" placeholder="www. Your website url" value="<?php echo $cardInfo['cardwebside']; ?>">
    </div>
    <div class="twoItemsInLine">
      <div class="form-group logInInfo">
        <label for="update_card_location_lat">Latitude</label>
        <input name="update_card_location_lat" class="form-control" type="text" placeholder="64.13xxxx" value="<?php echo $cardInfo['cardlocationlat']; ?>">
      </div>
      <div class="form-group logInInfo">
        <label for="update_card_location_lon">Lonigtude</label>
        <input name="update_card_location_lon" class="form-control" type="text" placeholder="-21.90xxxx" value="<?php echo $cardInfo['cardlocationlon']; ?>">
      </div>
    </div>
    <ul class="editSubmit">
      <li><input type="pageCancel" id="closeEditPage" class="btn" value="Cancel"></li>
      <li><input type="hidden" name="update_cardid" value="<?php echo $cardInfo['cardid']; ?>"></li>
      <li><input type="submit" class="btn" value="Update Page"></li>
    </ul>
  </form>

  <div class="container-fluid blur">
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























