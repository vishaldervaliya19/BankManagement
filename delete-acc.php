<?php session_start(); include "include/dbcon.php";
$id = $_GET['id'];
function logUserActivity($user_id, $action) {
    global $conn;
    $timestamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user_activity (user_id, action, timestamp) VALUES ('$user_id', '$action', '$timestamp')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {   echo "Error: " . $sql . "<br>" . mysqli_error($conn); } }
$useremail = $_SESSION['email'];
$chQuery = "SELECT id FROM users WHERE email = '$useremail'";
$ResultU = mysqli_query($conn, $chQuery);
$rowU = mysqli_fetch_assoc($ResultU);
$user_id = $rowU['id'];
$action = "Disable Account";
logUserActivity($user_id, $action);
$update = "UPDATE  `accounts` set `disable`= '0' where account_number = '$id'";
$updateTransaction = "UPDATE  `transactions` set `disable`= '0' where account_number = '$id'";
if (mysqli_query($conn, $update)) {
    $_SESSION['delMessage'] = 'Account Delete successfully.'; } else {
    $_SESSION['delstatusMessage'] = 'Error Delete data: ' . mysqli_error($conn); }
header("Location: acc.php"); exit(); ?>