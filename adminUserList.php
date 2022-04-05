<?php
require "includes/config.php";
session_start();
if (isset($_SESSION["users_id"]) && $_SESSION["role_id"] = 2) { //testing if the user is signed in and admin
} else {
  header("location: $siteUrl"); //returns user to home page if not logged in
  exit();
}
include_once "head.php";
?>

<body>
  <!--APPOINTMENTS-->
  <section class="my-4 shadow-sm"">
  <a class=" btn btn-danger btn-lg bn-lg mr-2 back-button" href="adminDashboard.php">Go back</a>
    <a class=" btn btn-danger btn-lg bn-lg mr-2 back-button" href="adminCreateUser.php">Create user</a>
    <h2 class="my-3 ml-3">Appointments</h2>
    <div class="container-fluid">
      <div class="mb-3">
        <table class="table overflow-scroll">
          <thead>
            <tr>
              <th>User Id</th>
              <th>First name</th>
              <th>Last name</th>
              <th>Email</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once "includes/functions.inc.php";
            listUsers($dbConnection);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!--END OF APPOINTMENTS-->
  <!-- footer -->
  <?php
  include_once 'footer.php';
  ?>

</body>

<!-- Scripts -->
<script src="<?php echo $siteUrl; ?>/JS/jquery-3.5.1.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/popper.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/bootstrap.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/script.js"> </script>

</html>