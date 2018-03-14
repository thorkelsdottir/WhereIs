<?php
	include('includes/config.php');
	loginCheck();
	include('includes/header.php');
?>
<div class="container-fluid">
  <div class="row">
      <!--SideBar-->
    <?php include('sidebar.php');?>
    <div class="col-md-9 dashRight">
      <div class="userTop"><h2>Welcome <?php echo $_SESSION['username']; ?>, this is your Dashboard!</h2></div>
      <!-- Main content -->
      <section class="content">
        <div class="row" style="margin-bottom:5px;">
          <div class="col-md-3">
            <div class="sm-st clearfix">
              <span class="sm-st-icon firstIcon"><i class="fa fa-check-square-o"></i></span>
              <div class="sm-st-info">
                  <span>3200</span>
                  Visits on Side
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="sm-st clearfix">
              <span class="sm-st-icon secoundIcon"><i class="fa fa-calendar"></i></span>
              <div class="sm-st-info">
                <span><?php date_default_timezone_set("Iceland");
                      echo date("j. M"); ?></span>
                To Day Is...
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="sm-st clearfix">
              <span class="sm-st-icon thirdIcon"><i class="fa fa-clock-o"></i></span>
              <div class="sm-st-info">
                <span><?php date_default_timezone_set("Iceland");
                      echo date("h:iA"); ?></span>
                Time is Money!
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="sm-st clearfix">
              <span class="sm-st-icon fourthIcon"><i class="fa fa-diamond"></i></span>
              <div class="sm-st-info">
                <span>4</span>
                Total Categorys
              </div>
            </div>
          </div>
        </div>
        <!-- Main row -->
        <div class="row">
          <div class="col-md-8">
            <section class="panel tasks-widget">
              <div class="dashTitle"> New Review's </div>
              <div class="panel-body">
                <div class="task-content">
                  <ul class="task-list">
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp" style="display:inline;">Great Store! Found many great things...</span>
                        <p style="display:inline;" class="theBlue">Second Live</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">My favorite teachers are Karen and ...</span>
                        <p style="display:inline;" class="theGreen">Yoga</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">I think this place has closed...</span>
                        <p style="display:inline;" class="thePink">Brunch</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">So mutch fun seing all this things from...</span>
                        <p style="display:inline;" class="theYellow">Gallery</p>
                        <div class="pull-right">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">I like this store much better than...</span>
                        <p style="display:inline;" class="theBlue">Second Live</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">Great healty food, for all familymembers...</span>
                        <p style="display:inline;" class="thePink">Brunch</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">Really expensive and not that great...</span>
                        <p style="display:inline;" class="theYellow">Gallery</p>
                        <div class="pull-right">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">My favorite teachers are Karen and ...</span>
                        <p style="display:inline;" class="theGreen">Yoga</p>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class=" add-task-row">
                  <a class="btn btn-sm dashAdd pull-left" href="#">Add New Tasks</a>
                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-4">
            <section class="panel">
              <div class="dashTitle"> Notifications </div>
              <div class="panel-body" id="noti-box">
                <div class="alert alert-block thirdIcon">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                  </button>
                  Jónatan just published <strong>Brunch</strong> category with 12 places.
                </div>
                <div class="alert firstIcon">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                  </button>
                  Davíð loves <strong>Yoga</strong> and is working on this category.
                </div>
                <div class="alert secoundIcon">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                  </button>
                  Smári asked for access to <strong>Art Galleries</strong>, where great interest exist's.
                </div>
                <div class="alert fifthIcon">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                  </button>
                  <strong>Drinks&Coctails</strong> are missing author... Maybe Alli?
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <section class="panel">
              <div class="dashTitle"> Work Progress </div>
              <div class="panel-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project</th>
                      <th>Manager</th>
                      <th>Status</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Second Live</td>
                      <td>Smári</td>
                      <td><p class="theBlue">In progress</p></td>
                      <td><p class="theBlue"> 25% </p></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Brunch</td>
                      <td>Jónatan</td>
                      <td><p class="thePink">completed</p></td>
                      <td><p class="thePink"> 100% </p></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Yoga</td>
                      <td>Davíð</td>
                      <td><p class="theGreen">In progress</p></td>
                      <td><p class="theGreen"> 65% </p></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Drinks & Coctails</td>
                      <td>Alli</td>
                      <td><p class="thePurple">Not started</p></td>
                      <td><p class="thePurple"> 0% </p></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Gallery</td>
                      <td>?</td>
                      <td><p class="theYellow">Not started</p></td>
                      <td><p class="theYellow"> 0% </p></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </div><!--end col-6 -->
        <div class="col-md-4">
          <section class="panel">
              <div class="panel">
                <div class="dashTitle"> The Team </div>
                <ul class="list-group teammates">
                  <li class="dashUserLi">
                    <a href=""><img src="images/admin_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Katrín D.</p>
                    <p style="display:inline;" class="pull-right thePrimary">Admin</p>
                  </li>
                  <li class="dashUserLi">
                    <a href=""><img src="images/admin_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Birna Bryndís</p>
                    <p style="display:inline;" class="pull-right thePrimary">Admin</p>
                  </li>
                  <li class="dashUserLi">
                    <a href=""><img src="images/brunch_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Jónatan</p>
                    <p style="display:inline;" class="pull-right theBrown">Editor</p>
                  </li>
                  <li class="dashUserLi">
                    <a href=""><img src="images/yoga_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Davíð</p>
                    <p style="display:inline;" class="pull-right theGreen">Editor</p>
                  </li>
                  <li class="dashUserLi">
                    <a href=""><img src="images/secondlife_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Smári</p>
                    <p style="display:inline;" class="pull-right theBlue">Editor</p>
                  </li>
                  <li class="dashUserLi">
                    <a href=""><img src="images/drink_icon.svg"  width="50" height="50"></a>
                    <p style="display:inline;">Alli Metall</p>
                    <p style="display:inline;" class="pull-right thePurple">Editor</p>
                  </li>
                </ul>
                <div class="panel-footer bg-white">
                  <button class="btn dashAdd2 btn-addon btn-sm">
                    <i class="fa fa-plus"></i>
                    Add Teammate
                  </button>
                </div>
              </div>
            </section>
          </div>
        </div>
      <!-- row end -->
      </section><!-- /.content -->
    </div>
  </div>
<?php include('includes/footer.php')  ?>