<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flex_sports_wear";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['id'];
    // Check if the product is already in the cart
    $checkCartSql = "SELECT * FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($checkCartSql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity if product already in cart
        $updateSql = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
    } else {
        // Add new item to cart
        $insertSql = "INSERT INTO cart (product_id, quantity) VALUES (?, 1)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
    }

    echo "Success";
}
?>
