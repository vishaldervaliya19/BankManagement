x<?php include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php";
 function role($userId, $rolename){
    global $conn;
    $query = "SELECT r.role_name
              FROM users u
              JOIN roles r ON r.id = u.role_id
              WHERE u.id = $userId and role_name='Manager'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;}
$user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$user'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$userId = $userData['id']; ?>
<main>
    <section>
    <?php if (role($userId, 'Manager')) {?>
    <h2>Account Management</h2>
        <p>Manage customer accounts and perform account-related actions.</p>
        <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); ?>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
    <form action="insert-role.php" method="POST" class="account-form">
            <label for="rolename">Role Name:</label>
            <select name="role" id="">
            <?php $query = "SELECT * FROM roles";
            $row = mysqli_query($conn,$query);
            while ($result = mysqli_fetch_array($row)) { ?>
                <option value="<?php echo $result['id']; ?>"><?php echo $result['role_name']; ?></option>
                <?php } ?>
            </select><label for="selectpermission">Select Permission :</label>
                <select name="permission" id="">
                    <option value="employers">Employers</option>
                    <option value="accounts">Accounts</option>
                    <option value="transactions">Transactions</option>
                </select><br>
        <button type='submit' name='submit'>Submit</button>
        <?php }else { echo "You Are not Allowed"; } mysqli_close($conn); ?>
</section>
</main>
<?php include "footer.php";?>