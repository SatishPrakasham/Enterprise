<?php
// wadmin.php

// Include the database connection file
require_once 'config.php';

// Function to sanitize input data
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}

// Check if the form is submitted to add, edit, or delete a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['edit_product'])) {
        // Fetch product details for editing
        $product_id = intval($_POST['edit_product']);
        $stmt = $conn->prepare("SELECT * FROM wproducts WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
    }
}

// Fetch WProducts to display
$result = $conn->query("SELECT * FROM wproducts");

// HTML and Bootstrap for the admin page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - WProduct</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
      <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wadmin.php">WProduct</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_accounts.php"> User Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_sales_report.php">Admin Sales Analytics Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="check_user_order.php"> User Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotion_update.php">Promotion Update Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedbackview.php">Feedback</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Add New Women Product</h2>
        <form action="wprocess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_wproduct">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="productPrice" name="price" required>
            </div>
            <div class="mb-3">
                <label for="stockS" class="form-label">Stock Size S</label>
                <input type="number" class="form-control" id="stockS" name="stock_s" required>
            </div>
            <div class="mb-3">
                <label for="stockM" class="form-label">Stock Size M</label>
                <input type="number" class="form-control" id="stockM" name="stock_m" required>
            </div>
            <div class="mb-3">
                <label for="stockL" class="form-label">Stock Size L</label>
                <input type="number" class="form-control" id="stockL" name="stock_l" required>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add WProduct</button>
        </form>

        <?php if (isset($product)) { ?>
            <h2>Edit WProduct</h2>
            <form action="wprocess.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update_wproduct">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <div class="mb-3">
                    <label for="editProductName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="editProductName" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editProductDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="editProductDescription" name="description" required><?php echo $product['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="editProductPrice" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="editProductPrice" name="price" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editStockS" class="form-label">Stock Size S</label>
                    <input type="number" class="form-control" id="editStockS" name="stock_s" value="<?php echo $product['stock_s']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editStockM" class="form-label">Stock Size M</label>
                    <input type="number" class="form-control" id="editStockM" name="stock_m" value="<?php echo $product['stock_m']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editStockL" class="form-label">Stock Size L</label>
                    <input type="number" class="form-control" id="editStockL" name="stock_l" value="<?php echo $product['stock_l']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editProductImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="editProductImage" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update WProduct</button>
            </form>
        <?php } ?>

        <h2 class="mt-5">Existing WProducts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock S</th>
                    <th>Stock M</th>
                    <th>Stock L</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['stock_s']; ?></td>
                        <td><?php echo $row['stock_m']; ?></td>
                        <td><?php echo $row['stock_l']; ?></td>
                        <td><img src="<?php echo $row['image']; ?>" width="100"></td>
                        <td>
                            <!-- Edit Product Form -->
                            <form action="wadmin.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="edit_product" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                            </form>
                            <!-- Delete Product Form -->
                            <form action="wprocess.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="action" value="delete_wproduct">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function logout() {
            // Implement logout functionality
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
