<?php
$siteUrl = "http://artefact.test"; //variable for the site url for maintainability

//database connection
$username = "root";
$password = "";
$host = "localhost";
$port = 3306;
$databaseName = "clinic";

$dbConnection = mysqli_init();
if (!$dbConnection) {
  echo "initialising failed";
} else {

  mysqli_ssl_set($dbConnection, null, null, null, '/public_html/sys_tests', null);
  mysqli_real_connect($dbConnection, $host, $username, $password, $databaseName, $port, null, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
  if (mysqli_connect_errno()) {
    echo "<p>Failed to connect to MySQL. " .
      "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error() . "</p>";
  }
}