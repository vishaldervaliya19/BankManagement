<?php
session_start();
// Establish a database connection
include "include/dbcon.php";

// Validate customer login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $questions = $_POST["questions"];
    $accid = $_POST["accid"];
    $answers = $_POST["answers"];

    $mdans = md5($answers);
    $query = "SELECT * FROM `account_answers` WHERE `accid`= '$accid' and `answers` = '$mdans'";
    //$result = $conn->query($query);
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) == 1) {
        // Customer is authenticated
        // Redirect to customer home page or perform other actions
      $_SESSION["accid"] = $accid;
        header("Location: new-pass.php");
       // exit();
    } else {
      echo "Incorrect Password. Please try again.";
      echo "<button><a href='index.php'>Back To</a></button>";
    }
}

$conn->close();
?>
