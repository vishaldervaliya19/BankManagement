<header>
    <h1>Bank Management  <?php $id = $_SESSION['email'];
$query = "SELECT firstname FROM users WHERE email = '$id'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);
$name = $userData['firstname'];?><f style="color: red; font-size: 18px;"><?php echo $name; ?></f></h1> 
    <nav>
      <ul>
        <li><a href="home.php">Dashboard</a></li>
        <?php
if (accountView($userId, 'accounts', '1')) {?>
    <li><a href="acc.php">Accounts</a></li>
    <?php  } else {?>
    <li><a href="#" style="color: red;">Accounts</a></li>
<?php  } ?>
<?php if (empview($userId, 'employee', '1')) { ?>
    <li><a href="emp.php">Employers</a></li>
    <?php  } else {?>
    <li><a href="#" style="color: red;">Employers</a></li>
<?php  } ?>
        <?php if (transaction($userId, 'transactions', '1')) {?>
        <li><a href="tran.php">Transaction</a></li>
    <?php  } else {?>
    <li><a href="#" style="color: red;">Transaction</a></li>
<?php  } ?>
        <li><a href="settings.php">Settings</a></li>
        <li ><a  style="color: darkred;" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>