<?php include "include/dbcon.php";
$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amount = $_POST['amount'];
$success = transferFunds($conn, $fromAccount, $toAccount, $amount);
if ($success) {
    echo "Funds transferred successfully!";
    echo "<p style='color: red;'>Do not refresh this Page</p><button><a href='transfer.php'>Clicl To Back</a></button>";
} else {  echo "Error transferring funds. Please try again."; echo "<button><a href='transfer.php'>Back To</a></button>"; }
mysqli_close($conn);
function transferFunds($conn, $fromAccount, $toAccount, $amount) {
    $query = "SELECT * FROM accounts WHERE account_number IN ('$fromAccount', '$toAccount')";
    $result = $conn->query($query);
    if ($result->num_rows !== 2) { return false; }
    $conn->autocommit(false);
    try {
        $fromAccountDetails = getAccountDetails($conn, $fromAccount);
        $toAccountDetails = getAccountDetails($conn, $toAccount);
        if ($fromAccountDetails['balance'] < $amount) {
            throw new Exception("Insufficient funds.");}
        $fromAccountNewBalance = $fromAccountDetails['balance'] - $amount;
        $toAccountNewBalance = $toAccountDetails['balance'] + $amount;
        $updateFromAccountQuery = "UPDATE accounts SET balance = $fromAccountNewBalance WHERE account_number = '$fromAccount'";
        $updateToAccountQuery = "UPDATE accounts SET balance = $toAccountNewBalance WHERE account_number = '$toAccount'";
        $conn->query($updateFromAccountQuery);
        $conn->query($updateToAccountQuery);
        $timestamp = date('Y-m-d H:i:s');
$fromAccountHistoryQuery = "INSERT INTO transactions (`account_number`,  `transaction_date`, `transaction_type`, `amount`, `total_amount`) VALUES ('$fromAccount', '$timestamp', 'Debit', '$amount','$fromAccountNewBalance')";
$conn->query($fromAccountHistoryQuery);
$toAccountHistoryQuery = "INSERT INTO transactions (`account_number`, `transaction_date`, `transaction_type`, `amount`, `total_amount`) VALUES ('$toAccount', '$timestamp', 'Credit', '$amount','$toAccountNewBalance')";
$conn->query($toAccountHistoryQuery);
        $conn->commit(); return true;
    } catch (Exception $e) {
        $conn->rollback();
        return false; } }
function getAccountDetails($conn, $accountNumber){
    $query = "SELECT * FROM accounts WHERE account_number = '$accountNumber'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc(); }
    return null; }?>
