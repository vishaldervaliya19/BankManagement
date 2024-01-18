<?php session_start();
include "include/dbcon.php";
$firstname = $_POST['firstname']; $middlename = $_POST['middlename']; 
$lastname = $_POST['lastname'];
$email = $_POST['email']; $address = $_POST['address']; 
$contact = $_POST['contact']; 
$accno = $_POST['account_number'];
$aadharno = $_POST['aadharno']; 
$panno = $_POST['panno'];
$openingBalance = $_POST['openingBalance'];
$password = $_POST['cpassword'];
$profileUploadDir = 'profile_pics/'; $profileFileName = $_FILES['profile']['name'];
$profileFilePath = $profileUploadDir . $profileFileName;
move_uploaded_file($_FILES['profile']['tmp_name'], $profileFilePath);
$panUploadDir = 'pan_cards/'; $panFileName = $_FILES['pancard']['name'];
$panFilePath = $panUploadDir . $panFileName;
move_uploaded_file($_FILES['pancard']['tmp_name'], $panFilePath);
$aadharUploadDir = 'aadhar_cards/'; $aadharFileName = $_FILES['aadhar']['name'];
$aadharFilePath = $aadharUploadDir . $aadharFileName;
move_uploaded_file($_FILES['aadhar']['tmp_name'], $aadharFilePath);
$signUploadDir = 'sign/'; $signFileName = $_FILES['sign']['name']; $signFilePath = $signUploadDir . $signFileName;
move_uploaded_file($_FILES['sign']['tmp_name'], $signFilePath);
function logUserActivity($user_id, $action) {
    global $conn;
    $timestamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user_activity (`user_id`, `action`, `timestamp`) VALUES ('$user_id', '$action', '$timestamp')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {echo "Error: " . $sql . "<br>" . mysqli_error($conn);} }
$useremail = $_SESSION['email'];
$chQuery = "SELECT id FROM users WHERE email = '$useremail'";
$ResultU = mysqli_query($conn, $chQuery);
$rowU = mysqli_fetch_assoc($ResultU);
$user_id = $rowU['id'];
$action = "Account Registration";
logUserActivity($user_id, $action);
$checkQuery = "SELECT * FROM accounts WHERE aadharno = '$aadharno'";
$checkResult = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    echo "Record with the same Aadhar number already exists.";
    echo "<br><a href='add-acc.php'>Back</a>";} else {
$timestamp = date('Y-m-d H:i:s');
$md5Pass = md5($password);
$insertQuery = "INSERT INTO accounts (`account_number`, `firstName`, `middleName`, `lastName`, `address`, `contact`, `email`, `balance`, `panCardNo`, `aadharno`, `sign`, `aadharFile`, `panFile`, `customerImage`, `cpassword`, `accountOpenDate`, `disable`) 
VALUES ('$accno','$firstname', '$middlename', '$lastname', '$address', '$contact', '$email','$openingBalance', '$panno','$aadharno', '$signFilePath','$aadharFilePath', '$panFilePath', '$profileFilePath','$md5Pass', '$timestamp','1')";
$insertTran = "INSERT into transactions (`account_number`, `transaction_date`, `description`, `transaction_type`, `amount`, `total_amount`, `disable`)
VAlUE ('$accno', '$timestamp', 'Opening Balance', 'OB', '$openingBalance','$openingBalance', '1')";
mysqli_query($conn,$insertTran);
if (mysqli_query($conn, $insertQuery)) {
    $_SESSION['statusMessage'] = 'Account Inserted successfully.' . " . $accno ."; } else {
    $_SESSION['statusMessage'] = 'Error inserting data: ' . mysqli_error($conn); }
header("Location: add-acc.php"); }?>