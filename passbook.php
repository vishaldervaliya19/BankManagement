<?php include "header.php"; ?>
<body style="background-color: azure;">
<?php include "menu.php"; ?>
<main>
    <section>
<form method="POST" action="print-passbook.php" target="_blank">
        <label for="accountNumber">Account Number:</label>
        <input type="text" id="accountNumber" name="accountNumber" placeholder="Account Number" required>
        <input type="submit" value="Get History">
    </form>
    </section>
</main>
<?php include "footer.php"; ?>