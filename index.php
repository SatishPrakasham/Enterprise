<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Sports Wear</title>
   
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <!-- Bootstrap Js -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    
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
            margin-right:20px;
            font-size: 15px;
            font-family: Copperplate;
            transition: border-bottom 0.9s ease;
        }

        .navbar-nav .nav-link:hover {
            border-bottom: 1px solid;
        }
            
        .member-button {
            margin-left:100px;
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
        
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        .gallery {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .img-box {
            width: 200px;
            height: 500px;
            margin: 10px;
            border-radius: 50px;
            background: url(Adidas.png);
            background-size: cover;
            background-position: center;
            position: relative;
            transition: width 0.5s;
            display: flex;
            flex-direction: column;
            padding: 30px;   
        }
        
        .img-box h3 {
            margin-top: 5px; /* Adjust vertical placement */
            margin-bottom: auto; /* Adjust vertical placement */
            margin-left: auto; /* Adjust horizontal placement */
            margin-right: auto; /* Adjust horizontal placement */
            font-size: 21px;
            font-family: Copperplate;
        }   
            
        .img-box:nth-child(2) {
            background: url(Nike.png);
            background-size: cover;
            background-position: center;
        }
        
        .img-box:nth-child(3) {
            background: url(UA.png);
            background-size: cover;
            background-position: center;
        }
        
        .img-box:nth-child(4) {
            background: url(flex.jpg);
            background-size: cover;
            background-position: center;
        }
        
        .img-box:hover {
            width: 650px;
            cursor: pointer;
        }
      
        .container .box {
            width: 800px;
            height: 500px; 
            padding: 1rem;
            color: #000000;
            border: 1px solid rgba(255, 255, 255, 0.222);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 0.7rem;
            transition: all ease 0.3s;
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .container .box .title {
            font-size: 2rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            margin-bottom: 1rem;
        }

        .container .box .content {
            width: 100%;
        }

        .container .box .content .image-container {
            position: relative;
            width: 100%;
            height: 50%; /* Adjust height to fill the container */
        }

        .container .box .content .image-container .overlay-text {
            position: absolute;
            top: 10px; /* Adjust the vertical position */
            left: 75%;
            transform: translateX(-50%);
            font-size: 18px;
            font-weight: bold;
            color: #000000;
            z-index: 1; /* Ensure the text appears above the button */
        }

        .container .box .content img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            box-shadow: 7px 7px 7px #000000;
        }

        .container .box .content .image-container button {
            position: absolute;
            bottom: 10px;
            left: 75%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
        }

        .container .box .content .image-container button:hover {
            background-color: #0056b3;
        }

        .container .box:hover {
            box-shadow: 7px 7px 14px #323232, -7px -7px 14px #535353;
            border: 1px solid rgba(255, 255, 255, 0.454);
        }
        
.check-it-out {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #007BFF;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    position: relative; /* Or 'absolute' */
    top: 120px;          /* Adjust this value to move the button vertically */
    left: 80px;         /* Adjust this value to move the button horizontally */
}

.check-it-out:hover {
    background-color: #0056b3;
}


.check-it-out:hover {
    background-color: #0056b3;
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
    
    <div class="container">
        <div class="gallery">
            <div class="img-box"><h3>Adidas</h3></div>
            <div class="img-box"><h3>Nike</h3></div>
            <div class="img-box"><h3>Under Armour</h3></div>
            <div class="img-box"><h3>Flex Sportswear</h3></div>
        </div>
    </div>
    
    <marquee behavior="scroll" direction="right" scrollamount="15" style="font-size: 50px; font-family: Copperplate; margin-bottom: 60px;">SHOP NOW</marquee>

    <div class="container">
        <div class="box">
            <span class="title">Shoes</span>
            <div class="content">
                <div class="image-container">
                    <img src="Supernova.avif" alt="Product Image" class="product-image">
                    <span class="overlay-text">Experience unmatched comfort and style with our latest shoe design, crafted with innovative technology for superior performance and sleek aesthetics.</span>
                    <a class="check-it-out" href="Mencatalogue.php">Check it out</a>   
                </div>
            </div>
        </div>
    </div>
  
    <div class="container">
        <div class="box">
            <span class="title">Apparel</span>
            <div class="content">
                <div class="image-container">
                    <img src="Jersey.avif" alt="Product Image" class="product-image">
                    <span class="overlay-text">Experience peak performance and comfort with our cutting-edge sportswear designed for athletes who demand the best.</span>
                    <a class="check-it-out" href="Mencatalogue.php">Check it out</a>   
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="box">
            <span class="title"> Women</span>
            <div class="content">
                <div class="image-container">
                    <img src="Womenbottom3.jpg" alt="Product Image" class="product-image">
                    <span class="overlay-text">Elevate your performance and style with our versatile and durable athletic pants, crafted for optimal comfort and mobility during every workout.</span>
                    <a class="check-it-out"href="Womencatalogue.php">Check it out</a>   
                </div>
            </div>
        </div>
    </div>
    <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scan code</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
    
</body>
</html>