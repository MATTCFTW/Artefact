<?php
require "includes/config.php";
include_once "head.php";
?>

<body class="login-bg">
  <!-- nav bar -->
  <?php
  include_once "navbar.php";
  ?>
  <!-- content -->
  <div class="container">
    <div class="row justify-content-md-center nav-padding">
      <div class="col-md-6 col-md-auto login-box">
        <h1 class="text-center text-red">Log in</h1>
        <h2 class="text-center login-h2">Enter details to log in</h2>
        <hr>
        <form action="<?php echo $siteUrl; ?>/includes/login.inc.php" method="POST">
          <div class="form-row">
            <div class="col-md-12">
              <input type="text" class="form-control-lg form-control text-input" name="email" placeholder="email">
            </div>
            <div class="col-md-12">
              <input type="password" class="form-control-lg form-control text-input" name="pwd" placeholder="password">
            </div>
            <?php
            if (isset($_GET["error"])) { //checks url for an error parameter
              if ($_GET["error"] == "fieldsblank") { //each if statement displays an appropriate message on screen for the user
                echo "<h2 class='text-center response-text-fail'>Please complete all fields</h2>";
              } else if ($_GET["error"] == "notfound") {
                echo "<h2 class='text-center response-text-fail'>No account is associated with this email</h2>";
              } else if ($_GET["error"] == "incorrectlogin") {
                echo "<h2 class='text-center response-text-fail'>Invalid Login</h2>";
              }
            }
            ?>
            <button type="submit" class="btn btn-lg btn-block login-button" name="submit">Log in</button>
        </form>
      </div>
    </div>
  </div>

</body>
<!-- Scripts -->
<script src="<?php echo $siteUrl; ?>/JS/jquery-3.5.1.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/popper.min.js"></script>
<script src="<?php echo $siteUrl; ?>/JS/bootstrap.min.js"></script>

</html>