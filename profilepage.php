<?php
session_start();
include "config.php";

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    echo '<script>alert("You need to login first.")</script>';
    echo '<script>location.href="userloginpage.php"</script>';
    exit();
}

$uname = $_SESSION['uname'];

// Fetch user details from the database
$stmt = $conn->prepare("SELECT fullname, uname, user_email, pnumber, address FROM users WHERE uname = ?");
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo '<script>alert("User not found.")</script>';
    echo '<script>location.href="userloginpage.php"</script>';
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
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
                                    <a class="nav-link" href="#">Promotion</a>
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
       
<body>
    <div class="container mt-5">
        <h1 class="text-center">Profile Page</h1>
        <div class="card">
            <div class="card-header">
                <h2><?php echo htmlspecialchars($user['fullname']); ?>'s Profile</h2>
            </div>
            <div class="card-body">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['uname']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['user_email']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['pnumber']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
            </div>
            <div class="card-footer text-center">
                <a href="user_logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>