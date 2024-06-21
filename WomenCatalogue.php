<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Sports Wear</title>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Bootstrap Js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
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
    </style>

</head>
<div class="member-navbar" style="background-color: #000000;">
        <a href="userloginpage.php"> <button type="button" class="member-button">FREE SHIPPING FOR MEMBERS</button></a>
    </div>
    
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a href="index.php">
                           <img src="logo.jpg" alt="Logo" style="width: 200px; height:120px; margin-left:-150px;">	</a>
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
                                        <input type="text" class="input-search" placeholder=" Type to Search..." style="font-size:15px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="text">Womens</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe1.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Adizero</h5>
                        <p class="card-text">Engineered for speed and comfort, these running shoes feature lightweight mesh uppers for breathability and responsive cushioning that propels you forward with every stride.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Adizero" data-price="100">RM100 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe2.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Adizero 2.0</h5>
                        <p class="card-text">Versatile and supportive, these cross-trainers provide stability during lateral movements and agility drills, with durable outsoles that offer excellent grip on multiple surfaces.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Adizero 2.0" data-price="120">RM120 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe3.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Duramo Pro</h5>
                        <p class="card-text">Designed for rugged terrain, these trail shoes boast aggressive traction patterns and protective overlays, ensuring stability and protection against rocks and roots while maintaining flexibility.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Duramo Pro" data-price="90">RM90 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Womentop1.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Sport Tee</h5>
                        <p class="card-text">Keep cool and dry during intense workouts with this compression shirt, featuring sweat-wicking fabric that regulates temperature and enhances muscle support for peak performance.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Sport Tee" data-price="80">RM80 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womentop2.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Sport Tee 2.0</h5>
                        <p class="card-text">Stay comfortable in the heat with this lightweight tank top, designed with mesh panels for ventilation and a relaxed fit that allows unrestricted movement during workouts or runs.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Sport Tee 2.0" data-price="85">RM85 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womentop3.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Dri Fit Kit</h5>
                        <p class="card-text">Ideal for cooler weather, this long-sleeve tee offers moisture management technology to keep you dry, along with flatlock seams to reduce chafing and a reflective logo for visibility in low-light conditions.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Dri Fit Kit" data-price="95">RM95 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenbottom1.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Shorts</h5>
                        <p class="card-text">Dominate your workouts in these lightweight shorts, featuring quick-drying fabric and an elastic waistband for a secure fit, designed to keep you comfortable and focused.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Shorts" data-price="60">RM60 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenbottom2.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Runner</h5>
                        <p class="card-text">Run in comfort with these running shorts, equipped with built-in briefs for support and moisture-wicking technology to keep you dry, featuring reflective details for visibility in low light.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Runner" data-price="70">RM70 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenbottom3.jpg" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Runner Shorts</h5>
                        <p class="card-text">Enhance muscle support and recovery with these compression shorts, designed to reduce muscle fatigue and soreness during intense workouts, featuring a snug fit and stretchy fabric.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Runner Shorts" data-price="75">RM75 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe4.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Run Shorts</h5>
                        <p class="card-text">Run safely at night in these road running shoes, featuring reflective details for visibility, along with a breathable mesh upper and responsive midsole that deliver comfort and energy return.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Run Shorts" data-price="85">RM85 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe5.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Alpha</h5>
                        <p class="card-text">Run safely at night in these road running shoes, featuring reflective details for visibility, along with a breathable mesh upper and responsive midsole that deliver comfort and energy return.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Alpha " data-price="95">RM95 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Womenshoe6.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Fly</h5>
                        <p class="card-text">Step into all-day comfort with these cushioned walking shoes, designed with a plush midsole and a supportive heel counter, ideal for leisurely walks or extended periods on your feet.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Fly" data-price="80">RM80 - Select Size</a>
                    </div>
                </div>
            </div>
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
                    <h5 id="product-name"></h5>
                    <p id="product-price"></p>
                    <form id="size-form">
                        <div class="form-group">
                            <label for="size">Select Size:</label>
                            <select class="form-control" id="size" required>
                                <option value="">Select Size</option>
                                <option value="S">Small</option>
                                <option value="M">Medium</option>
                                <option value="L">Large</option>
                                <option value="XL">Extra Large</option>
                            </select>
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

    <!-- Your Scripts -->
    <script>
        $(document).ready(function() {
            // Modal related scripts
            $('#sizeSelectionModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var product = button.data('product'); // Extract info from data-* attributes
                var price = button.data('price');

                var modal = $(this);
                modal.find('.modal-title').text('Select Size for ' + product);
                modal.find('#product-name').text(product);
                modal.find('#product-price').text('$' + price);
            });

            // Add to Cart form submission
            $('#size-form').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting

                var product = $('#product-name').text();
                var price = parseFloat($('#product-price').text().replace('$', ''));
                var size = $('#size').val();

                if (size) {
                    addToCart(product, price, size);
                    $('#sizeSelectionModal').modal('hide'); // Hide the modal
                    $('#size').val(''); // Reset size selection
                } else {
                    alert('Please select a size.');
                }
            });

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
                // Display cart contents in alert (for demonstration)
                var cartContent = "Cart Items:\n";
                cartItems.forEach(function(item) {
                    cartContent += item.product + " - Size: " + item.size + " - $" + item.price + "\n";
                });
                alert(cartContent);
            });
        });
    </script>

</body>
</html>