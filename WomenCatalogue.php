<?php
include 'config.php';

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit; // Always exit after a redirect
}

$message = []; // Initialize the message array

if (isset($_POST['add_to_cart'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_size = $_POST['product_size']; 

   // Check if the product already exists in the cart for the user
   $check_cart_query = "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'";
   $check_cart_result = mysqli_query($conn, $check_cart_query);
   
   if (mysqli_num_rows($check_cart_result) > 0) {
      $message[] = 'Already added to cart!';
   } else {
      // Insert the product into the cart
      $insert_cart_query = "INSERT INTO `cart` (user_id, name, price, quantity, image, size) 
                           VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_size')";
      
      if (mysqli_query($conn, $insert_cart_query)) {
         $message[] = 'Product added to cart!';
      } else {
         $message[] = 'Failed to add product to cart: ' . mysqli_error($conn);
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
      }

      .navbar {
         padding: 0px 100px;
         /* Adjust the padding */
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
         transition: width 0.5s ease-in-out;
         /* Added transition */
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
         top: -25px;
         /* Adjusted top position for responsiveness */
         transform: translateY(50%);
         /* Center vertically */
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
         right: 10px;
         /* Adjusted position */
         top: 25px;
         /* Adjusted top position for responsiveness */
         transform: translateY(50%);
         /* Center vertically */
         color: #000000;
      }

      .card {
         border-radius: 15px;
         overflow: hidden;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         transition: transform 0.2s ease-in-out;
         margin-bottom: 20px;
         /* Added margin bottom for spacing */
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
         margin-top: 50px;
         /* Spacing from the navbar */
         text-transform: uppercase;
         font-family: verdana;
         font-size: 6em;
         /* Adjust font size for responsiveness */
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
            1px 18px 6px rgba(16, 16, 16, 0.4),
            1px 22px 10px rgba(16, 16, 16, 0.2),
            1px 25px 35px rgba(16, 16, 16, 0.2),
            1px 30px 60px rgba(16, 16, 16, 0.4);
         text-align: center;
      }
      .site-footer
{
  background-color:#26272b;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    margin-top: 60px;
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
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

   <section class="products">

      <div class="text">Womens</div>

          <div class="container mt-5">
<div class="row">
         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `wproducts`") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
         ?>
              <div class="col-md-4">
    <div class="card">
        <img src="<?php echo $fetch_products['image']; ?>" alt="Product Image" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $fetch_products['name']; ?></h5>
            <p class="card-text"><?php echo $fetch_products['description']; ?></p>
            <p class="card-text">Price: RM <?php echo number_format($fetch_products['price'], 2); ?></p>
            <form action="" method="post">
    <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
    
    <!-- Select size -->
    <label for="size">Select Size:</label>
    <select name="product_size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
    </select>
    
    <!-- Select quantity -->
    <label for="quantity">Quantity:</label>
    <input type="number" name="product_quantity" value="1" min="1" max="10"> <!-- Adjust max quantity as needed -->
    
    <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-primary">
</form>
        </div>
    </div>
</div>


         <?php
            }
         } else {
            echo '<p class="empty">No products added yet!</p>';
         }
         ?>
      </div>
          </div>
     
      
   </section>
   <!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <li><a href="MenCatalogue.php">Men Catalogue</a></li>
                    <li><a href="WomenCatalogue.php">Women Catalogue</a></li>
                    <li><a href="order.php">Order History</a></li>
                    <li><a href="user_promotion">Promotion</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="feedbackpage.php">Feedback</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="profilepage.php">Profile</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <h6>About Us</h6>
                <p class="text-justify">Flex Sport Wear is dedicated to providing high-quality sportswear for men and women. Explore our catalog and enjoy exclusive promotions.</p>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved by 
                    <a href="#">Flex Sport Wear</a>.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>  
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>

</html>
