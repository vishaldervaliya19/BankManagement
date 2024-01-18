<?php include "header.php";?>
<body style="background-color: #D3D3D3;">
<?php include "menu.php";
function permission($userId, $rolename){
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

    <?php if (permission($userId, 'Manager')) {?>
    <main>
<?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); ?> 
<section>  
        <h2>Permission Management</h2>
        <p>Manage roles and perform permission-related actions.</p>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
        <table class="user-table">
        <caption>Permission List</caption>
            <thead>
            <tr>
                <th>RoleName</th>
                <th>Access For</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
                <th></th>
            </tr>
            </thead>
            <tbody> 
            <?php  $sql = "SELECT * FROM pmmss p
                 join roles r on p.role_id = r.id";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                        $rolenameid = $row['role_id']; ?>
                        <tr> <form action='update-perm.php' method='post'>
                                   <td><select name="role" id="">
                                    <?php $query1 = "SELECT * FROM roles";
                                $result1 = mysqli_query($conn,$query1);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                $roleid = $row1['id'];
                                $rolename = $row1['role_name']; ?>
                                <option value="<?php echo $roleid; ?>" <?php if($rolenameid == $roleid){echo"selected";} ?>>
                                        <?php echo $row1['role_name']; ?></option>
                                        <?php } ?>
                                    </select></td>
                            <td><input type='text' name='permission' value='<?php echo $row["permission"]; ?>' readonly></td>
                            <td><input type='checkbox' name='add' <?php echo ($row["add"] == 1 ? "checked" : "") ?>></td>
                            <td><input type='checkbox' name='edit' <?php echo ($row["edit"] == 1 ? "checked" : "")  ?>></td>
                            <td><input type='checkbox' name='delete' <?php echo ($row["delete"] == 1 ? "checked" : "") ?>></td>
                            <td><input type='checkbox' name='view' <?php echo ($row["view"] == 1 ? "checked" : "") ?>></td>
                            <td><button type='submit'>Update</button></td>
                    </form></tr>
                <?php } } else { echo "<tr><td colspan='7'>No records found</td></tr>";} ?>
                </tbody>
        </table>
                </section>
                </main>
     <?php  }else {
        echo "You Are not Allowed";
    } mysqli_close($conn);     include "footer.php"; ?>