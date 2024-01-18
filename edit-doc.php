<?php  include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php"; ?>
<main>
<?php $user_id = $_GET['id'];
$sql = "SELECT customerImage, aadharfile, panfile,sign FROM accounts WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customerImage = $row['customerImage'];
$aadharfile = $row['aadharfile'];
$panfile = $row['panfile'];
$sign = $row['sign']; ?>
    <section>
    <button><a href="acc.php" style="color: black; text-decoration: none;">Back To Home</a></button>
    <form action="update-doc.php" method="post" enctype="multipart/form-data">
<div class="file-container">
    <div class="file-item">
        <h4>Customer Image</h4>
        <img src="<?php echo $customerImage; ?>" alt="Customer Image" ><br>
        <input type="file" name="customerImage">
        <input type="hidden" name="customerImage_id" value="<?php echo $user_id; ?>">
    </div>
    <div class="file-item">
        <h4>Aadhar Card Image</h4>
        <img src="<?php echo $aadharfile; ?>" alt="Aadhar Card" ><br>
        <input type="file" name="aadharFile">
        <input type="hidden" name="aadharFile_id" value="<?php echo $user_id; ?>">
    </div>
    <div class="file-item">
        <h4>PAN Card Image</h4>
        <img src="<?php echo $panfile; ?>" alt="PAN Card" ><br>
        <input type="file" name="panFile">
        <input type="hidden" name="panFile_id" value="<?php echo $user_id; ?>">
    </div>
    <div class="file-item">
        <h4>Sign Image</h4>
        <img src="<?php echo $sign; ?>" alt="Signature" ><br>
        <input type="file" name="sign">
        <input type="hidden" name="sign_id" value="<?php echo $user_id; ?>">
    </div>
    </div><br>
        <input type="submit" name="submit" value="Update Doc">
    </form>
    </section>
</main>