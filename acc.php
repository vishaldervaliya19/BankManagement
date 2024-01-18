<?php include "header.php";?>
<body  style="background-color: azure;">
<?php include "menu.php"; ?>
<main>
<?php if (accountview($userId, 'accounts', '1')) {?>
<section>
        <h2>Account Management</h2>
        <p>Manage customer accounts and perform account-related actions.</p>
        <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
unset($_SESSION['statusMessage']);
$delMessage = isset($_SESSION['delMessage']) ? $_SESSION['delMessage'] : '';
unset($_SESSION['delMessage']); ?>
        <div class="status-message" style="color: green;"><?php echo $statusMessage; ?><?php echo $delMessage; ?></div>
        <button style="margin: 20px;"><a href="add-Acc.php">Add Account</a></button> 
        <form action="search.php" method="POST" target="_blank" style="margin: 20px;">
            <label for="accountNumber">Account Number:</label>
            <input type="text" id="accountNumber" name="accountNumber" required>
            <button type="submit">Search</button>
        </form>
<?php  $query = "SELECT * FROM accounts where `disable` = '1'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {?> 
    <table class="account-table">
        <caption>Account List</caption>
        <thead>
        <tr>
            <th>Account Number</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Balance</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['account_number']; ?></td>
            <td><?php echo $row['firstName'] ."&nbsp;". $row['middleName'] ."&nbsp;" . $row['lastName']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td>₹<?php echo $row['balance']; ?></td>
            <td><button class="delete-button">                            
                    <a href="edit-doc.php?id=<?php echo $row['id']; ?>" onclick="alertmsg()">Update Document</a>
                </button>
            <?php  if (accountView($userId, 'accounts', '1')) { ?>
                        <button class="delete-button">                            
                            <a href="view-acc.php?id=<?php echo $row['id']; ?>" onclick="alertmsg()">View</a>
                        </button>
                        <?php } else { ?>
                        <button class="delete-button">
                            <a href="#" style="color: red;" onclick="permissionmsg()"> View</a>
                        </button>           
                    <?php }?>
                    <?php
                    if (accountEdit($userId, 'accounts', '1')) { ?>
                        <button class="delete-button">
                        <a href="edit-acc.php?id=<?php echo $row['account_number']; ?>" onclick="alertmsg()">Edit</a>
                        </button>
                        <?php 
                    } else {?>
                        <button class="delete-button">
                        <a href="#" style="color: red;" onclick="permissionmsg()">
                            Edit
                        </a>
                        </button>           
                    <?php }?>
            <?php   if (accountDelete($userId, 'accounts', '1')) {?>
                        <button class="delete-button">
                        <a href="delete-acc.php?id=<?php echo $row['account_number']; ?>" onclick="alertmsg()">Delete</a>
                        </button>
                        <?php  } else {?>
                        <button class="delete-button">
                        <a href="#" style="color: red;" onclick="permissionmsg()">
                            Delete
                        </a>
                        </button>           
                    <?php } ?>
            </td>
        </tr>
        <?php } ?>
            </tbody>
        </table>
<?php } else { echo "No records found.";} mysqli_close($conn); ?>
</section>
<?php } else { echo "You don't have permission for Account Management.";}?>
<script>
    function permissionmsg()
{
    alert("You Don't Have Permission");
}
</script>
</main>
<?php include "footer.php"; ?>
