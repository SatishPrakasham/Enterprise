<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Catalogue - Flex Sports Wear</title>
   
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
        }
        
        .navbar {
            padding: 0px 100px; /* Adjust the padding */
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

        * {
            box-sizing: border-box;
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
            transition: width 0.5s ease-in-out; /* Added transition */
            background-color: #E7E7E7;
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
            top: -25px; /* Adjusted top position for responsiveness */
            transform: translateY(50%); /* Center vertically */
            color: #000000;
        }

        .btn-search:focus ~ .input-search {
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
            background-color: #E7E7E7;
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
            right: 10px; /* Adjusted position */
            top: 25px; /* Adjusted top position for responsiveness */
            transform: translateY(50%); /* Center vertically */
            color: #000000;
        }
        
        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
            margin-bottom: 20px; /* Added margin bottom for spacing */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
        }

        /* Styles for the text */
        .text {
            margin-top: 50px; /* Spacing from the navbar */
            text-transform: uppercase;
            font-family: verdana;
            font-size: 6em; /* Adjust font size for responsiveness */
            font-weight: 700;
            color: #f5f5f5;
            text-shadow: 1px 1px 1px #919191,
                        1px 2px 1px #919191,
                        1px 3px 1px #919191,
                        1px 4px 1px #919191,
                        1px 5px 1px #919191,
                        1px 6px 1px #919191,
                        1px 7px 1px #919191,
                        1px 8px 1px #919191,
                        1px 9px 1px #919191,
                        1px 10px 1px #919191,
                        1px 18px 6px rgba(16,16,16,0.4),
                        1px 22px 10px rgba(16,16,16,0.2),
                        1px 25px 35px rgba(16,16,16,0.2),
                        1px 30px 60px rgba(16,16,16,0.4);
            text-align: center;
        }

        /* Floating Cart Button */
        .floating-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .cart-item {
            margin-bottom: 10px;
        }
        
        .cart-total {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>

</head>
<body>

    <!-- Navigation bar -->
    <div class="member-navbar" style="background-color: #000000;">
        <a href="userloginpage.php"> <button type="button" class="member-button">FREE SHIPPING FOR MEMBERS</button></a>
    </div>
    
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a href="index.php">
                            <img src="logo.jpg" alt="Logo" style="width: 200px; height:120px; margin-left:-150px;">
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
                                    <a class="nav-link" href="">Order History</a>
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
                                <!-- Search Box -->
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <div class="search-box">
                                        <button class="btn-search"><i class="fas fa-search"></i></button>
                                        <input type="text" class="input-search" placeholder="Search">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>      
                </div>
            </div>
        </div>
    </div>

    <!-- Product Display Section -->
    <div class="text">Mens</div>

    <div class="container mt-5">
        <div class="row">
            <?php
            // Database connection
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database_name = "flex_db"; // Replace with your actual database name

            // Create connection
            $conn = new mysqli($hostname, $username, $password, $database_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch products from database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            // Display products
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?php echo $row['image']; ?>" alt="Product Image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <p class="card-text">Price: RM <?php echo number_format($row['price'], 2); ?></p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product-id="<?php echo $row['id']; ?>">Select Size</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No products available.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Size Selection Modal -->
    <div class="modal fade" id="sizeSelectionModal" tabindex="-1" role="dialog" aria-labelledby="sizeSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sizeSelectionModalLabel">Select Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Product details will be dynamically populated here -->
                    <div id="product-details">
                        <img src="" alt="Product Image" id="product-image" style="max-width: 100%; height: auto;">
                        <h5 id="product-name"></h5>
                        <p id="product-description"></p>
                        <p id="product-price"></p>
                    </div>
                    
                    <!-- Form for selecting size -->
                    <form id="sizeSelectionForm">
                        <div class="form-group">
                            <label for="selectedSize">Size:</label>
                            <select class="form-control" id="selectedSize" required>
                                <option value="">Select Size</option>
                                <option value="S">Small/UK6</option>
                                <option value="M">Medium/UK7</option>
                                <option value="L">Large/UK8</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- Floating Cart Button -->
<div class="floating-cart">
    <button class="btn btn-primary" id="cart-button">
        <i class="fas fa-shopping-cart"></i> Cart
        <span id="cart-count" class="badge badge-light">0</span>
    </button>
</div>

<!-- Cart Popup Modal -->
<div class="modal fade" id="cartPopupModal" tabindex="-1" role="dialog" aria-labelledby="cartPopupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartPopupModalLabel">Shopping Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cart-items-popup">
                    <!-- Cart items will be displayed here -->
                </div>
                <div id="cart-total-popup" class="cart-total">
                    Total: RM <span id="cart-total-amount-popup">0.00</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
                <button type="button" class="btn btn-primary" id="checkout-button">Checkout</button>
            </div>
        </div>
    </div>
</div>

<!-- Your Scripts -->
<script>
    $(document).ready(function() {
        // Cart management
        var cartItems = [];

        function addToCart(product, price, size) {
            var item = {
                product: product,
                price: price,
                size: size
            };
            cartItems.push(item);
            updateCartCount();
        }

        function updateCartCount() {
            var count = cartItems.length;
            $('#cart-count').text(count);
        }

        // Floating cart button behavior
        $('#cart-button').click(function() {
            updateCartPopup();
            $('#cartPopupModal').modal('show');
        });

        // Update cart popup content
        function updateCartPopup() {
            var cartItemsHtml = '';
            var totalAmount = 0;
            cartItems.forEach(function(item, index) {
                cartItemsHtml += '<div class="cart-item-popup">' +
                                    '<p>' + item.product + ' - Size: ' + item.size + ' - RM ' + item.price.toFixed(2) + '</p>' +
                                '</div>';
                totalAmount += item.price;
            });
            $('#cart-items-popup').html(cartItemsHtml);
            $('#cart-total-amount-popup').text(totalAmount.toFixed(2));
        }

        // Checkout button behavior
        $('#checkout-button').click(function() {
            // Proceed to checkout (save cart items to database)
            saveCartItems();
            // Close the cart popup modal
            $('#cartPopupModal').modal('hide');
            // Optionally, redirect to checkout page or display confirmation message
        });

        // Function to save cart items to database
        function saveCartItems() {
            // Simulated user_id and product_id
            var user_id = 1; // Replace with actual user ID (if available)
            var product_id = 0; // Replace with actual product ID (if available)

            // Loop through cartItems and save each item to database
            cartItems.forEach(function(item) {
                var price = item.price;
                var quantity = 1; // For simplicity, assuming quantity is 1 per item

                // AJAX call to save cart item to database
                $.ajax({
                    method: 'POST',
                    url: 'save_cart_item.php', // PHP script to save cart item to database
                    data: {
                        user_id: user_id,
                        product_id: product_id,
                        price: price,
                        quantity: quantity,
                        size: item.size
                    },
                    success: function(response) {
                        console.log('Cart item saved:', response);
                        // Handle success (e.g., display success message)
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving cart item:', error);
                        // Handle error (e.g., display error message)
                    }
                });
            });

            // Clear cart items after saving
            cartItems = [];
            updateCartCount();
            updateCartPopup(); // Update cart popup to reflect cleared items
        }
    });
</script>

</body>
</html>
