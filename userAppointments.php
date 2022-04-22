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
  <!--appointments -->
  <section class="my-4 shadow-sm"">
  <a class=" btn btn-danger btn-lg bn-lg mr-2 back-button" href="patientDashboard.php">Go back</a>
    <h2 class=" my-3 ml-3">Appointments</h2>
    <div class="container-fluid">
      <div class="mb-3">
        <table class="table overflow-scroll">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time Slot</th>
              <th>Doctor Name</th>
              <th>Appointment type</th>
              <th>Cancellation</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once "includes/functions.inc.php";
            $users_id = $_SESSION["users_id"];
            listAppointments($dbConnection, $users_id)
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

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