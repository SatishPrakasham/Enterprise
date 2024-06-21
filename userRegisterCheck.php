<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Get POST data and validate
    $fullname = validate($_POST['fullname']);
    $uname = validate($_POST['uname']);
    $user_email = validate($_POST['user_email']);
    $pnumber = validate($_POST['pnumber']);
    $pass = validate($_POST['pass']);
    $cpass = validate($_POST['cpass']);
    $address = validate($_POST['address']);

    // Check for empty fields
    if (empty($fullname) || empty($uname) || empty($user_email) || empty($pnumber) || empty($pass) || empty($cpass) || empty($address)) {
        echo '<script>alert("All fields are required.");</script>';
        echo '<script>location.href="registerUser.php"</script>';
        exit();
    }

    // Check if passwords match
    if ($pass !== $cpass) {
        echo '<script>alert("Passwords do not match. Please try again.");</script>';
        echo '<script>location.href="registerUser.php"</script>';
        exit();
    }

    // Hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email already exists
    $Select = "SELECT user_email FROM users WHERE user_email = ? LIMIT 1";
    $stmt = $conn->prepare($Select);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $stmt->bind_result($resultEmail);
    $stmt->store_result();
    $stmt->fetch();
    $row = $stmt->num_rows;

    if ($row === 0) {
        $stmt->close();

        // Insert new user
        $Insert = "INSERT INTO users (fullname, uname, user_email, pnumber, pass, address) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($Insert);
        $stmt->bind_param("ssssss", $fullname, $uname, $user_email, $pnumber, $hashed_pass, $address);
        if ($stmt->execute()) {
            echo '<script>alert("Registration successful. Please log in.");</script>';
            echo '<script>location.href="userloginpage.php"</script>';
        } else {
            echo '<script>alert("Error: Could not execute the query.");</script>';
            echo '<script>location.href="registerUser.php"</script>';
        }
    } else {
        echo '<script>alert("Email already taken. Try a different one.");</script>';
        echo '<script>location.href="registerUser.php"</script>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo '<script>alert("Invalid request method.");</script>';
    echo '<script>location.href="registerUser.php"</script>';
}
?>
