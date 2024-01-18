<?php include "include/dbcon.php";
session_start();
if (isset($_POST['submit'])) {
    $customerImage_id = $_POST['customerImage_id'];
    $aadharFile_id = $_POST['aadharFile_id'];
    $panFile_id = $_POST['panFile_id'];
    $targetDir = "uploads/";
    if (!empty($_FILES['customerImage']['name'])) {
        $customerImage = $_FILES['customerImage']['name'];
        $customerImage_targetPath = $targetDir . $customerImage;
        if (move_uploaded_file($_FILES['customerImage']['tmp_name'], $customerImage_targetPath)) {
            $upProfile = "UPDATE accounts SET customerImage = '$customerImage_targetPath' WHERE id = $customerImage_id";
            mysqli_query($conn, $upProfile);} }
    if (!empty($_FILES['aadharFile']['name'])) {
        $aadharFile = $_FILES['aadharFile']['name'];
        $aadharFile_targetPath = $targetDir . $aadharFile;
        if (move_uploaded_file($_FILES['aadharFile']['tmp_name'], $aadharFile_targetPath)) {
            $upAadhar = "UPDATE accounts SET aadharfile = '$aadharFile_targetPath' WHERE id = $aadharFile_id";
            mysqli_query($conn, $upAadhar); } }
    if (!empty($_FILES['panFile']['name'])) {
        $panFile = $_FILES['panFile']['name'];
        $panFile_targetPath = $targetDir . $panFile;
        if (move_uploaded_file($_FILES['panFile']['tmp_name'], $panFile_targetPath)) {
            $upPan = "UPDATE accounts SET panfile = '$panFile_targetPath' WHERE id = $panFile_id";
            mysqli_query($conn, $upPan); } } $_SESSION['statusMessage'] = 'Document Updated successfully.';
 header("Location: acc.php"); }  exit(); ?>
