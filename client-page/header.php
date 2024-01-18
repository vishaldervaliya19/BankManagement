<?php  session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../index.php"); exit(); }
include "include/dbcon.php";
include "function.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  $id = $_SESSION['id'];
  $query = "SELECT * FROM accounts where account_number='$id'";
  $result = mysqli_query($conn, $query);
  $userData = mysqli_fetch_assoc($result);
  $rolename = $userData['firstName']; ?>
  <title><?php echo $rolename; ?></title>
  <link rel="icon" href="./bank.png" type="image/x-icon">
<link rel="shortcut icon" href="./bank.png" type="image/x-icon">
<link rel="stylesheet" href="include/style.css">
</head>
<body>
<h2 class="heading">Welcome, <font color="gold"><?php echo $fname; ?></font>! To our BB bank Service</h2>
<hr>
    <header>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="transhistory.php">Transactions</a></li>
                <li><a href="authentication.php">Two Step Verification</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <hr>
    </header>
    