<?php 
session_start(); 
include "db_flex.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['pass']);

	if (empty($uname)) {
		
		echo '<script>alert("Username is required")</script>';
		echo "<script>location.href='userloginpage.php'</script>";
	    exit();

	}else if(empty($pass)){
        echo '<script>alert("Password is required")</script>';
		echo "<script>location.href='userloginpage.php'</script>";
	    exit();
	}
	else{

		$sql = "SELECT * FROM userdetails WHERE uname='$uname' AND pass='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['uname'] === $uname && $row['pass'] === $pass) {
            	$_SESSION['uname'] = $row['uname'];
            	$_SESSION['id'] = $row['id'];
            	
            	echo '<script>alert("Login Success")</script>';
		        echo "<script>location.href='addtocart.php'</script>";
		        exit();
            }else{
				echo '<script>alert("Incorrect Username or Password")</script>';
				echo "<script>location.href='userloginpage.php'</script>";
		        exit();
			}
		}else{
			echo '<script>alert("Incorrect Username or Password")</script>';
			echo "<script>location.href='userloginpage.php'</script>";
	        exit();
		}
	}
}else{
	echo '<script>alert("Unidentified Error. Please Check Details Again.")</script>';
	echo "<script>location.href='userloginpage.php'</script>";
	exit();
} 

