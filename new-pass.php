<link rel="stylesheet" href="forgot.css">
<?php
session_start();
// Include the database connection
$accid = $_SESSION['accid'];
include "include/dbcon.php";
?>
<main>
    <section class="account-section">
        <form action="new-cpass.php" method="post">
                <div>
                    <label>New Password :</label>
                    <input type="text" name="id" value="<?php echo $accid; ?>" hidden>
                    <input type="password" name="newpassword" required><br>
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirmpassword" required>
                </div>
            <input type="submit" value="Submit Answers">
        </form>
    </section>
</main>
