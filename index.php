<?php
require "includes/config.php";
session_start();
include_once "head.php";
?>

<body>
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>
  <!-- Image Carousel -->
  <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="8000">

    <!-- Carousel Content -->
    <div class="carousel-inner">
      <div class="carousel-item active"><img src="images/home-page/carousel/1.jpg" alt="image1" class="w-100">
        <div class="carousel-caption">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-8 bg-custom d-none d-lg-block py-3 px-0">
                <h1>Health Clinic</h1>
                <div class="border-top border-primary w-50 mx-auto my-3"></div>
                <h3 class="pb-3"></h3>
                <a href="#" class="btn btn-danger bn-lg mr-2">Learn More</a>
                <a href="<?php echo $siteUrl; ?>/services.php" class="btn btn-danger bn-lg mr-2">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item"><img src="images/home-page/carousel/2.jpg" alt="image2" class="w-100">
        <div class="carousel-caption">
          <div class="container">
            <div class="row justify-content-end text-right">
              <div class="col-5 bg-custom d-none d-lg-block py-3 px-0 pr-3 pb-3">
                <p class="lead">Keeping You Moving</p>
                <a href="#" class="btn btn-danger bn-lg mr-2">What we do</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item"><img src="images/home-page/carousel/3.jpg" alt="image3" class="w-100">
        <div class="carousel-caption">
          <div class="container">
            <div class="row justify-content-start
              text-left">
              <div class="col-5 bg-custom d-none d-lg-block py-3 px-0 pl-3 pb-3">
                <p class="lead">With You From Beginning to End</p>
                <a href="#" class="btn btn-danger bn-lg">See How We Can Help</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Carousel Content -->
    <!-- Previous & Next Buttons -->
    <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
      <span class="fas fa-chevron-left fa-3x"></span>
    </a>
    <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
      <span class="fas fa-chevron-right fa-3x"></span>
    </a>
    <!-- End Previous & Next Buttons -->
  </div>
  <!-- End Image Carousel -->
  <!-- Main Page Heading -->
  <div class="col-12 text-center mt-5">
    <h1 class="pt-4">The Road to Recovery Starts Somewhere...</h1>
    <div class="border-top border-primary w-25 mx-auto my-3"></div>
    <p class="lead">Make it here with us</p>
  </div>
  <!-- Start video-sec Area -->
  <section class="pb-100 pt-2" id="about">
    <div class="container">
      <div class="row justify-content-start align-items-center">
        <div class="col-lg-6 justify-content-center
          align-items-center d-flex">
          <div class="overlay overlay-bg"></div> <img src="images/home-page/active2.jpg" alt="\">
        </div>
        <div class="col-lg-6">
          <h6>Building stronger, happier & healthy lifestyles </h6>
          <h1>We Specialize in Recovery</h1>
          <p>
            <span>PHYSIOTHERAPY, OCCUPATIONAL THERAPY, MASSAGE THERAPY and more!</span></p>
          <p>Not only do we offer physiotherapy services, but also occupational therapy and massage therapy. We offer
            everything to get you back on your feet and moving!</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Start menu Area -->
  <section class="menu-area section-gap" id="coffee">
    <div class="container"></div>
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-60 col-lg-10">
        <div class="title text-center">
          <h1 class="mb-10">Our Services</h1>
          <p>Take a look at how we can help you today</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="single-menu">
          <div class="title-div justify-content-between d-flex">
            <h4>Physiotherapy
            </h4>
          </div>
          <p>Physiotherapy can be defined as a treatment method that focuses on the
            science of movement and helps people to restore, maintain and maximize their physical strength, function,
            motion and overall well-being by addressing the underlying physical issues. </p>
          <div class="single-menu__btn">
            <?php
            if (isset($_SESSION["users_id"])) { //testing if the user is signed in before they can access booking
              echo "<a href='/booking.php?option=physio' class='btn btn-outline-dark
              btn-lg'>Book Here</a></div>";
            } else {
              echo "<a href='/login.php' class='btn btn-outline-dark btn-lg'>Book Here</a></div>";
            }
            ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-menu">
            <div class="title-div justify-content-between d-flex">
              <h4>Occupational Therapy</h4>
            </div>
            <p> Occupational therapy is a client-centred health profession
              concerned with promoting health and well being through occupation. The primary goal of occupational
              therapy is to enable people to participate in the activities of everyday life. </p>
            <div class="single-menu__btn">
              <?php
              if (isset($_SESSION["users_id"])) { //testing if the user is signed in before they can access booking
                echo "<a href='/booking.php?option=occupational' class='btn btn-outline-dark
                btn-lg'>Book Here</a></div>";
              } else {
                echo "<a href='/login.php' class='btn btn-outline-dark btn-lg'>Book Here</a></div>";
              }
              ?>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-menu">
              <div class="title-div
            justify-content-between d-flex">
                <h4>Massage Therapy
                </h4>
              </div>
              <p> Massage Therapy is the manipulation of the body\' s soft tissues. Massage
                techniques are commonly applied with hands, fingers, elbows, knees, forearms, feet, or a device. The
                purpose of massage is generally for the treatment of body stress or pain. </p>
              <div class="single-menu__btn">
                <?php
                if (isset($_SESSION["users_id"])) { //testing if the user is signed in before they can access booking
                  echo "<a href='/booking.php?option=massage' class='btn btn-outline-dark
                  btn-lg'>Book Here</a></div>";
                } else {
                  echo "<a href='/login.php' class='btn btn-outline-dark btn-lg'>Book Here</a></div>";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
  </section>
  <!-- End menu Area -->
  <!-- Start Fixed Background IMG -->
  <div class="fixed-background">
    <div class="row text-light py-5">
      <div class="col-12 text-center">
        <h2>Organize & Schedule with Ease</h2>
        <!-- hide when user logged in -->
        <h3 class="py-4">See how we make scheduling appointments easier than ever</h3>
        <?php
        //hide button when user is logged in
        if (isset($_SESSION["users_id"])) {
        } else {
          echo "<a href='" . $siteUrl . "/signup.php' class='btn btn-primary btn-lg mr-2'>Create An Account To Use Our Booking App</a>";
        }
        ?>
      </div>
    </div>
    <div class="fixed-wrap">
      <div class="fixed"> </div>
    </div>
  </div>
  <!-- End Fixed Background IMG -->
  <!-- Three Column Section -->
  <div class="container">
    <div class="row my-5">
      <div class="col-md-4 my-4">
        <i class="fas fa-dumbbell w-100"></i>
        <h4 class="my-4">"Amazing. Incredible"
        </h4>
        <p>-Local Customer John.</p>
        <a href="#" class="btn btn-outline-dark btn-md">Reviews</a>
      </div>
      <div class="col-md-4 my-4"><i class="fas fa-biking w-100"></i>
        <h4 class="my-4">Any Questions?</h4>
        <p>We have tons of answers for your questions here.</p>
        <a href="#" class="btn btn-outline-dark btn-md">FAQ</a>
      </div>
      <div class="col-md-4 my-4"> <i class="fas fa-user-md w-100"></i>
        <h4 class="my-4">Locations</h4>
        <p>First time visitor ? Find out where to find us here.</p>
        <a href="#" class="btn btn-outline-dark btn-md">Location</a>
      </div>
    </div>
  </div>
  <!-- End Three Column Section -->
  <!-- Start Two Column Section -->
  <div class="container my-5">
    <div class="row py-4">
      <div class="col-lg-6 mb-6 my-lg-auto">
        <h4 class="my-4">"10/10 Would Use QC Health Clinic Again"</h4>
        <p>-Our Users</p>
        <a href="#" class="btn btn-outline-dark btn-lg">Return to Top</a>
      </div>
      <div class="col lg-8"><img src="images/home-page/active1.jpg" alt="\" class="w-75"></div>
    </div>
  </div>
  <!-- End Two Column Section -->
  <!-- Start Jumbotron -->
  <div class="jumbotron py-5 mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-8 col-xl-9 my-auto"> We are here to help </div>
        <div class="col-md-5 col-lg-4 col-xl-3"> <a href="#" class="btn btn-primary
            btn-lg">Contact Today</a></div>
      </div>
    </div>
  </div>
  <!-- End Jumbotron -->

  <!-- footer -->
  <?php
  include_once 'footer.php';
  ?>

</body>
<!-- Scripts -->
<script src="<?php echo $siteUrl; ?>/JS/jquery-3.5.1.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/popper.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/bootstrap.min.js"></script>

</html>