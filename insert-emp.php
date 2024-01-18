<?php session_start();
include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['firstname']; $mname = $_POST['middlename'];
    $lname = $_POST['lastname'];  $email = $_POST['email'];
    $contact = $_POST['contact'];   $address = $_POST['address'];
    $password = $_POST['password']; $id = $_POST['role_id'];
    $profileUploadDir = 'profile_pics/';
    $profileFileName = $_FILES['profile']['name'];
    $profileFilePath = $profileUploadDir . $profileFileName;
    move_uploaded_file($_FILES['profile']['tmp_name'], $profileFilePath);
    function logUserActivity($user_id, $action) {
        global $conn;
        $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO user_activity (user_id, action, timestamp) VALUES ('$user_id', '$action', '$timestamp')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn); } }
    $useremail = $_SESSION['email'];
    $chQuery = "SELECT id FROM users WHERE email = '$useremail'";
    $ResultU = mysqli_query($conn, $chQuery);
    $rowU = mysqli_fetch_assoc($ResultU);
    $user_id = $rowU['id'];
    $action = "Employee Registration";
    logUserActivity($user_id, $action);
            $hashed_password = md5($password);
    $insert_user = "INSERT INTO users (`firstname`, `middlename`, `lastname`, `email`, `profile`, `contact`, `address`,`password`, `role_id`, `disable`)  VALUES ('$fname', '$mname', '$lname', '$email', '$profileFilePath','$contact', '$address','$hashed_password', '$id', '1')";
   if (mysqli_query($conn, $insert_user)) {
        $_SESSION['statusMessage'] = 'User Inserted Successfully.';
    } else { $_SESSION['statusMessage'] = 'Error Inserting User: ' . mysqli_error($conn); }
    header("Location: add-emp.php");
    exit(); } mysqli_close($conn); ?>
