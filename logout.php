<?php session_start();
   include "include/dbcon.php";
   function logUserActivity($user_id, $action) {
      global $conn;
      $timestamp = date('Y-m-d H:i:s');
      $sql = "INSERT INTO user_activity (user_id, action, timestamp) VALUES ('$user_id', '$action', '$timestamp')";
      $result = mysqli_query($conn, $sql);
      if (!$result) { echo "Error: " . $sql . "<br>" . mysqli_error($conn); } }
  $useremail = $_SESSION['email'];
  $chQuery = "SELECT id FROM users WHERE email = '$useremail'";
  $ResultU = mysqli_query($conn, $chQuery);
  $rowU = mysqli_fetch_assoc($ResultU);
  $user_id = $rowU['id'];
  $action = "Logout Employee";
  logUserActivity($user_id, $action);
   if(session_destroy()) {
      header("Location: index.php"); }?>