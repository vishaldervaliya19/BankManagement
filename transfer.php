<?php include "header.php"; ?>
<body> 
<?php include "menu.php"; ?>
 <main>
    <section>
    <?php if (transactionAdd($userId, 'transactions', '1')) { ?>
    <form action="transfer_funds.php" method="POST" class="user-form">
    <h3>Funds Transfer</h3>
        <label for="fromAccount">From Account Number:</label>
        <input type="text" name="fromAccount" id="fromAccount" placeholder="From Account ..." required><br><br>
        <label for="toAccount">To Account Number:</label>
        <input type="text" name="toAccount" id="toAccount" placeholder="To Account ..." required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" placeholder="Amount" required><br><br>
        <input type="submit" value="Transfer Funds" style="width: 30%;">
    </form>
    <?php } ?>
    </section>
 </main>
<?php include "footer.php"; ?>