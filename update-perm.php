<?php session_start();
include "include/dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role"]; $permission = $_POST["permission"];
    $add = isset($_POST["add"]) ? 1 : 0; $edit = isset($_POST["edit"]) ? 1 : 0;
    $delete = isset($_POST["delete"]) ? 1 : 0; $view = isset($_POST["view"]) ? 1 : 0;
$update_sql = "UPDATE pmmss SET `add`='$add', `edit`='$edit', `delete`='$delete', `view`='$view' WHERE `role_id`='$role' AND `permission`='$permission'";    
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['statusMessage'] = 'Permission Updated successfully.';
    } else { $_SESSION['statusMessage'] = 'Error inserting data: ' . mysqli_error($conn);}
    header("Location: permission.php"); exit(); }
mysqli_close($conn); ?>
