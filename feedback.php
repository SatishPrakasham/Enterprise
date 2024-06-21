<?php
include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$rating = $conn->real_escape_string($_POST['rating']);
$comments = $conn->real_escape_string($_POST['comments']);

// Prepare SQL query
$sql = "INSERT INTO newfeedback (name, email, rating, comments) VALUES ('$name', '$email', '$rating', '$comments')";

if ($conn->query($sql) === TRUE) {
    // Redirect to index.php on success
    header("Location: index.php");
    exit(); // Make sure that code below does not get executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>