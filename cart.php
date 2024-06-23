<?php

include 'config.php';

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
   exit; // Always exit after a redirect
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $product_quantity = $_POST['product_quantity'];
   $product_size = $_POST['product_size'];

   mysqli_query($conn, "UPDATE `cart` SET quantity = '$product_quantity', size = '$product_size' WHERE id = '$cart_id'") or die('query failed');
   header('location:cart.php');
   exit;
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
   exit;
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
   exit;
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
        
        .shopping-cart {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        
        .box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        
        .box img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        
        .box .details {
            flex: 1;
        }
        
        .box .name {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .box .price {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .box .quantity-select {
            display: flex;
            align-items: center;
        }
        
        .box .quantity-select label {
            margin-right: 10px;
        }
        
        .box .quantity-select input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }
        
        .box .size-select {
            margin-top: 10px;
        }
        
        .box .size-select label {
            margin-right: 10px;
        }
        
        .box .size-select select {
            padding: 5px;
            width: 70px;
        }
        
        .box .sub-total {
            font-size: 16px;
            margin-top: 10px;
            font-weight: bold;
        }
        
        .cart-total {
            margin-top: 20px;
            text-align: right;
        }
        
        .cart-total p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .flex {
            display: flex;
            justify-content: space-between;
        }
        
        .option-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        
        .btn.disabled {
            pointer-events: none;
            background-color: #ccc;
        }
        
        .delete-btn {
            color: red;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
        }
        
        .delete-btn:hover {
            text-decoration: underline;
        }
        
        .title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
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
        
        .empty {
            text-align: center;
            font-size: 18px;
            color: #999;
            margin-top: 30px;
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

    <section class="shopping-cart">

        <h1 class="title">Cart</h1>

        <div class="box-container">
            <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
            ?>
            <div class="box">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times delete-btn" onclick="return confirm('Delete this from cart?');"></a>
                 <img src="<?php echo $fetch_cart['image']; ?>" alt="Product Image" class="card-img-top">
                <div class="details">
                    <div class="name"><?php echo $fetch_cart['name']; ?></div>
                    <div class="price">RM<?php echo $fetch_cart['price']; ?></div>
                    <!-- Form to update quantity and size -->
                    <form action="cart.php" method="post">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                        <!-- Quantity selector -->
                        <div class="quantity-select">
                            <label for="product_quantity">Quantity:</label>
                            <input type="number" name="product_quantity" value="<?php echo $fetch_cart['quantity']; ?>" min="1" max="10"> <!-- Adjust max quantity as needed -->
                        </div>
                        <!-- Size selector -->
                        <div class="size-select">
                            <label for="product_size">Size:</label>
                            <select name="product_size">
                                <option value="S" <?php if($fetch_cart['size'] == 'S') echo 'selected'; ?>>S</option>
                                <option value="M" <?php if($fetch_cart['size'] == 'M') echo 'selected'; ?>>M</option>
                                <option value="L" <?php if($fetch_cart['size'] == 'L') echo 'selected'; ?>>L</option>
                            </select>
                        </div>
                        <input type="submit" name="update_cart" value="Update" class="btn btn-primary">
                    </form>
                    <!-- Subtotal -->
                    <div class="sub-total">Subtotal: <span>RM<?php echo $fetch_cart['price'] * $fetch_cart['quantity']; ?></span></div>
                </div>
            </div>
            <?php
                $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                }
            }else{
                echo '<p class="empty">Your cart is empty</p>';
            }
            ?>
        </div>

        <div class="cart-total">
            <p>Grand Total: <span>RM<?php echo $grand_total; ?></span></p>
            <div class="flex">
                <a href="MenCatalogue.php" class="option-btn">Continue Shopping</a>
                <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
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
