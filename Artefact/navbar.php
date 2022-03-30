<nav class="navbar navbar-dark navbar-expand-lg colour-black">
  <a class="navbar-brand" href="<?php echo $siteUrl; ?>">Health Clinic</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="ml-auto navbar-nav">
      <li class="nav-item"><a class="nav-link active" href="<?php echo $siteUrl; ?>">Home</a></li>
      <li class='nav-item'><a class='nav-link active' href=''>About us</a></li>
      <li class='nav-item'><a class='nav-link active' href="<?php echo $siteUrl; ?>/services.php">Services</a> </li>
      <li class='nav-item'><a class='nav-link active' href=''>Doctors</a></li>
      <li class='nav-item'><a class='nav-link active' href=''>FAQ</a></li>
      <li class='nav-item'><a class='nav-link active' href=''>Contact us</a></li>
      <?php
      if (isset($_SESSION["users_id"])) { //navbar contents dependant on if a user is logged in or not
        echo "<li class='nav-item'><a class='nav-link active' href='" . $siteUrl . "/patientDashboard.php'>My Dashboard</a></li>";
      } else {
        echo "<li class='nav-item'><a class='nav-link active' href='" . $siteUrl . "/signup.php'>Register</a></li>";
        echo "<li class='nav-item'><a class='nav-link active' href='" . $siteUrl . "/login.php'>Login</a></li>";
      }
      ?>
    </ul>
  </div>
</nav>