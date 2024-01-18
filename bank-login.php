<?php session_start();
include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mdpassword = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND `password` = '$mdpassword' and `disable`='1'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) == 1) { $_SESSION["email"] = $email;
        header("Location: home.php"); exit(); } else {
        $_SESSION['bankmsg'] = 'Invalid Email or Password. Please try again: ' . mysqli_error($conn);
        header("Location: index.php"); } } mysqli_close($conn);
?>
