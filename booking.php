<?php
require "includes/config.php";
require "includes/functions.inc.php";
session_start();
if (isset($_SESSION["users_id"]) && isset($_GET["option"])) { //checks for logged in user and option set in url parameter
  $patient_id = $_SESSION["users_id"]; //patient id to be submitted in appointment creation

  if (
    $_GET["option"] === "physio" || //checks valid parameters
    $_GET["option"] === "occupational" ||
    $_GET["option"] === "massage"
  ) {
    $option_chosen = $_GET["option"]; //option to be submitted in appointment creation
  } else {
    header("location: $siteUrl"); //returns user to home page for editing the url parameter
    exit();
  }
} else {
  header("location: $siteUrl"); //returns user to home page if not met
  exit();
}

include_once "head.php";
?>

<body>
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>
  <!-- content -->
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register for Appointment</h1>
              <p class="text-h3">Complete the following form to hear back from one of our medical professionals</p>
            </div>
          </div>
          <form method="post" action="/includes/booking.inc.php">
            <input type="hidden" name="patient" value="<?php echo $patient_id ?>" />
            <input type="hidden" name="option" value="<?php echo $option_chosen ?>" />
            <div class="form-group">
              <label for="doctor">Doctor :</label>
              <select name="doctor" class="form-control" id="doctor_">
                <option value="" disabled selected>Select your option</option>
                <?php
                chooseDoctor($dbConnection);
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Date :</label>
              <input type="date" id="date_" name="date" value="" max="2023-01-01" />
              <script>
                var today = new Date().toISOString().split('T')[0];
                document.getElementsByName("date")[0].setAttribute('min', today);
              </script>
            </div>
            <div class="form-group">
              <label for="time">Time Slot (Your Doctor Will Confirm Time) :</label>
              <select name="time" class="form-control" id="time_">
                <option value="" disabled selected>Select your option</option>
                <?php
                chooseTimeSlot($dbConnection);
                ?>
              </select>
            </div>
            <div class="row justify-content-start mt-4">
              <div class="col">
                <button class="btn btn-primary mt-4" name="book">Book Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
<!-- Scripts -->
<script src="<?php echo $siteUrl; ?>/JS/jquery-3.5.1.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/popper.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/bootstrap.min.js"></script>

</html>