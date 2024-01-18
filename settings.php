<?php include "header.php"; ?>
<body style="background-color: azure;">
<?php include "menu.php";
function settings($userId, $rolename){
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
    <h2>Settings</h2>
    <p>Configure and manage system settings.</p>
    <?php if (settings($userId, 'Manager')) {?>
    <form class="settings-form">
        <h3>General Settings</h3>
       <button><a href="Permission.php">Staff Permission</a></button>
       <button><a href="role.php">Role</a></button>
       <button><a href="bank-resetpass.php">Staff Reset Password</a></button>
    </section>
    <?php }else {
    echo "You Are not Allowed";
} mysqli_close($conn);
 include "footer.php"; ?>