<?php
$host = 'localhost';
$dbname = 'flex_db';
$username = 'username';
$password = 'password';

// Create a new mysqli object
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure a session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
