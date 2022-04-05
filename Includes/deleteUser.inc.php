<?php
require_once "config.php";
require_once "functions.inc.php";

session_start();

if (isset($_SESSION["users_id"])) { //testing if the user is signed in
  if (isset($_GET["id"])) {
    $users_id = $_GET["id"];
    deleteUser($users_id, $dbConnection);
    $role = $_SESSION["role_id"];
    if ($role == 1) {
      session_start();
      session_unset();
      session_destroy();
      header("location: ../");
      exit();
    } else if ($role == 2) {
      header("location: ../adminUserList.php");
    }
  } else {
    header("location: $siteUrl"); //returns user to home page if no url parameter value
    exit();
  }
} else {
  header("location: $siteUrl"); //returns user to home page if not logged in
  exit();
}