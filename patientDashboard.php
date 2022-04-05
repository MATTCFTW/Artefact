<?php
require "includes/config.php";
session_start();
if (isset($_SESSION["users_id"])) { //testing if the user is signed in
} else {
  header("location: $siteUrl"); //returns user to home page if not logged in
  exit();
}
include_once "head.php";
?>

<body>
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>
  <!-- patient dashboard -->
  <div class="container-fluid ">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">
          <?php
          require_once "includes/functions.inc.php";
          $user_id = $_SESSION["users_id"];
          displayName($dbConnection, $user_id);
          ?>
        </h3>
      </div>
    </div>
    <div class="row text-center justify-content-center">
      <div class="col-4">
        <div class="single-menu">
          <div class="title-div justify-content-center d-flex">
            <h4 class="text-center">Book an Appointment</h4>
          </div>
          <p class="dashboard-text">Click here to view our services and book an appointment and start the road of
            recovery</p>
          <img src="images/dashboard/chiro.jpg" class="dashboard-img">
          <div class="single-menu__btn">
            <a href="<?php echo $siteUrl; ?>/services.php" class="btn btn-danger bn-lg mr-2">Book Now</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="single-menu">
          <div class="title-div justify-content-center d-flex">
            <h4>View your appointments</h4>
          </div>
          <p class="dashboard-text"> Click here to view and manage all of your upcoming appointments </p>
          <img src="images/dashboard/spiritual.jpg" class="dashboard-img">
          <div class="single-menu__btn">
            <a href="<?php echo $siteUrl; ?>/userAppointments.php" class="btn btn-danger bn-lg mr-2">View your
              Appointments</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center justify-content-center">
    <!-- logout button -->
    <a href="/includes/logout.inc.php" class="btn btn-danger btn-lg bn-lg mr-2 mb-5">Logout</a>
  </div>

  <div class="row text-center justify-content-center">
    <!-- delete account button? -->
    <?php echo " <a href='/includes/deleteUser.inc.php?id=" . $_SESSION["users_id"] . "'  class='btn btn-danger btn-lg bn-lg mr-2'>Delete account</a>" ?>
  </div>

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