<?php
// Include the database connection file
include 'config.php';

// Check if user is logged in

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit; // Ensure script stops after redirection
}

$user_id = $_SESSION['user_id'];

$message = ''; // Initialize message variable

if (isset($_POST['order_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $card_details = isset($_POST['card_details']) ? mysqli_real_escape_string($conn, $_POST['card_details']) : '';

    // Fetch cart items and calculate total
    $cart_total = 0;
    $cart_products = [];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die(mysqli_error($conn));
    if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $cart_total += $total_price;

            // Capture size and quantity for each cart item
            $size = $fetch_cart['size'];
            $quantity = $fetch_cart['quantity'];

            // Build array or string for display, if needed
            $cart_products[] = $fetch_cart['name'] . ' (RM' . $fetch_cart['price'] . ' x ' . $quantity . ')';
        }
    }

    $total_products = implode(", ", $cart_products);

    // Check if the order already exists
    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND total_products = '$total_products' AND total_price = '$cart_total'") or die(mysqli_error($conn));

    if ($cart_total == 0) {
        $message = 'Your cart is empty';
    } else {
        if (mysqli_num_rows($order_query) > 0) {
            $message = 'Order already placed!';
        } else {
            // Insert new order into database with current date/time
            $placed_on = date('Y-m-d H:i:s'); // Current date and time
            $insert_query = "INSERT INTO `orders` (user_id, name, number, email, method, address, card_details, total_products, total_price, size, quantity, placed_on) VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$card_details', '$total_products', '$cart_total', '$size', '$quantity', '$placed_on')";
            mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
            $message = 'Order placed successfully!';
            // Clear cart after placing order
            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die(mysqli_error($conn));
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Sports Wear</title>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Bootstrap Js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Your CSS -->
    <style>
        body {
            background-color: #dedede;
            font-family: Arial, sans-serif;
        }

        .navbar {
            padding: 0px 100px;
        }

        .navbar-nav .nav-link {
            margin-right: 20px;
            font-size: 15px;
            font-family: Copperplate;
            transition: border-bottom 0.9s ease;
        }

        .navbar-nav .nav-link:hover {
            border-bottom: 1px solid;
        }

        .member-button {
            margin-left: 100px;
            color: #FFFFFF;
            background-color: transparent;
            border: none;
        }

        .search-box {
            width: fit-content;
            height: fit-content;
            position: relative;
        }

        .input-search {
            height: 30px;
            width: 30px;
            border: none;
            padding: 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 40px;
            transition: width 0.5s ease-in-out;
            background-color: #e7e7e7;
            color: #000000;
        }

        .input-search::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search {
            width: 40px;
            height: 40px;
            border: none;
            font-size: 20px;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: -5px;
            top: -25px;
            transform: translateY(50%);
            color: #000000;
        }

        .btn-search:focus~.input-search {
            width: 200px;
            border-radius: 10px;
            outline: none;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
        }

        .input-search:focus {
            width: 200px;
            border-radius: 20px;
            border: 10px;
            border-color: #000000;
            background-color: #e7e7e7;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
        }

        .btn-profile {
            border: none;
            font-size: 20px;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: 10px;
            top: 25px;
            transform: translateY(50%);
            color: #000000;
        }

        .display-order {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .display-order p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .display-order .grand-total {
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }

        .checkout {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .checkout h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .checkout .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .checkout .inputBox {
            width: calc(50% - 10px);
            margin-bottom: 20px;
        }

        .checkout .inputBox span {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .checkout .inputBox input,
        .checkout .inputBox select,
        .checkout .inputBox textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 16px;
        }

        .checkout .inputBox input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
        }

        .checkout .inputBox.card-details {
            display: none; /* Initially hide the card details input */
        }

        /* Updated CSS for the TNG image */
.checkout .inputBox.tng-image {
    display: block; /* Show the TNG image by default */
    width: 50%; /* Adjust the width as needed */
    max-width: 400px; /* Set a maximum width to prevent it from becoming too large */
    margin: 0 auto; /* Center the image within its container */
    margin-top: 10px;
}

.checkout .inputBox.tng-image img {
    width: 100%; /* Ensure the image scales to the container */
    height: auto;
    display: block;
    margin: 0 auto; /* Center the image */
}


        .empty {
            text-align: center;
            font-size: 18px;
            color: #999;
        }
    </style>

    <!-- jQuery -->
    <script>
        $(document).ready(function() {
            $('#payment-method').change(function() {
                var selectedMethod = $(this).val();

                // Hide all additional fields by default
                $('.checkout .inputBox.card-details').hide();
                $('.checkout .inputBox.tng-image').hide();

                if (selectedMethod === 'tng') {
                    $('.checkout .inputBox.tng-image').show();
                } else if (selectedMethod === 'credit card') {
                    $('.checkout .inputBox.card-details').show();
                }
            });
        });
    </script>
</head>

<body>
<div class="member-navbar" style="background-color: #000000;">
        <a href="userloginpage.php"> <button type="button" class="member-button">FREE SHIPPING FOR MEMBERS</button></a>
    </div>
  <div class="navigation-wrap bg-light start-header start-style">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a href="index.php">
                        <img src="logo.jpg" alt="Logo" style="width: 200px; height: 120px; margin-left: -150px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                <a class="nav-link" href="MenCatalogue.php" role="button" aria-haspopup="true" aria-expanded="false">MEN</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                <a class="nav-link" href="WomenCatalogue.php" role="button" aria-haspopup="true" aria-expanded="false">WOMEN</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="order.php">Order History</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="user_promotion.php">Promotion</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="feedbackpage.php">Feedback</a>
                            </li>
                            <!-- Profile Icon -->
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="btn-profile" href="profilepage.php">
                                    <i class="fas fa-user"></i>
                                </a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a href="cart.php">
                                    <i class="fas fa-shopping-cart"></i> <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
    <section class="display-order">
        <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
    $grand_total += $total_price;

    // Capture size and quantity for each cart item
    $size = $fetch_cart['size'];
    $quantity = $fetch_cart['quantity'];

    // Build array or string for display, if needed
    $cart_products[] = $fetch_cart['name'] . ' (RM' . $fetch_cart['price'] . ' x ' . $quantity . ')';
}

        } else {
            echo '<p class="empty">Your cart is empty</p>';
        }
            ?>
        <div class="grand-total"> Grand Total: <span>RM<?php echo $grand_total; ?></span> </div>
    </section>

    <section class="checkout">
        <form action="" method="post">
            <h3>Place Your Order</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Your Name:</span>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>
                <div class="inputBox">
                    <span>Your Number:</span>
                    <input type="tel" name="number" required placeholder="Enter your number">
                </div>
                <div class="inputBox">
                    <span>Your Email:</span>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="inputBox">
                    <span>Payment Method:</span>
                    <select name="method" id="payment-method">
                        <option value="tng">TNG</option>
                        <option value="credit card">Credit Card</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <textarea name="address" rows="4" placeholder="Enter your address" required></textarea>
                </div>

                <!-- Additional input for card details -->
                <div class="inputBox card-details">
                    <span>Card Details:</span>
                    <input type="text" name="card_details" placeholder="Card Number/Date/CVV">
                </div>

                <!-- Image for TNG method -->
                <div class="inputBox tng-image">
                    <img src="tng_logo.png" alt="Touch 'n Go" />
                </div>
            </div>
            <input type="submit" value="Order Now" class="btn" name="order_btn">
        </form>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </section>
</body>

</html>