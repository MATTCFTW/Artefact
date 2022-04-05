<?php
require_once "config.php";
require_once "functions.inc.php";
session_start();

if (isset($_SESSION["users_id"])) { //testing if the user is signed in
  if (isset($_GET["id"])) {
    $users_id = $_SESSION["users_id"];
    $appointmentId = $_GET["id"];
    deleteAppointment($users_id, $appointmentId, $dbConnection);
  } else {
    header("location: $siteUrl"); //returns user to home page if no url parameter value
    exit();
  }
} else {
  header("location: $siteUrl"); //returns user to home page if not logged in
  exit();
}