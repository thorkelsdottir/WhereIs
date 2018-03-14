<?php
  include ("includes/config.php");
  loginCheck();
  include ("includes/header.php");
?>
  <div class="container-fluid toBlur">
    <div class="row">
      <!--SideBar-->
      <?php include('sidebar.php');?>

      <div class="col-md-9 dashRight">
        <div class="userTop">
          <h2>Reviews</h2>
        </div>

        <div class="userTable">
          <table class="table">
            <thead> 
              <tr>  
                <th>Place</th>
                <th>Name</th>  
                <th>Date</th> 
                <th>CardID</th> 
                <th>Title</th> 
                <th>Description</th> 
                <th>Rating(1/5)</th> 
                <th>Delete</th>
              </tr> 
            </thead>
            <tbody>
              <?php getReviews(); ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
  include ("includes/footer.php");
 ?>