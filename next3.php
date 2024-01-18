<?php include "include/dbcon.php";
$transactionType = $_POST['type']; $amount = $_POST['amount'];
$accountID = $_POST['account_number']; $timestamp = date('Y-m-d H:i:s');
$balanceQuery = "SELECT balance FROM accounts WHERE account_number = '$accountID'";
$balanceResult = mysqli_query($conn, $balanceQuery);
if ($balanceResult && mysqli_num_rows($balanceResult) > 0) {
    $row = mysqli_fetch_assoc($balanceResult);
    $currentBalance = $row["balance"];
    if ($transactionType === 'deposit') {
        $newBalance = $currentBalance + $amount;
    } elseif ($transactionType === 'withdraw') {
        $newBalance = $currentBalance - $amount;}
    $updateBalanceQuery = "UPDATE accounts SET balance = '$newBalance' WHERE account_number = '$accountID'";
    if (mysqli_query($conn,$updateBalanceQuery) === TRUE) {
        echo "Account balance updated successfully.\n";
    } else { echo "Error updating account balance: " . $conn->error . "\n";}
    $insertTransactionQuery = "INSERT INTO transactions (account_number, transaction_date, transaction_type, amount, total_amount,`disable`) 
                               VALUES ('$accountID', '$timestamp','$transactionType', '$amount', '$newBalance','1')";
    if (mysqli_query($conn,$insertTransactionQuery) === TRUE) {
        echo "DO NOT RELOAD PAGE Transaction record inserted successfully.\n";
        echo "<a href='with-dep.php'>Back</a>";
    } else { echo "Error inserting transaction record: " . $conn->error . "\n";}
} else { echo "Account not found.\n"; }
mysqli_close($conn); ?>
