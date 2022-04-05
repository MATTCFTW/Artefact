<?php
/*
script called when user presses logout
clears all session variables and returns them to home page
*/
session_start();
session_unset();
session_destroy();
header("location: ../");
exit();