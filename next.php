<?php include "header.php"; ?>
<body style="background-color: azure;">
<?php include "menu.php"; ?>
<main>
<section>
<?php if (transactionAdd($userId, 'transactions', '1')) { ?>
        <h2>Transaction Monitoring</h2>
        <p>Monitor transactions and review suspicious activities.</p>
<?PHP  $accno = $_POST['account_number'];
$select = "SELECT * FROM accounts WHERE account_number = '$accno'";
$result = mysqli_query($conn, $select);
while ($r1 = mysqli_fetch_array($result)) {
    $name = $r1['firstName']; $name1 = $r1['middleName'];
    $name2 = $r1['lastName']; $aadhar = $r1['aadharFile']; $sign = $r1['sign']; ?>
<form action="verify-doc.php" method="POST" target="_blank">
            <label for="accountNumber">Verify Documents :</label>
            <input type="text" id="accountNumber" name="accountNumber" value="<?php echo $accno; ?>" required hidden>
            <button type="submit">Verify</button>
        </form><br> 
<form action="next3.php" method="POST" class="account-form">
        <h3>Withdraw And Deposit</h3>
            <div>
                <lable>
                    Holder Name : <input type="tel" name="firstName" value="<?php echo $name .'&nbsp;'. $name1.'&nbsp;'. $name2; ?>" placeholder="Account Number" readonly>
                </lable><br>
                <lable> 
                    Account Number : <input type="tel" name="account_number" value="<?php echo $accno; ?>"  readonly>
                </lable><br>
                <?php } ?>
                <lable>
                    Select Transaction Type :
                    <select name="type">
                        <option value="deposit">Deposit</option>
                        <option value="withdraw">Withdraw</option>
                    </select>
                </lable>
                <br>
                <label for="">Enter Amount : <br>
                    <input type="number" step="0.01" min="0" id="balance" name="amount">
                </label> <br>
                <input type="submit" value="Next">
            </div>
        </form>
        <?php } ?>
</section>
</main>
<?php include "footer.php"; ?>