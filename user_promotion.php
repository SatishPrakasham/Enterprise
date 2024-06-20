<?php
// user_promotion.php

// Include the database connection file
require_once 'config.php';

// Fetch promotions from the database
$result = $conn->query("SELECT * FROM promotions");

if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions - Flex Sports Wear</title>

    <!-- jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <!-- Bootstrap Js -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Your CSS -->
    <style>
        /* Reuse the same styles from the main page */
        body {
            background-color: #dedede;
        }

        .navbar {
            padding: 0px 100px; /* Adjust the padding */
        }

        .navbar-nav .nav-link {
            font-size: 15px;
            font-family: Copperplate;
            transition: border-bottom 0.9s ease;
        }

        .navbar-nav .nav-link:hover {
            border-bottom: 1px solid;
        }
        
        .member-button {
            margin-left: 700px;
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

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
            margin-bottom: 60px;
            flex-direction: column;
        }

        .box {
            width: 300px;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .box img {
            width: 100%;
            border-radius: 10px;
        }

        .box h3 {
            font-size: 21px;
            font-family: Copperplate;
            margin-bottom: 10px; /* Adjusted */
        }

        .box p {
            font-size: 15px;
        }

        .box .discounted-price {
            color: #e74c3c;
            font-size: 18px;
            font-weight: bold;
        }

        .box .dates {
            font-size: 13px;
            color: #777;
        }

        .box .requirements {
            font-size: 13px;
            color: #555;
        }

        .header-title {
            font-size: 2rem;
            font-family: Copperplate;
            margin-bottom: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="member-navbar" style="background-color: #000000;">
        <button type="button" class="member-button">FREE SHIPPING FOR MEMBERS</button>
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
                                    <a class="nav-link" href="#">Services</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Journal</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <!-- Promotions Link -->
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="user_promotion.php">Promotions</a>
                                </li>
                                <!-- Profile Icon -->
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <button class="btn-profile"><i class="fas fa-user"></i></button>
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

    <!-- Main Content -->
    <div class="container">
        <h1 class="header-title">PROMOTIONS</h1>
<?php if ($result->num_rows > 0):?>
    <?php while ($row = $result->fetch_assoc()):?>
        <div class="box">
            <img alt="Promotion Image" src="<?php echo htmlspecialchars($row['image']);?>">
            <p><?php echo $row['description'];?></p>
            <p class="discounted-price">$<?php echo $row['discounted_price'];?></p>
            <p class="dates">From: <?php echo $row['start_date'];?> To: <?php echo $row['end_date'];?></p>
            <p class="requirements">Requirements: <?php echo $row['requirement'];?></p>
          
        </div>
    <?php endwhile;?>
<?php else:?>
    <p>No promotions available at the moment.</p>
<?php endif;?>
    </div>
</body>
</html>
