<?php
session_start();
include "include/dbcon.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    $md5Pass = md5($newpassword);

    $check_pass = "SELECT * FROM accounts WHERE account_number= '$id'";
    $run_check_pass = mysqli_query($conn, $check_pass);

    if  (mysqli_num_rows($run_check_pass) > 0) {
        if ($newpassword == $confirmpassword) {
            $update = "UPDATE accounts set cpassword ='$md5Pass' where account_number = '$id'";
            $run_update = mysqli_query($conn, $update);
            
            if($run_update) {
                echo "Password Reset Successful";
                echo "<a href='index.php'>Back To Login</a>";
                // header("location: index.php");
            } else {
                echo "Password Reset Failed";
            }
        } else {
            echo "Password Do Not Match <br>";
            echo "<a href='index.php'>Back To Login</a>";
        }
    }
}

?>