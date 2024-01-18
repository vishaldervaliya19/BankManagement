<?php include "header.php";?>
  <body>
<?php include "menu.php";?>
    <main>
    <section>
    <h2>Dashboard</h2>
  <p>Welcome, <p1 style="text-transform:uppercase; font-weight: bold;"> <?php echo $name; ?> </p1>! Here's an overview of the bank's operations.</p>
  <div class="widget-container">
    <div class="widget">
      <h3>Total Revenue</h3>
    <?php $sql = "SELECT sum(balance) as total FROM accounts";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);?>
<p class="widget-value"><?php echo $data["total"]; ?></p>
<?php  ?>
</div>
    <div class="widget">
      <h3>Total Transactions Amount</h3>
    <?php $sql = "SELECT SUM(amount) as totalamount FROM transactions";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);?>
<p class="widget-value"><?php echo $data['totalamount']; ?></p>
<?php  ?>
   </div>
    <div class="widget">
      <h3>Total Transactions</h3>
      <?php $sql = "SELECT count(id) as totaltransaction FROM transactions";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result); ?>
      <p class="widget-value"><?php echo $data['totaltransaction']; ?></p>
      <?php ?>
    </div>
    <div class="widget">
      <h3>Total Accounts</h3>
      <?php $sql = "SELECT count(id) as totalacc FROM accounts";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result); ?>
      <p class="widget-value"><?php echo $data['totalacc']; ?></p>
      <?php ?>
    </div>
  </div>
</section>
</main>
<?php include "footer.php"; ?>