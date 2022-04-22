  <?php
  require "includes/config.php";
  session_start();
  if (isset($_SESSION["users_id"]) && $_SESSION["role_id"] = 2) { //testing if the user is signed in and an admin
  } else {
    header("location: $siteUrl"); //returns user to home page if not
    exit();
  }
  include_once "head.php";
  ?>

  <!-- content -->

  <body class="register-bg">
    <a class=" btn btn-danger btn-lg bn-lg back-butto mt-3 ml-3" href="adminUserList.php">Go back</a>
    <div class="container">
      <div class="row justify-content-md-center nav-padding">
        <div class="col-md-6 col-md-auto register-box">
          <h2 class="text-center register-h2">Enter details to create an account</h2>
          <hr>
          <form action="<?php echo $siteUrl; ?>/includes/signup.inc.php?admin=true" method="POST">
            <div class="form-row">
              <div class="col-md-12">
                <input type="text" class="form-control-lg form-control text-input" name="f_name"
                  placeholder="First name">
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control-lg form-control text-input" name="l_name"
                  placeholder="Last name">
              </div>
              <div class="col-md-12">
                <input type="email" class="form-control-lg form-control text-input" name="email" placeholder="email">
              </div>
              <div class="col-md-12">
                <input type="password" class="form-control-lg form-control text-input" name="pwd"
                  placeholder="password">
              </div>
              <div class="col-md-12">
                <input type="password" class="form-control-lg form-control text-input" name="pwd-repeat"
                  placeholder="confirm password">
              </div>
              <?php
              if (isset($_GET["error"])) {  //checks url for an error parameter
                if ($_GET["error"] == "none") { //each if statement displays an appropriate message on screen for the user
                  echo "<h2 class='text-center response-text-success'>Account created</h2>";
                } else if ($_GET["error"] == "fieldsblank") {
                  echo "<h2 class='text-center response-text-fail'>Please complete all fields</h2>";
                } else if ($_GET["error"] == "usernametaken") {
                  echo "<h2 class='text-center response-text-fail'>Email already in use</h2>";
                } else if ($_GET["error"] == "passwordsdonotmatch") {
                  echo "<h2 class='text-center response-text-fail'>Passwords do not match</h2>";
                } else if ($_GET["error"] == "testingfailed") {
                  echo "<h2 class='text-center response-text-fail'>The system could not handle the request at this time</h2>";
                }
              }
              ?>
              <button type="submit" class="btn btn-lg btn-block create-button" name="submit">Create</button>
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