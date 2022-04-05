<?php

//Check for blank fields
function fieldsBlank()
{
  foreach (func_get_args() as $arg) {
    if (empty($arg)) {
      return true;
    }
  }
  return false;
}

//User registration
function emailExists($dbConnection, $email)
{
  $sql = "SELECT * FROM users WHERE email = ?"; //prepared statements are used to prevent sql injection
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) { //testing if the statement syntax is possible
    header("location: ../signup.php?error=testingfailed"); //error displayed in url if connection fails
    exit();
  }
  mysqli_stmt_bind_param($test, "s", $email); //binds variable to the sql statement, "s" represents a string
  mysqli_stmt_execute($test); //performs sql statement
  $exists = mysqli_stmt_get_result($test); //creates a variable from with the results

  if (mysqli_num_rows($exists) > 0) { //if any results found it means the email is in use
    mysqli_stmt_close($test);
    return true;
  } else {
    mysqli_stmt_close($test);
    return false;
  }
}

function pwdSame($pwdConfirm, $pwd)
{
  if ($pwdConfirm !== $pwd) { //checking both user entered passwords are identical
    return true;
  } else {
    return false;
  }
}

function registerUser($dbConnection, $firstName, $lastName, $email, $pwd, $role_id, $admin)
{
  $sql = "INSERT INTO users (firstName, lastName, email , pass ,role_id) VALUES (?, ?, ?, ?, ?);";
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    if ($admin == TRUE) {
      header("location: ../adminCreateUser.php?error=testingfailed");
      exit();
    } else {
      header("location: ../signup.php?error=testingfailed");
      exit();
    }
  }
  $hash = password_hash($pwd, PASSWORD_DEFAULT); //hashing the password so it cannot be stolen from the database

  mysqli_stmt_bind_param($test, "sssss", $firstName, $lastName, $email, $hash, $role_id); //bind variables to the statement
  mysqli_stmt_execute($test); //execute statement
  mysqli_stmt_close($test);

  if ($admin == TRUE) {
    header("location: ../adminCreateUser.php?error=none");
  } else {
    header("location: ../signup.php?error=none");
  } //used for success message for user
  exit();
}

//user login
function inputValid($dbConnection, $email, $pwd)
{
  $sql = "SELECT pass FROM users WHERE email = ?"; //getting the password hash for the username entered
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    header("location: ../login.php?error=testingfailed");
    exit();
  }
  mysqli_stmt_bind_param($test, "s", $email);
  mysqli_stmt_execute($test);
  $result = mysqli_stmt_get_result($test);

  if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_array()[0]; //gets the returned result as an array, uses a variable to store the string in the first index
    if (password_verify($pwd, $row)) { //prebuilt function that compares given string to a hash, passes if they match
      session_start(); //starts php session so user variables can be stored

      $sqlId = "SELECT users_id FROM users WHERE email = ?";
      mysqli_stmt_prepare($test, $sqlId);
      mysqli_stmt_bind_param($test, "s", $email);
      mysqli_stmt_execute($test);
      $queryId = mysqli_stmt_get_result($test);
      $_SESSION["users_id"] = $queryId->fetch_array()[0]; //session variable for the users id

      $sqlRole = "SELECT role_id FROM users WHERE email = ?";
      mysqli_stmt_prepare($test, $sqlRole);
      mysqli_stmt_bind_param($test, "s", $email);
      mysqli_stmt_execute($test);
      $queryRole = mysqli_stmt_get_result($test);
      $_SESSION["role_id"] = $queryRole->fetch_array()[0]; //session variable for the users role (normal/admin)

      mysqli_stmt_close($test);
      return true; //returns true if credentials are valid, user is logged in
    } else {
      mysqli_stmt_close($test);
      return false;
    }
  } else {
    mysqli_stmt_close($test);
    header("location: ../login.php?error=notfound");
    exit();
  }
}

function displayName($dbConnection, $user_id)
{
  $sql = "SELECT firstName, lastName FROM users WHERE users_id = $user_id";
  $result = mysqli_query($dbConnection, $sql);

  $row = mysqli_fetch_assoc($result);

  $fname = $row['firstName'];
  $lname = $row['lastName'];


  echo "<h2 class='text-center dashboard-heading'> Welcome " . $fname . " " . $lname . "</h2>";
}

function chooseDoctor($dbConnection)
{
  $sql = "SELECT first_name, last_name, doctor_id FROM doctor";
  $result = mysqli_query($dbConnection, $sql);
  while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['doctor_id'] . "'> Dr " . $row['first_name']   . " " . $row['last_name'] . "</option>";
  }
}

function chooseTimeSlot($dbConnection)
{
  $sql = "SELECT time_slot, time_id FROM times";
  $result = mysqli_query($dbConnection, $sql);
  while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['time_id'] . "'>" . $row['time_slot']   . "</option>";
  }
}

function createBooking($dbConnection, $doctor, $patient, $date, $time, $option)
{
  $sql = "INSERT INTO appointments (doctor_id, patient_id, date_chosen, time_slot_id, option_chosen) VALUES (?, ?, ?, ?, ?);";
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    header("location: ../services.php?error=testingfailed");
    exit();
  }

  mysqli_stmt_bind_param($test, "sssss", $doctor, $patient, $date, $time, $option); //bind variables to the statement
  mysqli_stmt_execute($test); //execute statement
  mysqli_stmt_close($test);
  header("location: ../services.php?error=none"); //used for success message for user
  exit();
}

function listAppointments($dbConnection, $users_id)
{
  $sql = "SELECT doctor_id, date_chosen, time_slot_id, option_chosen, appointment_id FROM appointments WHERE patient_id = $users_id"; //fetches all appointments for that user
  $result = mysqli_query($dbConnection, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $doctorId = $row["doctor_id"]; //doctor Id
    $doctorSql = "SELECT first_name, last_name FROM doctor WHERE doctor_id in (SELECT doctor_id FROM appointments WHERE doctor_id='$doctorId')"; //retrieves matching data name
    $doctorQuery = mysqli_query($dbConnection, $doctorSql); //perform query
    $doctorResult = mysqli_fetch_assoc($doctorQuery); //result to be formatted
    $doctorName = "Dr " . $doctorResult["first_name"] . " " . $doctorResult["last_name"]; //format

    $timeId = $row["time_slot_id"];
    $timeSql = "SELECT time_slot FROM times WHERE time_id in (SELECT time_slot_id FROM appointments WHERE time_slot_id='$timeId')"; //retrieves matching data name
    $timeQuery = mysqli_query($dbConnection, $timeSql); //perform query
    $timeResult = mysqli_fetch_assoc($timeQuery); //result to be formatted
    $timeSlot = $timeResult["time_slot"]; //format

    $option = $row["option_chosen"]; //therapy type chosen by user
    $date = $row["date_chosen"]; //date picked by user
    $appointmentId = $row["appointment_id"];

    echo "<tr>";
    echo "<td>" . $date . "</td>";
    echo "<td>" . $timeSlot . "</td>";
    echo "<td>" . $doctorName . "</td>";
    echo "<td>" . $option . "</td>";
    echo "<td> <a href='/includes/deleteAppointment.inc.php?id=" . $appointmentId . "' class='nav-link mb-2'>Cancel</a></td>";
    echo "</tr>";
  }
}

function listUsers($dbConnection)
{
  $sql = "SELECT users_id, firstName, lastName, email FROM users WHERE role_id = 1"; //fetches all appointments for that user
  $result = mysqli_query($dbConnection, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $users_id = $row["users_id"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $email = $row["email"];

    echo "<tr>";
    echo "<td>" . $users_id . "</td>";
    echo "<td>" . $firstName . "</td>";
    echo "<td>" . $lastName . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td> <a href='/includes/deleteUser.inc.php?id=" . $users_id . "' class='nav-link mb-2'>Delete User</a></td>";
    echo "</tr>";
  }
}

function allAppointments($dbConnection)
{
  $sql = "SELECT patient_id, doctor_id, date_chosen, time_slot_id, option_chosen, appointment_id FROM appointments ORDER BY date_chosen"; //fetches all appointments for that user
  $result = mysqli_query($dbConnection, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $doctorId = $row["doctor_id"]; //doctor Id
    $doctorSql = "SELECT first_name, last_name FROM doctor WHERE doctor_id in (SELECT doctor_id FROM appointments WHERE doctor_id='$doctorId')"; //retrieves matching data name
    $doctorQuery = mysqli_query($dbConnection, $doctorSql); //perform query
    $doctorResult = mysqli_fetch_assoc($doctorQuery); //result to be formatted
    $doctorName = "Dr " . $doctorResult["first_name"] . " " . $doctorResult["last_name"]; //format

    $timeId = $row["time_slot_id"];
    $timeSql = "SELECT time_slot FROM times WHERE time_id in (SELECT time_slot_id FROM appointments WHERE time_slot_id='$timeId')"; //retrieves matching data name
    $timeQuery = mysqli_query($dbConnection, $timeSql); //perform query
    $timeResult = mysqli_fetch_assoc($timeQuery); //result to be formatted
    $timeSlot = $timeResult["time_slot"]; //format

    $option = $row["option_chosen"]; //therapy type chosen by user
    $date = $row["date_chosen"]; //date picked by user
    $patientId = $row["patient_id"];

    echo "<tr>";
    echo "<td>" . $patientId . "</td>";
    echo "<td>" . $date . "</td>";
    echo "<td>" . $timeSlot . "</td>";
    echo "<td>" . $doctorName . "</td>";
    echo "<td>" . $option . "</td>";
    echo "</tr>";
  }
}


function deleteAppointment($users_id, $appointmentId, $dbConnection)
{
  $sql = "DELETE FROM appointments WHERE appointment_id = ? AND patient_id = ?";
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    exit();
  }
  mysqli_stmt_bind_param($test, "ss", $appointmentId, $users_id);
  mysqli_stmt_execute($test);
  mysqli_stmt_close($test);
  header("location: ../userAppointments.php?error=none");
  exit();
}

function deleteUser($users_id, $dbConnection)
{
  $sql = "DELETE FROM users WHERE users_id = ?";
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    exit();
  }
  mysqli_stmt_bind_param($test, "s", $users_id);
  mysqli_stmt_execute($test);
  mysqli_stmt_close($test);
}