<?php $id = $_SESSION['id'];
$sql = "SELECT `id`, `account_number`, `firstName`, `middleName`, `lastName`, `address`, `contact`, `email`, `balance`, `panCardNo`, `aadharno`, `sign`, `aadharFile`, `panFile`, `customerImage`, `cpassword`, `accountOpenDate` FROM accounts where account_number=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$fname = $data['firstName'];
$mname = $data['middleName'];
$lname = $data['lastName'];
$accno = $data['account_number'];
$balance = $data['balance']; ?>