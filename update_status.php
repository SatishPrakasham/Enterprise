<?php
// update_status.php

// Database connection
require_once 'config.php'; // Ensure your config.php file connects to your database

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update status in database
    $query = "UPDATE orders SET status='$status' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Status updated successfully.";
        // Redirect or show confirmation message
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
