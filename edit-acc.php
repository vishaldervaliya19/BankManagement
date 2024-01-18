<?php  include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php";?>
<main>
<?php if (accountEdit($userId, 'accounts', '1')) {?>
    <section>
    <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); ?>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
    <button><a href="acc.php" style="color: black; text-decoration: none;">Back To Home</a></button>
        <?php    if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            include "include/dbcon.php";
            $sql = "SELECT * FROM accounts WHERE account_number = $user_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name = $row['firstName'];
                $mname = $row['middleName'];
                $lname = $row['lastName'];
                $address = $row['address'];
                $email = $row['email'];
                $profileImage = $row['aadharFile']; ?>
                <form action='update-acc.php' method='post' enctype='multipart/form-data' class="account-form">
                <h3>Edit Account</h3>
                <div class="row">
                <input type='hidden' name='id' value='<?php echo $user_id; ?>'>
                <label for='name'>FirstName:</label>
                <input type='text' name='fname' value='<?php echo $name; ?> '>
                <label for='name'>MiddleName:</label>
                <input type='text' name='mname' value='<?php echo $mname; ?> '>
                <label for='name'>LastName:</label>
                <input type='text' name='lname' value='<?php echo $lname; ?> '>
                <label for='address'>Address:</label>
                <textarea name='address' id='address'><?php echo $address ?></textarea>
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email' value='<?php echo $email ?>'> </div>
                <button type='submit' name='submit'>Update</button>
                </form>
                <?php   } else { echo "<h1>Edit User Account</h1>";
                echo "<p>No user found with ID: $user_id</p>"; } mysqli_close($conn);
        } else { echo "<h1>Edit User Account</h1>"; echo "<p>No user ID provided.</p>"; } ?>
    </section>
<?php } else { echo "You don't have permission to view the dashboard."; } ?>
</main>
    <?php include "footer.php"; ?>