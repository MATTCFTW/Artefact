<h1 class="text-center" style="margin:1em 0em;">
  <u>Dr. <?php echo $firstName; ?></u>
</h1>

<div class="row">
  <div class="col">
    <!-- General-Information -->
    <div>
      <h3>Personal Information</h3>
    </div>
    <div>
      <div>
        <strong>Full Name</strong>
        <br>
        <p class="text-muted">
          <span><?php echo $firstName; ?></span>
          <span><?php echo $lastName; ?></span>
        </p>
      </div>
      <div>
        <strong>Email</strong>
        <br>
        <p class="text-muted"><?php echo $email; ?></p>
      </div>
    </div>
    <!-- Expertise -->
    <div>
      <div>
        <h3>Expertise</h3>
      </div>
      <div>
        <?php echo $expertise; ?>
      </div>
    </div>
    <!-- Expertise -->

  </div><!-- General-Information ENDS-->

  <!-- Biography/ Personal Information -->
  <div class="col-5">
    <div>
      <div>
        <h3>Biography</h3>
      </div>
      <div>
        <p>
          <?php echo $biography; ?>
        </p>
      </div>
    </div>

  </div><!-- Biography/ Personal Information ENDS-->

  <!--Display Reviews about the Doctor -->
  <div class="col">
    <div>
      <div>
        <h3>Rating </h3>
        <h4>Based on <?php echo $reviewCount; ?> reviews.</h4>
      </div>

      <div>
        <div>
          <strong>Knowledge</strong>
          <br>
          <p class="text-muted"><?php echo $knowledgeAvg; ?></p>
        </div>
        <div>
          <strong>Friendly</strong>
          <br>
          <p class="text-muted"><?php echo $friendAvg; ?></p>
        </div>
        <div class="m-b-0">
          <strong>Professionalism</strong>
          <br>
          <p class="text-muted"><?php echo $professionalAvg; ?></p>
        </div>
      </div>
      <form action="submitReview.php" method="post">
        <input type="hidden" name="id" value="<?= $doctorId; ?>" />
        <input type="hidden" name="doctor_name" value="<?= $firstName; ?>" />
        <input type="submit" class="button btn btn-success" name="submitReview"
          value="<?php echo "Submit Review for Dr. " . $firstName . "  "; ?>" />
      </form>
    </div>
  </div>
</div>