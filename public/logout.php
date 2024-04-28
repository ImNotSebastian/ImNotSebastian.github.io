<?php
session_start(); // Start session

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the index.php page
header("Location: index.php");
exit(); // Make sure to exit after redirection
?>
