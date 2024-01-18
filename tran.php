<?php include "header.php";?>
<body  style="background-color: #00FFFF;">
<?php include "menu.php"; ?>
<main>
<section>
<?php if (transaction($userId, 'transactions', '1')) { ?>
        <h2>Transaction Monitoring</h2>
        <p>Monitor transactions and review suspicious activities.</p>
        <?php if (transactionAdd($userId, 'transactions', '1')) { ?>
        <button style="margin: 20px;"><a href="with-dep.php">Deposit & Withdraw</a></button> 
        <button><a href="transfer.php">Transfer</a></button> 
        <button><a href="passbook.php">Passbook Print</a></button> 
        <?php }
         else { echo "<p style='color: red;'> You don't have permission for making transactions.</p>"; } ?>
    <?php $query = "SELECT * FROM transactions where `disable` = '1'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {?> 
    <table class="transaction-table">
        <caption>Transaction List</caption>
        <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Account Number</th>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['account_number']; ?></td>
            <td><?php echo $row['transaction_type']; ?></td>
            <td>₹<?php echo $row['amount']; ?></td>
            <td><?php echo $row['transaction_date']; ?></td>
            <td>Completed</td>
        </tr> 
        <?php } ?>
            </tbody>
        </table>
<?php } else {  echo "No records found."; } ?>
<?php } else { echo "You don't have permission for Transaction.";}?>
    </section>
</main>
<?php include "footer.php"; ?>