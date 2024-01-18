<style>   .image-container { display: flex; align-items: center; }
        .image-container img { width: 300px; margin-right: 20px; }
        .form-container { display: flex; flex-direction: column; }
        .submit-button { align-self: flex-end;}
    </style>
        <h1>Verify Documents</h1>
        <div class="image-container">
        <?php include "include/dbcon.php";
        if (isset($_POST['accountNumber'])) {
            $accountNumber = $_POST['accountNumber'];
            $sql = "SELECT * FROM accounts WHERE account_number = '$accountNumber' and `disable`='1' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 
                $customerImage = $row['customerImage']; $aadharfile = $row['aadharFile'];
                $panfile = $row['panFile'];$sign = $row['sign'];?>
    <div class="file-item">
        <h4>Customer Image</h4>
        <img src="<?php echo $customerImage; ?>" alt="Customer Image" width="300">
    </div>
    <div class="file-item">
        <h4>Aadhar Card Image</h4>
        <img src="<?php echo $aadharfile; ?>" alt="Aadhar Card" width="300">
    </div>
    <div class="file-item">
        <h4>PAN Card Image</h4>
        <img src="<?php echo $panfile; ?>" alt="PAN Card" width="300">
    </div>
    <div class="file-item">
        <h4>Sign Image</h4>
        <img src="<?php echo $sign; ?>" alt="Signature" width="300">
    </div>
    </div><br>
        <?php } else { echo '<p>No account found with that account number.</p>';}
        } else { echo '<p>No account number provided.</p>';} mysqli_close($conn); ?>
    </div>
