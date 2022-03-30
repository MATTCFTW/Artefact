<?php
require "includes/config.php";
session_start();
if (isset($_SESSION["users_id"])) { //testing if the user is signed in as only users can manage posts
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
  <?php
  require_once "includes/functions.inc.php";
  $user_id = $_SESSION["users_id"];
  displayName($dbConnection, $user_id);

  ?>
  <!-- users name -->
  <!-- appointments section on left with "book now" and "view my appointments" -->
  <a href="<?php echo $siteUrl; ?>/services.php" class="btn btn-danger bn-lg mr-2">Book an Appointment</a>

  <!-- view appointments takes to hidden appointments page where they can be seen and removed-->
  <a href="<?php echo $siteUrl; ?>/appointments.php" class="btn btn-danger bn-lg mr-2">View your Appointments</a>
  <!-- delete account button? -->


  <!-- logout button -->
  <a href="/includes/logout.inc.php" class="btn btn-danger bn-lg mr-2">Logout</a>

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