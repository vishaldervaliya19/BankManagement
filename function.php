<?php  include "include/dbcon.php";
function empview($userId, $permission, $view) {
    global $conn;
    $query = "SELECT p.permission,p.view
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.view='$view'"; 
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
            $user = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE email = '$user'";
        $result = mysqli_query($conn, $query);
            $userData = mysqli_fetch_assoc($result);
            $userId = $userData['id'];

function empAdd($userId, $permission, $view) {
    global $conn;
    $query = "SELECT p.permission,p.add
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.add='$view'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email']; 
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
function empEdit($userId, $permission, $view) {
    global $conn;
    $query = "SELECT p.permission,p.edit
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.edit='$view'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
function empDelete($userId, $permission, $view) {
    global $conn;
    $query = "SELECT p.permission,p.delete
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.delete='$view'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
        function accountView($userId, $permission, $view) {
    global $conn;
    $query = "SELECT p.permission,p.view
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.view='$view'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
function accountAdd($userId, $permission, $add) {
    global $conn;
    $query = "SELECT p.permission,p.add
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.add='$add'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
function accountEdit($userId, $permission, $add) {
    global $conn;
    $query = "SELECT p.permission,p.edit
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.edit='$add'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id']; 
function accountDelete($userId, $permission, $add) {
    global $conn;
    $query = "SELECT p.permission,p.delete
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.delete='$add'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];
function transaction($userId, $permission, $add) {
    global $conn;
    $query = "SELECT p.permission,p.view
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.view='$add'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id']; 

function transactionAdd($userId, $permission, $add) {
    global $conn;
    $query = "SELECT p.permission,p.add
              FROM users u
              JOIN pmmss p ON u.role_id = p.role_id
              WHERE u.id = $userId AND p.permission = '$permission' and p.add='$add'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0; }
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id'];?>