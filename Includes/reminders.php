<?php

require_once "config.php";
require_once "functions.inc.php";

date_default_timezone_set("Europe/London");


$tomorrow = date('Y-m-d', strtotime(' +1 day'));
sendAppointmentReminders($dbConnection, $tomorrow);

$yesterday = date('Y-m-d', strtotime(' -1 day'));
sendReviewReminders($dbConnection, $yesterday, $siteUrl);