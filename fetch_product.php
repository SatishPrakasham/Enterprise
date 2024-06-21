<?php
// Example: fetch_product.php
$productId = $_GET['id']; // Assuming GET method is used to pass product ID
// Database query to fetch product details based on $productId
// Replace with your actual database connection and query logic
$productDetails = array(
    'image' => 'path/to/product/image.jpg',
    'name' => 'Product Name',
    'description' => 'Product Description',
    'price' => 99.99 // Example price
);
echo json_encode($productDetails);
?>
