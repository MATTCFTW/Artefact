<?php
session_start();

if (isset($_SESSION["users_id"])) { //testing if the user is signed in
  if (isset($_POST['submitReview'])) {
    $doctorId = $_POST["id"];
    $doctorName = $_POST["doctor_name"];
  } else {
    header("location: $siteUrl");
    exit();
  }
} else {
  header("location: " . $siteUrl . "/indexDoctor.php?login=false"); //returns user to home page if not logged in
  exit();
}

require "includes/config.php";
include_once "head.php";
?>

<body>
  <!-- Navbar -->
  <?php
  include_once "navbar.php";
  ?>

  <!-- content -->
  <section class="jumbotron text-center">
    <div class="container">
      <h1>Leave a Review for Dr. <?= $doctorName; ?></h1>
      <p class="text-muted"></p>
    </div>
  </section>
  <div class="py-5 review-padding-left bg-light">
    <div class="container">
      <form action="indexDoctor.php" method="post">
        <input type="hidden" name="id" value="<?= $doctorId; ?>" />
        <h1>Doctor Review</h1>
        <h4>How was your overall experience?</h4>
        <p>
          Rate 1 represents, "Below Expectation", and Rate 5 represents "Exceeds Expectation".
        </p>
        <table>
          <tr>
            <th style="width:230px"></th>
            <th style="width:100px">1</th>
            <th style="width:100px">2</th>
            <th style="width:100px">3</th>
            <th style="width:100px">4</th>
            <th style="width:100px">5</th>
          </tr>
          <tr>
            <td>Professional</td>
            <td><input type="radio" value="1" name="professional" required="required" /></td>
            <td><input type="radio" value="2" name="professional" required="required" /></td>
            <td><input type="radio" value="3" name="professional" required="required" /></td>
            <td><input type="radio" value="4" name="professional" required="required" /></td>
            <td><input type="radio" value="5" name="professional" required="required" /></td>
          </tr>
          <tr>
            <td>Friendliness</td>
            <td><input type="radio" value="1" name="friendly" required="required" /></td>
            <td><input type="radio" value="2" name="friendly" required="required" /></td>
            <td><input type="radio" value="3" name="friendly" required="required" /></td>
            <td><input type="radio" value="4" name="friendly" required="required" /></td>
            <td><input type="radio" value="5" name="friendly" required="required" /></td>

          </tr>
          <tr>
            <td>Knowledgeable</td>
            <td><input type="radio" value="1" name="know" required="required" /></td>
            <td><input type="radio" value="2" name="know" required="required" /></td>
            <td><input type="radio" value="3" name="know" required="required" /></td>
            <td><input type="radio" value="4" name="know" required="required" /></td>
            <td><input type="radio" value="5" name="know" required="required" /></td>
          </tr>
        </table>
        <button type="submit" name="confirmReview" class="btn btn-success mt-2" id="btn-submit">
          Submit Feedback
        </button>
      </form>
    </div>
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