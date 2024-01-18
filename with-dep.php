<?php include "header.php"; ?>
<body style="background-color: azure;">
<?php include "menu.php"; ?>
<main>
<section>
<?php if (transactionAdd($userId, 'transactions', '1')) { ?>
        <h2>Transaction Monitoring</h2>
        <p>Monitor transactions and review suspicious activities.</p>
        <form action="next.php" method="POST" class="account-form">
        <h3>Withdraw And Deposit</h3>
            <div>
                <lable>
                    Account Number : <input type="tel" name="account_number"  placeholder="Account Number">
                </lable><br><br>
<input type="submit" value="Next">
            </div>
        </form>
        <?php } else { echo "You dont have permission"; } ?>
    </section>
</main>
<?php include "footer.php"; ?>