<?php
  include ("includes/config.php");
  include ("includes/header.php");
?>
<div class="logIn">
  <img src="images/logo_white.svg">
  <form method="POST">
    <div class="form-group logInInfo">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group logInInfo">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group logInInfo2">
      <input type="submit" class="btn btn-lg btn-block cardButtons" value="Login">
    </div>

    <!-- ERROR message -->
    <?php if(isset($_GET['login']) and $_GET['login'] == 'denied' or $_GET['login'] == 'empty'):?>
      <div class="alert alert-danger" role="alert">
        <?php if($_GET['login'] == 'denied'): echo LOGINERROR; ?>
        <?php elseif($_GET['login'] == 'empty'): echo LOGINEMPTY; ?>
        <?php endif;?> 
      </div>
    <?php endif;?>
  </form>
</div>
<?php
  include ("includes/footer.php");
 ?>