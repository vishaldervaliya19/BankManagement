<?php session_start();
include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role"]; $permission = $_POST["permission"];
    function logUserActivity($user_id, $action) {
        global $conn; $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO user_activity (user_id, action, timestamp) VALUES ('$user_id', '$action', '$timestamp')";
        $result = mysqli_query($conn, $sql);
        if (!$result) { echo "Error: " . $sql . "<br>" . mysqli_error($conn);} }
    $useremail = $_SESSION['email'];
    $chQuery = "SELECT id FROM users WHERE email = '$useremail'";
    $ResultU = mysqli_query($conn, $chQuery);
    $rowU = mysqli_fetch_assoc($ResultU);
    $user_id = $rowU['id'];
    $action = "Role Permission Registration";
    logUserActivity($user_id, $action);
    $insert_role = "INSERT INTO pmmss (`role_id`, `permission`, `add`, `edit`, `delete`, `view`)
     VALUES ('$role','$permission','0','0','0','0')";
    if (mysqli_query($conn, $insert_role)) {
        $_SESSION['statusMessage'] = 'Role Inserted Successfully.';
    } else { $_SESSION['statusMessage'] = 'Error Inserting Role: ' . mysqli_error($conn);}
    header("Location: role.php"); exit(); }
mysqli_close($conn); ?>
