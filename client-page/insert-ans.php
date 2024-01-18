<?php include "include/dbcon.php"; 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questions = $_POST['questions'];
    $answers = $_POST['answers'];
    $id = $_SESSION['id'];
    $hasAnswer = md5($answers);
    $sql = "INSERT INTO account_answers (questions, answers, accid) VALUES ('$questions', '$hasAnswer', '$id')";
                if (mysqli_query($conn, $sql)) {
                    header("location: dashboard.php");
                } else {
                    $errors[] = "Error inserting answer for question ID $questionId: " . mysqli_error($conn);  }
    mysqli_close($conn);} ?>