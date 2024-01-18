<?php  session_start();
   include "include/dbcon.php";
   function logUserActivity($user_id, $action) {
      global $conn;
      $timestamp = date('Y-m-d H:i:s');
      $sql = "INSERT INTO customer_activity (customer_id, action, timestamp) VALUES ('$user_id', '$action', '$timestamp')";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn); } }
  $useraccount_number = $_SESSION['id'];
  $chQuery = "SELECT id FROM accounts WHERE account_number = '$useraccount_number'";
  $ResultU = mysqli_query($conn, $chQuery);
  $rowU = mysqli_fetch_assoc($ResultU);
  $user_id = $rowU['id'];
  $action = "Customer Logout";
  logUserActivity($user_id, $action);
   if(session_destroy()) {
      header("Location: ../index.php"); } ?>