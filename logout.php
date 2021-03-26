<?php
// Initialize the session
session_start();

// Unset all of the session variables
unset($_SESSION["username"]);
unset($_SESSION["password"]);

$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit();
?>