<?php
// process.php

// Include the database connection file
require_once 'config.php';

// Function to sanitize input data
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}

// Check if the form is submitted to add, edit, or delete a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['edit_product'])) {
        // Retrieve product ID to edit
        $edit_id = intval($_POST['edit_product']);
        
        // Fetch product details from database
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $edit_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        
        // Close statement
        $stmt->close();
    } elseif (isset($_POST['action'])) {
        if ($_POST['action'] == 'add_product') {
            // Retrieve and sanitize form data
            $name = sanitize($conn, $_POST['name']);
            $description = sanitize($conn, $_POST['description']);
            $price = floatval($_POST['price']); // Convert to float
            $stock_s = intval($_POST['stock_s']); // Convert to integer for size S
            $stock_m = intval($_POST['stock_m']); // Convert to integer for size M
            $stock_l = intval($_POST['stock_l']); // Convert to integer for size L
            $image = ''; // Initialize image variable
            
            // Handle file upload for image
            if (!empty($_FILES["image"]["name"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
                // Create directory if it doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
    
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $target_file;
                } else {
                    echo "Error uploading file.";
                }
            }
    
            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock_s, stock_m, stock_l, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdiiis", $name, $description, $price, $stock_s, $stock_m, $stock_l, $image);
            
            if ($stmt->execute()) {
                $stmt->close();
                // Redirect to avoid form resubmission
                header("Location: admin.php");
                exit;
            } else {
                echo "Error executing SQL statement: " . $stmt->error;
            }
        } elseif ($_POST['action'] == 'update_product') {
            // Retrieve and sanitize form data
            $id = intval($_POST['product_id']);
            $name = sanitize($conn, $_POST['name']);
            $description = sanitize($conn, $_POST['description']);
            $price = floatval($_POST['price']); // Convert to float
            $stock_s = intval($_POST['stock_s']); // Convert to integer for size S
            $stock_m = intval($_POST['stock_m']); // Convert to integer for size M
            $stock_l = intval($_POST['stock_l']); // Convert to integer for size L
            $image = ''; // Initialize image variable
    
            // Check if image is updated
            if (!empty($_FILES['image']['name'])) {
                // Handle file upload for image
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
                // Create directory if it doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
    
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $target_file;
                } else {
                    echo "Error uploading file.";
                }
            } else {
                // Fetch current image path if not updated
                $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $image = $row['image'];
                $stmt->close();
            }
    
            // Update product details in database
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock_s = ?, stock_m = ?, stock_l = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssdiiisi", $name, $description, $price, $stock_s, $stock_m, $stock_l, $image, $id);
            
            if ($stmt->execute()) {
                $stmt->close();
                // Redirect to avoid form resubmission
                header("Location: admin.php");
                exit;
            } else {
                echo "Error executing SQL statement: " . $stmt->error;
            }
        } elseif ($_POST['action'] == 'delete_product') {
            // Retrieve and sanitize product ID
            $id = intval($_POST['product_id']);
    
            // Delete product from database
            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                $stmt->close();
                // Redirect to avoid form resubmission
                header("Location: admin.php");
                exit;
            } else {
                echo "Error executing SQL statement: " . $stmt->error;
            }
        } elseif ($_POST['action'] == 'update_stock') {
            // Retrieve and sanitize form data
            $id = intval($_POST['product_id']);
            $stock_s = intval($_POST['stock_s']);
            $stock_m = intval($_POST['stock_m']);
            $stock_l = intval($_POST['stock_l']);
    
            // Update product stock in database
            $stmt = $conn->prepare("UPDATE products SET stock_s = ?, stock_m = ?, stock_l = ? WHERE id = ?");
            $stmt->bind_param("iiii", $stock_s, $stock_m, $stock_l, $id);
            
            if ($stmt->execute()) {
                $stmt->close();
                // Redirect to avoid form resubmission
                header("Location: admin.php");
                exit;
            } else {
                echo "Error executing SQL statement: " . $stmt->error;
            }
        }
    }
}

// Close database connection
$conn->close();
?>
