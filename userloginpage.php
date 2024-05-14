<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care Treasury</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="#" type="image/x-icon">

    <style>
        body {
            background: url("background.jpg");
            background-size: cover;
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Reset some default styles for form elements */
        input[type="text"],
        input[type="password"],
        button[type="submit"] {
            appearance: none;
            border: none;
            outline: none;
            padding: 10px;
            margin: 0;
        }

        .login-container {
            margin-top: 50;
            margin-right: 800;
            background-color: #f1dec9;
            color: #000;
            border-radius: 5px;
            box-shadow: 0px 0px 20px rgba(128, 128, 128, 0.8);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .login-container.clicked {
            transform: scale(0.78);
        }

        .login-container h1 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            text-align: left;
            font-weight: 800;
            margin-bottom: 5px;
            color: #000;
            /* Label text color */
        }

        .form-group input {
            width: 90%;
            border: 2px solid #ccc;
            border-radius: 2em 1em 4em / 0.5em 3em;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            /* Input background color with transparency */
            color: #000;
            /* Input text color */
            transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            border-color: #007bff;
            /* Highlight border color on focus */
            background-color: rgba(255, 255, 255, 0.2);
            /* Highlight input background color on focus */
        }

        .login-button,
        .register-button {
            background-color: #a4907c;
            color: #fff;
            border: none;
            border-radius: 50px;
            /* Make it a circle */
            padding: 15px 30px;
            /* Increase padding for a larger button */
            cursor: pointer;
            font-size: 18px;
            /* Slightly larger font size */
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .register-button:hover,
        .login-button:hover {
            background-color: #61c6d4;
            transform: scale(1.05);
            /* Scale up on hover for a creative effect */
        }

        @media screen and (max-width: 768px) {
            .login-container {
                max-width: 80%;
            }
        }

        /* Back button styles */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 20px;
            color: #000000;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <a class="back-button" href="index.php">Back</a>
    <form action="userLoginCheck.php" method="POST">
        <div class="login-container">
            <h1 style="font-family: Lucida Handwriting, sans-serif; color: #000000;">Login</h1>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="uname" id="uname" name="uname" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="pass" id="pass" name="pass" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-button"> Login <i class="fa-solid fa-right-to-bracket fa-fade"></i></button>
            <button class="register-button" type="submit" onclick="window.location.href = 'registerUser.php';"> Register <i
                    class="fa-solid fa-address-card fa-fade"></i></button>

            <a href="adminLoginPage.php">Sign in as Admin</a>
        </div>
    </form>
</body>

</html>
