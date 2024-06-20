<?php 
session_start(); 
include "db_flex.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['fullname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pnumber']) && isset($_POST['pass']) && isset($_POST['cpass'])  && isset($_POST['address'])) {
        
        $fullname = $_POST['fullname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $address = $_POST['address'];
        


            $Select = "SELECT email FROM userdetails WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO userdetails(fullname, uname, email, pnumber, pass, cpass, address) values(?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $row = $stmt->num_rows;

            if ($row == 0) {
                if($pass == $cpass){

                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssisss",$fullname, $uname, $email, $pnumber, $pass, $cpass, $address);
                if ($stmt->execute()) {
                    echo '<script>alert("New record inserted sucessfully.")</script>';
                    echo '<script>location.href="userloginpage.php"</script>';
                }
                else {
                    echo $stmt->error;
                }
            }else{
                echo '<script>alert("Passwords are not same. Try Again.")</script>';
                echo '<script>location.href="RegisterUser.php"</script>';
            }
        }
            else {
                echo '<script>alert("Email Already Taken. Try a new one.")</script>';
                echo '<script>location.href="RegisterUser.php"</script>';
            }
            $stmt->close();
            $conn->close();
        
    }
    else {
        echo '<script>alert("All Fields are required.")</script>';
        echo '<script>location.href="registerUser.php"</script>';
    }
}
else {
    echo "Submit button is not set";
}

