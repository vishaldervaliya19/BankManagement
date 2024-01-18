<?php  session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit(); } include "include/dbcon.php"; include "function.php";?>
<!DOCTYPE html>
<html>
<head>
  <?php $id = $_SESSION['email'];
  $query = "SELECT * FROM users s
  join roles r on s.role_id = r.id";
  $result = mysqli_query($conn, $query);
  $userData = mysqli_fetch_assoc($result);
  $rolename = $userData['role_name']; ?>
  <title><?php echo $rolename; ?></title>
  <link rel="icon" href="bank.png" type="image/x-icon">
<link rel="shortcut icon" href="bank.png" type="image/x-icon">
  <link rel="stylesheet" href="include/style.css">
</head>

  





  