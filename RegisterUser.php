<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap">
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

        .register-container {
            background-color: #f1dec9;
            color: #000;
            border-radius: 5px;
            box-shadow: 0px 0px 20px rgba(128, 128, 128, 0.8);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
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
        }

        .form-group input {
            width: 90%;
            border: 2px solid #ccc;
            border-radius: 2em 1em 4em / 0.5em 3em;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #000;
        }

        .register-button {
            background-color: #a4907c;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .register-button:hover {
            background-color: #61c6d4;
            transform: scale(1.05);
        }

        @media screen and (max-width: 768px) {
            .register-container {
                max-width: 80%;
            }
        }
    </style>
</head>

<body>
    <form action="userRegisterCheck.php" method="POST">
        <div class="register-container">
            <h1 style="font-family: Lucida Handwriting, sans-serif; color: #000000;">Register</h1>
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="uname" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="email" id="user_email" name="user_email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="pnumber">Phone Number:</label>
                <input type="text" id="pnumber" name="pnumber" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="cpass">Confirm Password:</label>
                <input type="password" id="cpass" name="cpass" placeholder="Confirm your password" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <button type="submit" class="register-button" name="submit">Register <i class="fa-solid fa-address-card fa-fade"></i></button>
            <a href="userloginpage.php">Already have an account? Log in here</a>
        </div>
    </form>
</body>

</html>
