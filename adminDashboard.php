<?php
require "includes/config.php";
session_start();
if (isset($_SESSION["users_id"]) && $_SESSION["role_id"] = 2) { //testing if the user is signed in and an admin
} else {
  header("location: $siteUrl"); //returns user to home page
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
          <div class="single-menu__btn">
            <a href="<?php echo $siteUrl; ?>/adminAppointmentsList.php" class="btn btn-danger bn-lg mr-2">View all
              appointments</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="single-menu">

          <div class="single-menu__btn">
            <a href="<?php echo $siteUrl; ?>/adminUserList.php" class="btn btn-danger bn-lg mr-2">View and manage
              users</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center justify-content-center">
    <!-- logout button -->
    <a href="/includes/logout.inc.php" class="btn btn-danger btn-lg bn-lg mr-2">Logout</a>
  </div>


  <!-- delete account button? -->

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