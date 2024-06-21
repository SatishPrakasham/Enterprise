<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Promotions</title>
   
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
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: auto;
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
                        <a href="index.php">
                            <img src="logo.jpg" alt="Logo" style="width: 200px; height:120px; margin-left:-150px;">	
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="MenCatalogue.php" role="button" aria-haspopup="true" aria-expanded="false">MEN</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" href="WomenCatalogue.php" role="button" aria-haspopup="true" aria-expanded="false">WOMEN</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="">Order History</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
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

    <!-- Promotion Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                  <div class="text">Promotions</div>
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

                // Query to fetch promotions from database
                $sql = "SELECT * FROM promotions";
                $result = $conn->query($sql);

                // Display promotions
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card mb-3'>";
                        if (!empty($row['image'])) {
                            echo "<img src='" . $row['image'] . "' class='card-img-top' alt='Promotion Image'>";
                        }
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row['description'] . "</h5>";
                        echo "<p class='card-text'>Discounted Price: $" . $row['discounted_price'] . "</p>";
                        echo "<p class='card-text'>Start Date: " . $row['start_date'] . "</p>";
                        echo "<p class='card-text'>End Date: " . $row['end_date'] . "</p>";
                        echo "<p class='card-text'>Requirement: " . $row['requirement'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No promotions available.</p>";
                }

                // Close connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
