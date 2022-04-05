<?php
if (isset($_POST["submit"])) { //checks the user pressed the login button
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  require_once "config.php";
  require_once "functions.inc.php";

  if (fieldsBlank($email, $pwd) == true) { //tests if the user entered data into all fields
    header("location: ../login.php?error=fieldsblank"); //errors given will be used in a url parameter check to help the user
    exit();
  }
  if (inputValid($dbConnection, $email, $pwd) == false) { //tests login credentials entered
    header("location: ../login.php?error=incorrectlogin");
    exit();
  } else {
    header("location: ../?error=none"); //successful login, returns to home page
    exit();
  }
} else {
  header("location: ../login.php");
  exit();
}