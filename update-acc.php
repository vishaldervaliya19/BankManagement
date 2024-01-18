<?php session_start();
if (isset($_POST['submit'])) {
    $user_id = $_POST['id']; $fname = $_POST['fname'];
    $mname =$_POST['mname'];  $lname = $_POST['lname'];  
    $address = $_POST['address']; $email = $_POST['email'];
    include "include/dbcon.php";
    $updateUserSQL = "UPDATE accounts SET `firstName`='$fname',`middleName`='$mname',`lastName`='$lname',`address`='$address',`contact`='$contact',`email`='$email',`cpassword`='$password' WHERE id = $user_id";
    if (mysqli_query($conn, $updateUserSQL)) {
        $_SESSION['statusMessage'] = 'Account Updated successfully.'; } else {
        $_SESSION['statusMessage'] = 'Error updating data: ' . mysqli_error($conn); }
    header("Location: acc.php");}   mysqli_close($conn); ?>
