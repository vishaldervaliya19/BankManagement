<?php include "header.php";?>
<body  style="background-color: #90EE90;">
<?php include "menu.php"; ?>
<main>    
<?php if (empAdd($userId, 'employee', '1')) {?>
<section>
      <h2>Create Employers</h2>
        <p>Create Employers and access levels.</p>
        <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']); ?>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
        <form class="user-form" method="post" action="insert-emp.php" enctype="multipart/form-data">
            <h3>Add New Employers</h3>
            <div class="row">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" >
            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" >
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" >
            <label for="email">Email :</label>
            <input type="email" name="email" >
            <label for="contact">Mobile No.:</label>
            <input type="tel" name="contact" title="Error Message" pattern="[1-9]{1}[0-9]{9}"  maxlength="10"> 
            <label for="email">Address :</label>
            <input type="text" name="address" >
            <label for="password">Password :</label>
            <input type="password" name="password" id="" >
            <?php $sql = "SELECT id,role_name FROM roles";
$result = mysqli_query($conn,$sql);
if ($row = mysqli_num_rows($result)) {
    echo "<label for='access-level'>Access Level:</label>";
    echo "<select name='role_id' >";
    echo "<option value=''>Select Role</option>";
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $rolename = $row['role_name'];
        echo "<option value='$id'>$rolename</option>"; }
    echo "</select>";
} else {    echo "No roles found in the database.";}
mysqli_close($conn);?>
            <label for="image">Profile Image:</label>
            <input type="file" name="profile" id="profile"><br>
</div>
            <button type="submit">Submit</button>
        </form>
    </section>
    <?php } else { echo "You don't have permission to view the dashboard."; } ?>
<?php include "footer.php"; ?>