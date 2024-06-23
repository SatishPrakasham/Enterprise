<?php
include 'config.php';

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
   exit; // Always exit after header redirection
}

if(isset($_POST['update_order'])){
   if(isset($_POST['update_payment'])) {
       $order_update_id = $_POST['order_id'];
       $update_payment = $_POST['update_payment'];
       mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
       $message[] = 'Payment status has been updated!';
   } else {
       $message[] = 'Please select a payment status to update.';
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:check_user_order.php');
   exit; // Always exit after header redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check User Orders</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
    <style>
        /* Custom CSS for box styling */
        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .box p {
            margin: 10px 0;
            font-size: 16px;
        }

        .box span {
            font-weight: bold;
            color: #007bff;
        }

        .option-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .option-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            color: #dc3545;
            text-decoration: none;
            margin-left: 10px;
        }

        .delete-btn:hover {
            text-decoration: underline;
        }

        .empty {
            text-align: center;
            font-size: 18px;
            color: #999;
            margin-top: 30px;
        }
    </style>
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
    <section class="orders">
        <div class="container mt-5">
            <h1 class="title">Placed Orders</h1>

            <div class="box-container">
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                if(mysqli_num_rows($select_orders) > 0){
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                ?>
                <div class="box">
                    <p> User ID: <span><?php echo $fetch_orders['user_id']; ?></span> </p>
                    <p> Name: <span><?php echo $fetch_orders['name']; ?></span> </p>
                    <p> Number: <span><?php echo $fetch_orders['number']; ?></span> </p>
                    <p> Email: <span><?php echo $fetch_orders['email']; ?></span> </p>
                    <p> Total Products: <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                    <p> Total Price: <span>RM<?php echo $fetch_orders['total_price']; ?></span> </p>
                    <p> Payment Method: <span><?php echo $fetch_orders['method']; ?></span> </p>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                        <select name="update_payment">
                            <option value="<?php echo $fetch_orders['payment_status']; ?>" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                        <input type="submit" value="Update" name="update_order" class="option-btn">
                        <a href="check_user_order.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-btn">Delete</a>
                    </form>
                </div>
                <?php
                    }
                }else{
                    echo '<p class="empty">No orders placed yet!</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Optional: JavaScript for logout function -->
    <script>
        function logout() {
            // Implement logout functionality
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>
