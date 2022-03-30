<?php
if (isset($_POST["submit"])) { //checks the user pressed create the button
  $firstName = $_POST['f_name'];
  $lastName = $_POST['l_name'];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdConfirm = $_POST["pwd-repeat"];
  $role_id = 1; //default role id for users 

  require_once "config.php";
  require_once "functions.inc.php";

  if (fieldsBlank($firstName, $lastName, $email, $pwd, $pwdConfirm) == true) { //tests if the user entered data into all fields
    header("location: ../signup.php?error=fieldsblank"); //errors given will be used in a url parameter check to help the user
    exit();
  }
  if (emailExists($dbConnection, $email) == true) { //checks if username already exists in the database to prevent duplicates
    header("location: ../signup.php?error=usernametaken");
    exit();
  }
  if (pwdSame($pwdConfirm, $pwd) == true) {
    header("location: ../signup.php?error=passwordsdonotmatch"); //checks the user entered the same password twice
    exit();
  }
  registerUser($dbConnection, $firstName, $lastName, $email, $pwd, $role_id); //creates the account
} else {
  header("location: ../signup.php");
  exit();
}