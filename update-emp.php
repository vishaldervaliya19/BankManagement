<?php session_start();
include "include/dbcon.php";
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"]; $mname = $_POST['mname'];
    $lname = $_POST['lname'];  $roleid = $_POST['role_id'];
    $email = $_POST['email'];  $address = $_POST['address'];
    $contact = $_POST['contact'];
    $update_sql = "UPDATE `users` SET `firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `role_id`='$roleid',`email`='$email', `address`='$address',`contact`='$contact' WHERE id = '$id' and `disable` = '1' ";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['statusMessage'] = 'Employee Updated successfully.';
    } else {
        $_SESSION['statusMessage'] = 'Error inserting data: ' . mysqli_error($conn);}
    header("Location: emp.php");
    exit(); }
mysqli_close($conn); ?>
