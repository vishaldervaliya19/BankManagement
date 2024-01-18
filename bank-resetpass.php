<?php include "header.php";?>
  <body>
<?php include "menu.php";
function Resetpass($userId, $rolename){
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
    <h2>Reset Password</h2>
    <?php if (Resetpass($userId, 'Manager')) {
$query = "SELECT * FROM users where `disable` = '1'";
$result = $conn->query($query);
if (mysqli_num_rows($result) > 0) { ?> 
        <table class="user-table">
            <caption>Employers List</caption>
            <thead>
            <tr>
                <th>Employers</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody> 
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <td><?php echo $row['firstname'] ."&nbsp;". $row['middlename'] ."&nbsp;" . $row['lastname']; ?></td>
                <?php $id = $row['role_id'];
                $sql  = "SELECT id,role_name from roles where id = $id";
                $s1 = mysqli_query($conn,$sql);
                while ($em1 = mysqli_fetch_array($s1)) { ?>
                <td><?php echo $em1['role_name']; ?></td>
                <?php } ?>
                <td>
                                    <button class="edit-button">
                                        <a href="bank-cpass.php?id=<?php echo $row['id']; ?>">
                                            Reset Password
                                        </a>
                                    </button>
                </td>
            </tr> <?php } ?>
            </tbody>
        </table>
<?php } else { echo "No records found.";  } 
}else {
    echo "You Are not Allowed";
} mysqli_close($conn); ?>
    </section>
</main>
<?php include "footer.php"; ?>