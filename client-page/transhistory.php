<?php include "header.php";
$accountNumber = $_SESSION['id'];
$query = "SELECT * FROM transactions WHERE account_number = '$accountNumber'";
$result = mysqli_query($conn,$query);
$sqldepo = "SELECT balance from accounts where account_number = '$accountNumber'";
$resultdepo = mysqli_query($conn, $sqldepo);
$data1 = mysqli_fetch_assoc($resultdepo);
 $am1 = $data1['balance'];
if (mysqli_num_rows($result) > 0) { ?> <table class="customer-table">
    <tr>
        <th>Date</th>
        <th>Discription</th>
        <th>Cheque no.</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Last Balance</th>
    </tr>
<?php    while ($row = mysqli_fetch_assoc($result)) {
        $transactionDate = $row['transaction_date'];
        $transactionType = $row['transaction_type'];
        $amount = $row['amount']; 
        $tam = $row['total_amount'];?>
        <tr>
            <td><?php echo $transactionDate; ?></td>
            <td></td>
            <td></td>
        <td><?php echo $transactionType; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $tam; ?> Cr</td>
    </tr>
  <?php   }?>
  <tr><td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Current Balance:</td>
  <td><?php echo $am1; ?> Cr</td></tr>
</table>
<?php } else {   echo "No transaction history found for Account Number: $accountNumber";
} $conn->close(); include "footer.php"; ?>

