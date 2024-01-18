<style>
        table {  border-collapse: collapse;
            width: 100%; }
        th, td {  border: 1px solid #ddd;
            padding: 8px; text-align: left;}
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f2f2f2;}
        tr:hover { background-color: #ddd;}
        td:last-child { font-weight: bold;}
        button {
            margin-top: 10px; background-color: #4CAF50; color: white;
            border: none; padding: 10px 20px; text-align: center;
            text-decoration: none; display: inline-block;
            font-size: 16px;  cursor: pointer; }
        button a { text-decoration: none; color: black; }
    </style>
<?php include "include/dbcon.php";
$accountNumber = $_POST['accountNumber'];
$query = "SELECT * FROM transactions WHERE account_number = '$accountNumber'";
$result = mysqli_query($conn,$query);
$sqldepo = "SELECT balance from accounts where account_number = '$accountNumber'";
$resultdepo = mysqli_query($conn, $sqldepo);
$data1 = mysqli_fetch_assoc($resultdepo);
 $am1 = $data1['balance'];
if (mysqli_num_rows($result) > 0) {
    ?> <table>
    <tr>
        <th>Date</th>
        <th>Discription</th>
        <th>Cheque no.</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Last Balance</th>
    </tr>
<?php    while ($row = $result->fetch_assoc()) {
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
  <?php  }?>
  <tr><td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Current Balance:</td>
  <td><?php echo $am1; ?> Cr</td></tr>
</table>
<?php } else {   echo "No transaction history found for Account Number: $accountNumber"; }mysqli_close($conn); ?>
