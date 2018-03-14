<?php
include('includes/config.php');
include('includes/header.php');
?>
  <div class="landing_page">
    <img class="logo_img" src="images/logo_white.svg">

    <div class="underTitle_text">
      <h2>The best of everything in Reykjavik?<br>Check out some of our awesome top lists</h2>
    </div>

    <div class="scrolldown_icon">
      <img src="images/scrolldown_icon.svg">
    </div>

    <div class="landingpage_container">

      <div class="landingpageAll_cards">
        <ul class="grid cs-style-3">
            <?php getCategorys(); ?>
  			</ul>
    	</div>

      <div class="landingpage_idea_container">
        <div class="landingpage_ideas">
          <img class="ideas_img" src="images/ideas_icon.svg">
          <div class="ideas_text">
            <h2>Do you have a great idea of a top list you would love to see?
              <br>Where.is has a passion for helping people find the best of everything in Reykjavik, Iceland.
              <br>We invite you to make a Top List of your choosing, just <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank">pitch us</a> an idea and get your very own Where.is login.
              It´s as easy as can be, you just see!</h2>
          </div>
        </div>
      </div>

      <div class="landingpageAll_cards">

        <ul class="grid cs-style-3">
          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/vegan_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>Vegan</h3>
                        <p>Where are good vegan resturants in Reykjvavik?</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/hairsalon_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>Hair Salons</h3>
                        <p>What are the 20 Top Hair Salons in Reykjavik?</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/spa_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>Spa & Wellness</h3>
                        <p>Are you an expert in relaxation in Reykjavik?</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/excercise_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>EXERCISE</h3>
                        <p>Best places to exercice in Reykjavik</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/music_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>Music</h3>
                        <p>Map for the music lover. Stores & festivals in RVK</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <div class="blue2">
                <a class="landingpage_card" >
                      <div class="landingpage_card_icon">
                        <img src="images/monuments_icon.svg" height="80px">
                      </div>
                      <div class="landingpage_card-text">
                        <h3>Monuments</h3>
                        <p>Cool monuments in Reykjavik? Where?</p>
                      </div>
                </a>
              </div>
              <figcaption class="grey_fig">
                <h3>Top List</h3>
                <p>by you maybe??</p>
                <a href="mailto:idea@where.is?Subject=New%20Idea" target="_blank"><img src="images/arrow_inn_icon.svg" height="25px"></a>
              </figcaption>
            </figure>
          </li>

        </ul>

      </div>
    </div>

  </div>

  <?php
  include('includes/footer.php');
  ?>
