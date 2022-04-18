<?php
require "includes/config.php";
session_start();
include_once "head.php";
include_once "includes/functions.inc.php";

if (isset($_GET["login"])) {
  if ($_GET["login"] == "false") {
    echo '<script language="javascript">';
    echo 'alert("Please log in to submit a review")';
    echo '</script>';
  }
}

if (isset($_POST['confirmReview'])) {
  $doctorID = $_POST['id'];
  $prof = $_POST['professional'];
  $friendly = $_POST['friendly'];
  $know = $_POST['know'];

  addReview($dbConnection, $doctorID, $prof, $friendly, $know);
}
?>

<body>
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>

  <!-- content -->
  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>Our Team</h1>
      </div>
    </section>
    <div class="wrapper doctor-margin">
      <div class="container">
        <!-- doctor's information container -->
        <div class="wrapper">
          <?php
          require_once "includes/functions.inc.php";
          //doctors data for body
          getDoctors($dbConnection);
          ?>
        </div>
        <!-- end container -->
      </div>
      <!-- end wrapper -->
    </div>
  </main>


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