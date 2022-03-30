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

function registerUser($dbConnection, $firstName, $lastName, $email, $pwd, $role_id)
{
  $sql = "INSERT INTO users (firstName, lastName, email , pass ,role_id) VALUES (?, ?, ?, ?, ?);";
  $test = mysqli_stmt_init($dbConnection);

  if (!mysqli_stmt_prepare($test, $sql)) {
    header("location: ../signup.php?error=testingfailed");
    exit();
  }
  $hash = password_hash($pwd, PASSWORD_DEFAULT); //hashing the password so it cannot be stolen from the database

  mysqli_stmt_bind_param($test, "sssss", $firstName, $lastName, $email, $hash, $role_id); //bind variables to the statement
  mysqli_stmt_execute($test); //execute statement
  mysqli_stmt_close($test);
  header("location: ../signup.php?error=none"); //used for success message for user
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

  echo "<div>";
  echo "<p> Welcome " . $fname . " " . $lname . "</p>";
  echo "</div>";
}