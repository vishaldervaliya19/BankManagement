<?php  include "header.php";?>
<body  style="background-color: ;">
<?php include "menu.php"; ?>
    <main> <section>
<?php if (empview($userId, 'employee', '1')) { ?>
      <h2>Employee Management</h2>
        <p>Manage employers and access levels.</p>
        <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); 
$delMessage = isset($_SESSION['delMessage']) ? $_SESSION['delMessage'] : '';
unset($_SESSION['delMessage']); ?>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?><?php echo $delMessage; ?></div>
        <button style="position: absolute; margin: 20px;"><a href="add-emp.php">Add Employee</a></button> <BR> <BR>
        <?php $query = "SELECT * FROM users where `disable` = '1'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {?> 
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
                <?php } ?> <td>
                   <?php  if (empEdit($userId, 'employee', '1')) {?>
                <button class="edit-button"><a href="edit-emp.php?id=<?php echo $row['id']; ?>"> Edit</a></button>
                        <?php } else { ?>
                        <button class="edit-button">
                    <a href="#" style="color: red;"  onclick="permissionmsg()">Edit</a></button>
                    <?php } ?>
                    <?php if (empDelete($userId, 'employee', '1')) { ?>
                        <button class="delete-button">
                        <a href="delete-emp.php?id=<?php echo $row['id']; ?>" onclick="alertmsg()">Delete</a>
                        </button>
                        <?php } else {?>
                        <button class="delete-button">
                        <a href="#" style="color: red;" onclick="permissionmsg()"> Delete</a>
                        </button>           
                    <?php } ?> </td>
            </tr> <?php } ?>
            </tbody>
        </table>
<?php } else { echo "No records found."; } mysqli_close($conn); ?>
    </section>
<script>
    function alertmsg()
    {  alert("Delete");}
    function permissionmsg()
{  alert("You Don't Have Permission"); }
</script>
    <?php  } else { echo "You don't have permission to view the Employee."; }?>
<?php include "footer.php"; ?>