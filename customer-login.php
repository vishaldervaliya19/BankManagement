<?php session_start(); include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST["account_number"];
    $pin = $_POST["pin"];  $md5Pin = md5($pin);
    $query = "SELECT * FROM accounts WHERE account_number = '$accountNumber' AND cpassword = '$md5Pin'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) == 1) { $_SESSION['id'] = $accountNumber; header("Location: client-page\dashboard.php");
    exit(); } else { $_SESSION['statusMessage'] = 'Invalid Account Number or Password. Please try again: ' . mysqli_error($conn);
    header("Location: index.php");}} mysqli_close($conn); ?>
