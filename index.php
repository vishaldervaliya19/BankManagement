<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0; }
main {
    padding: 2em; }
.login-section {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 2em; }
.login-box {
    width: 40%; 
    color: black;
        background-color: white;
        padding: 20px;
        border: 1px solid black;
        border-radius: 15px;   margin-right: 0px;
        transition: 0.3s ease-in-out;}
.login-box:hover {
        color: white;
        border: 1px solid white;
        border-radius: 0;
    background-image: url("client-page/car.png");
    image-resolution: auto;
    box-shadow: 5px 8px 3px grey;}
form {
    display: flex;
    flex-direction: column;}
input {
    margin-bottom: 1em;
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 3px;}
button {
    width: 40%;
    padding: 0.5em 1em;
    background-color: #003366;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;}
button:hover{
    background-color: lightblue;
    color: black;}
.content-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;}
.main-content {
    flex: 1;}
.bank-header {
    display: flex;
    align-items: center;
    justify-content: space-between; 
    padding: 20px;
    background-color:  #003366;
    color: white; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);}
.logo img {
    width: 50px;
    height: auto;
    margin-right: 20px;}
.bank-name {
    font-size: 24px;}
.slogan {
    font-size: 14px;
    color: #ccc;}
footer { 
    background-color: #003366;
    color: #ffffff;
    text-align: center;
    padding: 1em 0;}
a {
    width: 20%;
    background-color: #003366;
    color: #fff;
    font-size: 14px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-top: 5px;
    padding: 5px;
    text-align: center;
    text-decoration: none;}
a:hover {
    background-color: lightblue;
    color: black;}
    </style>
  <title>BB Bank</title>
  <link rel="icon" href="bank.png" type="image/x-icon">
<link rel="shortcut icon" href="bank.png" type="image/x-icon">
</head>
<body>
<header class="bank-header">
        <div class="logo">
            <img src="client-page/bank.png" alt="Bank Logo">
        </div>
        <div class="bank-info">
            <h1 class="bank-name">Boom Baam Bank</h1>
            <p class="slogan">BB Mini Bank</p>
        </div>
        <nav class="menu">   </nav>
        </header>
    <main>
        <section class="login-section">
            <div class="login-box">
                <h2>Bank Staff Login</h2>
                <?php $bankmsg = isset($_SESSION['bankmsg']) ? $_SESSION['bankmsg'] : '';
            unset($_SESSION['bankmsg']);?>
                 <div class="status-message" style="color: green;"><?php echo $bankmsg; ?></div>
                 <form action="bank-login.php" method="post">
                    <input type="email" name="email" placeholder="Email " required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
            <div class="login-box">
                <h2>Customer Login</h2>
                <?php $statusMessage = isset($_SESSION['statusMessage']) ? $_SESSION['statusMessage'] : '';
            unset($_SESSION['statusMessage']);?>
                <div class="status-message" style="color: green;"><?php echo $statusMessage; ?></div>
                <form action="customer-login.php" method="post">
                    <input type="text" name="account_number" placeholder="Account Number" required>
                    <input type="password" name="pin" placeholder="PIN" required>
                    <button type="submit">Login</button>
                    <a href="verify-email.php">Forgot</a>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 BB Bank. All rights reserved.</p>
    </footer>
</body>
</html>
