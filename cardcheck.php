<?php
session_start();
include 'db_flex.php';

$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM userdetails where id='$id'") or die(mysqli_error());
$row = mysqli_fetch_array($query);

// Retrieve form data from $_POST
$cardname = $_POST['cardname'];
$cardnum = $_POST['cardnum'];
$cardexp = $_POST['cardexp'];
$cardcvv = $_POST['cardcvv'];

// Insert card details once
$cardInsertQuery = "INSERT INTO carddetails (id, cardname, cardnum, cardexp, cardcvv) 
                    VALUES ('$id', '$cardname', '$cardnum', '$cardexp', '$cardcvv')";
mysqli_query($conn, $cardInsertQuery) or die(mysqli_error($conn));

// Close the database connection
mysqli_close($conn);

// You can return a response if needed
echo '<script>alert("Order Successful")</script>';
echo "<script>location.href='addtocart.php'</script>";
exit();
?>
