<?php

session_start();
include 'config.php';


if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $row = mysqli_fetch_assoc($select_users);

      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_id'] = $row['id'];
      header('location: index.php');
   } else {
      $message[] = 'Incorrect email or password!';
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap">
   <link rel="shortcut icon" href="#" type="image/x-icon">
   <style>
     /* General styling */
body {
   font-family: 'Lato', sans-serif;
   margin: 0;
   padding: 0;
   display: flex;
   justify-content: center;
   align-items: center;
   min-height: 100vh;
   background: url("images/background.jpg") no-repeat center center fixed;
   background-size: cover;
   color: #fff;
   text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
}

.wrapper {
   text-align: center;
   background-color: rgba(0, 0, 0, 0.5);
   padding: 40px;
   border-radius: 10px;
   box-shadow: 0px 0px 20px rgba(128, 128, 128, 0.8);
   max-width: 500px;
   width: 100%;
   margin: 20px;
}

.header {
   position: relative;
}

.header h1 {
   font-size: 48px;
   margin-bottom: 20px;
   color: #f1dec9;
   text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
}

.admin-login {
   position: absolute;
   top: 20px;
   right: 20px;
}

.admin-button {
   background-color: #a4907c;
   color: #fff;
   border: none;
   border-radius: 50px;
   padding: 10px 20px;
   cursor: pointer;
   font-size: 14px;
   text-decoration: none;
   transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
}

.admin-button:hover {
   background-color: #61c6d4;
}

.login-container {
   background-color: rgba(241, 222, 201, 0.9);
   color: #000;
   border-radius: 5px;
   padding: 20px;
   text-align: center;
}

.form-group {
   margin-bottom: 20px;
   text-align: left;
}

.form-group label {
   display: block;
   font-weight: 800;
   margin-bottom: 5px;
   color: #000;
}

.input-wrapper {
   display: inline-block;
   width: 100%;
   max-width: 350px;
}

.input-wrapper input, 
.input-wrapper select {
   width: 100%;
   padding: 10px;
   border: 2px solid #ccc;
   border-radius: 5px;
   background-color: rgba(255, 255, 255, 0.1);
   color: #000;
   font-size: 16px;
   transition: border-color 0.3s ease-in-out;
}

.input-wrapper input:focus,
.input-wrapper select:focus {
   outline: none;
   border-color: #61c6d4;
}

.login-button {
   background-color: #a4907c;
   color: #fff;
   border: none;
   border-radius: 50px;
   padding: 15px 30px;
   cursor: pointer;
   font-size: 18px;
   transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
   width: 100%;
   max-width: 350px;
}

.login-button:hover {
   background-color: #61c6d4;
}

.message {
   background-color: #f44336;
   color: white;
   text-align: center;
   padding: 10px;
   margin-bottom: 15px;
   border-radius: 5px;
   display: <?php echo isset($message) && count($message) > 0 ? 'block' : 'none'; ?>;
}

.message i {
   cursor: pointer;
   float: right;
   margin-top: -6px;
   margin-right: -6px;
   font-size: 18px;
}

@media screen and (max-width: 768px) {
   .wrapper {
      max-width: 80%;
   }
   .input-wrapper,
   .login-button {
      max-width: 100%;
   }
}
   </style>
</head>
<body>
   <div class="wrapper">
      <div class="header">
         <h1>Flex Sport Wear</h1>
         
      </div>
       <div class="admin-login">
            <a href="admin_login.php" class="admin-button">Admin Login</a>
         </div>
      <div class="login-container">
         <?php
         if(isset($message)){
            foreach($message as $msg){
               echo '
               <div class="message">
                  <span>'.$msg.'</span>
                  <i class="fas fa-times" onclick="this.parentElement.style.display=\'none\'"></i>
               </div>
               ';
            }
         }
         ?>
         <form action="" method="post">
            <h3>Login Now</h3>
            <div class="form-group">
               <label for="email">Email</label>
               <div class="input-wrapper">
                  <input type="email" id="email" name="email" placeholder="Enter your email" required class="input">
               </div>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <div class="input-wrapper">
                  <input type="password" id="password" name="password" placeholder="Enter your password" required class="input">
               </div>
            </div>
            <input type="submit" name="submit" value="Login Now" class="login-button">
            <p>Don't have an account? <a href="RegisterUser.php">Register Now</a></p>
         </form>
      </div>
   </div>
</body>
</html>
