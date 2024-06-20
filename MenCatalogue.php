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
<body>
    <div class="member-navbar" style="background-color: #000000;">
        <a href="userloginpage.php"> <button type="button" class="member-button">FREE SHIPPING FOR MEMBERS</button></a>
    </div>
    
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <img src="logo.png" alt="" style="width: 200px; height:120px; margin-left:-150px;">	
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MEN</a>
                                    <div class="dropdown-menu" style="margin-left:150px">
                                        <a class="dropdown-item" href="#">Clothing</a>
                                        <a class="dropdown-item" href="#">Shoes</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">WOMEN</a>
                                    <div class="dropdown-menu" style="margin-left:250px">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Agency</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" hrfe="#">Services</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Journal</a>
                                </li>
                                <li class="nav-item pl-4 -md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <div class="search-box">
                                        <button class="btn-search"><i class="fas fa-search"></i></button>
                                        <input type="text" class="input-search" placeholder="Type to Search">
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <div class="profile-box">
                                        <button class="btn-profile"><i class="fas fa-user-circle"></i></button>
                                    </div>
                                </li>
                            </ul>	
                        </div>
                    </nav>		
                </div>
            </div>
        </div>
    </div>
    
    <div class="text">Mens</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="Supernova.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Supernova</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Supernova" data-price="100">$100 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Adizero.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Adizero</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Adizero" data-price="120">$120 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Terrex.avif" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Terrex 5</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Terrex 5" data-price="90">$90 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="England.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">England Jersey</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="England Jersey" data-price="80">$80 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Liverpool.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Liverpool Jersey</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Liverpool Jersey" data-price="85">$85 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Golden.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Golden State Kit</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Golden State Kit" data-price="95">$95 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike1.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Shorts</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Shorts" data-price="60">$60 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike2.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Runner</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Runner" data-price="70">$70 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike3.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Runner Foam</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Runner Foam" data-price="75">$75 - Select Size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike4.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Free Run</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Free Run" data-price="85">$85 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike5.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Alpha Max</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Alpha Max" data-price="95">$95 - Select Size</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Nike6.png" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Nike Merton</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sizeSelectionModal" data-product="Nike Merton" data-price="80">$80 - Select Size</a>
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


                            
