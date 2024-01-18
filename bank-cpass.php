<?php  include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php"; ?>
<main>
    <section>
        <?php  if (isset($_GET['id'])) {
            $user_id = $_GET['id'];  ?>
                <form action='reset-bank-c.php' method='post' class="account-form">
                <h3>Edit Account</h3>
                <div class="row">
                <input type='hidden' name='id' value='<?php echo $user_id; ?>'>
                <label for='name'>New Password :</label>
                <input type="password" name="newpassword">
                <label for='name'>Confirm Password :</label>
                <input type="password" name="confirmpassword" >
            </div>
                <button type='submit' name='submit'>Reset Password</button>
                </form>
                <?php } ?>
    </section>
</main>
    <?php include "footer.php"; ?>