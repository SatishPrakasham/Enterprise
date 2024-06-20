<?php
// delete_promotion.php

// Include the database connection file
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the image path to delete the file
    $stmt = $conn->prepare("SELECT image FROM promotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image_path);
    $stmt->fetch();
    $stmt->close();

    // Delete the promotion from the database
    $stmt = $conn->prepare("DELETE FROM promotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Delete the image file from the server
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        echo "Promotion deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();

    // Redirect back to the promotions page
    header("Location: promotion_update.php");
    exit;
} else {
    echo "No promotion ID provided.";
}
