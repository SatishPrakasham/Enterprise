<?php

session_start();
session_unset(); // Unset all session variables

// Destroy the session
session_destroy();

// Redirect to login page
header('location: admin_login.php');
exit;

?>