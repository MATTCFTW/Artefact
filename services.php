<?php
require "includes/config.php";
session_start();
include_once "head.php";
if (isset($_GET["error"])) {  //checks url for an error parameter
  if ($_GET["error"] == "none") { //each if statement displays an appropriate message on screen for the user
    echo '<script language="javascript">';
    echo 'alert("Appointment created, you will be contacted soon for consultation to finalise your booking")';
    echo '</script>';
  } else if ($_GET["error"] == "fieldsblank") {
    echo '<script language="javascript">';
    echo 'alert("Please complete all fields when making a booking")';
    echo '</script>';
  }
  // add testing failed

}
?>

<body class="services-body">
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>
  <!-- content -->
  <div class="container"></div>
  <div class="row d-flex justify-content-center">
    <div class="menu-content pb-60 col-lg-10">
      <div class="title text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-6 bg-custom d-none d-lg-block px-0 services-title-box">
              <h1 class="mb-10 services-heading">Our Services</h1>
              <p>Take a look at how we can help you today</p>
              <div class="border-top border-primary w-50 mx-auto my-3"></div>
            </div>
          </div>
        </div>
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
    </div>

    <!-- footer -->
    <?php
    include_once 'footer.php';
    ?>

    <!-- Scripts -->
    <script src="<?php echo $siteUrl; ?>/JS/jquery-3.5.1.min.js"></script>
    <script src="<?php echo $siteUrl; ?>/JS/popper.min.js"></script>
    <script src="<?php echo $siteUrl; ?>/JS/bootstrap.min.js"></script>

    </html>