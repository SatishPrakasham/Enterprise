<?php
// wprocess.php

// Include the database connection file
require_once 'config.php';

// Function to sanitize input data
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
        // Add new WProduct
        if ($action == 'add_wproduct') {
            $name = sanitize($conn, $_POST['name']);
            $description = sanitize($conn, $_POST['description']);
            $price = sanitize($conn, $_POST['price']);
            $stock_s = sanitize($conn, $_POST['stock_s']);
            $stock_m = sanitize($conn, $_POST['stock_m']);
            $stock_l = sanitize($conn, $_POST['stock_l']);
            
            // Handle file upload
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = 'uploads/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }
            
            $stmt = $conn->prepare("INSERT INTO wproducts (name, description, price, stock_s, stock_m, stock_l, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdiids", $name, $description, $price, $stock_s, $stock_m, $stock_l, $image);
            $stmt->execute();
            $stmt->close();
            header('Location: wadmin.php');
            exit;
        }
        
        // Update existing WProduct
        if ($action == 'update_wproduct') {
            $product_id = intval($_POST['product_id']);
            $name = sanitize($conn, $_POST['name']);
            $description = sanitize($conn, $_POST['description']);
            $price = sanitize($conn, $_POST['price']);
            $stock_s = sanitize($conn, $_POST['stock_s']);
            $stock_m = sanitize($conn, $_POST['stock_m']);
            $stock_l = sanitize($conn, $_POST['stock_l']);
            
            // Handle file upload
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = 'uploads/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }
            
            if ($image) {
                $stmt = $conn->prepare("UPDATE wproducts SET name = ?, description = ?, price = ?, stock_s = ?, stock_m = ?, stock_l = ?, image = ? WHERE id = ?");
                $stmt->bind_param("ssdiidsi", $name, $description, $price, $stock_s, $stock_m, $stock_l, $image, $product_id);
            } else {
                $stmt = $conn->prepare("UPDATE wproducts SET name = ?, description = ?, price = ?, stock_s = ?, stock_m = ?, stock_l = ? WHERE id = ?");
                $stmt->bind_param("ssdiids", $name, $description, $price, $stock_s, $stock_m, $stock_l, $product_id);
            }
            
            $stmt->execute();
            $stmt->close();
            header('Location: wadmin.php');
            exit;
        }
        
        // Delete WProduct
        if ($action == 'delete_wproduct') {
            $product_id = intval($_POST['product_id']);
            $stmt = $conn->prepare("DELETE FROM wproducts WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $stmt->close();
            header('Location: wadmin.php');
            exit;
        }
    }
}

// Close database connection
$conn->close();
?>
