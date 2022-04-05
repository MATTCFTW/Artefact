<?php
require_once "config.php";
require_once "functions.inc.php";

if (isset($_POST["book"])) { //checks the user pressed the submit button
  $doctor = $_POST["doctor"];
  $patient = $_POST["patient"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $option = $_POST["option"];

  if (fieldsBlank($patient, $option, $doctor, $date, $time) == true) { //tests if the user entered data into all fields
    header("location: ../services.php?error=fieldsblank"); //errors given will be used in a url parameter check to help the user
    exit();
  }
  createBooking($dbConnection, $doctor, $patient, $date, $time, $option); //creates the account
}