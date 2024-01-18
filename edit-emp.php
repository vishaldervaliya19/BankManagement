<?php include "header.php";?>
<body  style="background-color: #ADD8E6;">
<?php include "menu.php"; ?>
<main>
<?php if (empEdit($userId, 'employee', '1')) { ?>
    <section>
    <?php $id = $_GET['id'];
$user = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $user);
if ($row = mysqli_fetch_assoc($result)) {
    $fname = $row["firstname"];  $mname = $row['middlename'];
    $lname = $row['lastname']; $role = $row['role_id'];
    $email = $row['email']; $address = $row['address'];
    $contact = $row['contact']; } else {
    echo "Record Not Found"; } ?>
    <h2>Update Employee</h2>
        <p>Manage Employee and perform related actions.</p>
<form action="update-emp.php?id=<?php echo $row['id']; ?>" method="POST" class="account-form">
        <h3>Update Employee</h3>
        <div class="row">
            <label for="firstname">First Name:</label>
            <input type="text" name="fname" value="<?php echo $fname; ?>" required>
            <label for="middlename">Middle Name:</label>
            <input type="text" name="mname" value="<?php echo $mname; ?>" required>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $lname; ?>" required>
            <label for="role">Role Name :</label>
            <select name="role_id" id="">
            <?php $query1 = "SELECT * FROM roles";
            $result1 = mysqli_query($conn,$query1);
            while ($row1 = mysqli_fetch_array($result1)) {
            $roleid = $row1['id']; $rolename = $row1['role_name']; ?>
            <option value="<?php echo $roleid; ?>" <?php if($role == $roleid){echo"selected";} ?>>
                <?php echo $row1['role_name']; ?></option> <?php } ?>
            </select>
            <label for="email">Email :</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <label for="customer-name">Address:</label>
            <input type="text" name="address" cols="50" rows="2" value="<?php echo $address; ?>" Required>
            <label for="customer-name">Contact No.:</label>
            <input type="tel" name="contact" value="<?php echo $contact; ?>" required>
</div> <input type="submit" value="Update">
</form>
</section>
<?php } else { echo "You don't have permission to view the dashboard."; }?>
</main> <?php include "footer.php";?>