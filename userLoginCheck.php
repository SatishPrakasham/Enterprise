<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    // Check for empty inputs
    if (empty($uname) || empty($pass)) {
        echo '<script>alert("Username and Password are required.");</script>';
        echo "<script>location.href='userloginpage.php'</script>";
        exit();
    }

    // Prepare SQL query using prepared statements
    $stmt = $conn->prepare("SELECT id, uname, pass FROM users WHERE uname = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($pass, $row['pass'])) {
            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['uname'] = $row['uname'];
            echo '<script>alert("Login Successful.");</script>';
            echo "<script>location.href='index.php'</script>";
            exit();
        } else {
            echo '<script>alert("Incorrect Username or Password.");</script>';
            echo "<script>location.href='userloginpage.php'</script>";
            exit();
        }
    } else {
        echo '<script>alert("Incorrect Username or Password.");</script>';
        echo "<script>location.href='userloginpage.php'</script>";
        exit();
    }
    $stmt->close();
} else {
    echo '<script>alert("Invalid Request.");</script>';
    echo "<script>location.href='userloginpage.php'</script>";
    exit();
}
$conn->close();
?>
