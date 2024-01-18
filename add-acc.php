<?php include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php"; 
$sql="SELECT max(account_number) from accounts";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$id=$row[0]+1;?>
<main>
    <section>
<?php if (accountAdd($userId, 'accounts', '1')) { ?>
    <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); ?>
    <h2>Account Management</h2>
        <p>Manage customer accounts and perform account-related actions.</p>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
<form action="insert-acc.php" method="POST" enctype="multipart/form-data" class="account-form">
        <h3>Open New Account</h3>
        <div class="row">
        <input type="number" name="account_number" value="<?php echo $id; ?>" required hidden>
        <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required>
            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" required>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required>
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            <label for="customer-name">Address:</label>
            <textarea name="address" cols="50" rows="2" Required></textarea>
            <label for="customer-name">Contact No.:</label>
            <input type="tel" name="contact" title="Error Message" pattern="[1-9]{1}[0-9]{9}"  maxlength="10"> 
            <label for="customer-name">Aadhar No.:</label>
            <input type="tel" id="customer-name" name="aadharno" maxlength="12" required>
            <label for="aadhar">Upload Aadhar Card:</label>
            <input type="file" name="aadhar" id="aadhar">
            <label for="customer-name">PAN No.:</label>
            <input type="text" id="customer-name" name="panno" required>
            <label for="aadhar">Upload Pan Card:</label>
            <input type="file" name="pancard" id="aadhar">
            <label for="profile">Upload Profile Picture:</label>
            <input type="file" name="profile" id="profile">
            <label for="sign">Upload Signature:</label>
            <input type="file" name="sign" id="sign">
            <label for="email">Password :</label>
            <input type="" name="cpassword" required>
            <label for="balance">Balance:</label>
            <input type="number" step="0.01" min="0" id="balance" name="openingBalance" required>
</div>
        <button type='submit' name='submit'>Submit</button>  
<?php } else {  echo "You don't have permission for Account Management.";} ?>
</section>
</main>
<?php include "footer.php";?>