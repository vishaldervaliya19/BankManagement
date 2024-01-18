<?php session_start();
include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $md5Pass = md5($newpassword);
    $check_pass = "SELECT * FROM users WHERE id= '$id'";
    $run_check_pass = mysqli_query($conn, $check_pass);
    if  (mysqli_num_rows($run_check_pass) > 0) {
        if ($newpassword == $confirmpassword) {
            $update = "UPDATE users set `password` ='$md5Pass' where id = '$id'";
            $run_update = mysqli_query($conn, $update);
            if($run_update) {
                echo "Password Reset Successful"; header("location: settings.php");
            } else { echo "Password Reset Failed"; }
        } else { echo "Password Do Not Match <br>"; } } } ?>