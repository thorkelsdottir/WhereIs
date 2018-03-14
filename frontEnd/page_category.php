<?php
include('includes/config.php');
include('includes/header.php');
?>
  <!-- Navbar -->
  <?php getNavbar(); ?>
  <!-- google map -->
  <div id="googlemaps"></div>
  <input type="hidden" id="nextpageID" data-id="<?php echo $_GET['pageID']; ?>">
  <!-- All cards -->
  <div class="allInfo">
      <div class="allCards">
          <?php getCards(); ?>
        <div class="eachcard eachcardbottom">
            <?php getBottomCards(); ?>
        </div>
      </div>
  </div>
  <!-- The Modal -->
  <div id="allReviews" class="reviews">
  </div>

<?php
include('includes/footer.php');
?>
