<?php  include "header.php"; ?>
<body style="background-color: azure;"> 
<?php include "menu.php"; ?>
<main>
<section>
<?php include "include/dbcon.php";
if (accountView($userId, 'accounts', '1')) { ?>
<?php $id = $_GET['id']; $sql = "SELECT * FROM accounts WHERE id = $id";
$result = $conn->query($sql);?>
        <?php if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); ?>
<div class="container">
<button><a href="acc.php" style="color: black; text-decoration: none;">Back To Home</a></button>
        <h1>Account Information</h1>
        <div class="account-details">
        <p><b>Customer Name :</b> <?php echo $row['firstName'] ."&nbsp;". $row['middleName'] ."&nbsp;" . $row['lastName']; ?></p>
        <p><b>Contact :</b> <?php echo $row['contact']; ?></p>
        <p><b>Account Number :</b> <?php echo $row['account_number']; ?></p>
        <p><b>Balance :</b> <?php echo $row['balance']; ?></p>
        <p><b>Account Open Date :</b> <?php echo $row['accountOpenDate']; ?></p>
        <p><b>Aadhar :</b> <?php echo $row['aadharno']; ?> </p> 
        <p><b>AadharCard Image:</b><img src="<?php echo $row['aadharFile']; ?>" alt="" width=70></p> 
        <p><b>PanCard Image:</b><img src="<?php echo $row['panFile']; ?>" alt="" width=70></p> 
        <p><b>Customer Image:</b><img src="<?php echo $row['customerImage']; ?>" alt="" width=70></p> 
        </div>
    </div>
    <?php } else { echo '<p>No account information available.</p>'; }?>
<?php  } else { echo "You don't have permission for Account Management."; } ?> 
</section>
</main>
<?php mysqli_close($conn); include "footer.php"; ?>

