<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #003366;
    color: #ffffff;
    text-align: center;
    padding: 1em 0;
}

main {
    padding: 2em;
}

.login-section {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 2em;
}

.login-box {
    background-color: #f0f0f0;
    padding: 2em;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 40%;
}

form {
    display: flex;
    flex-direction: column;
}

input {
    margin-bottom: 1em;
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 0.5em 1em;
    background-color: #003366;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

footer {
    background-color: #003366;
    color: #ffffff;
    text-align: center;
    padding: 1em 0;
}

    </style>
    <title>Bank Website</title>
</head>
<body>
    <header>
        <h1>Welcome to Our Bank</h1>
    </header>
    
    <main>
        <section class="login-section">
            <div class="login-box">
                <h2>Bank Staff Login</h2>
                <form action="bank-login.php" method="post">
                    <input type="email" name="email" placeholder="Email " required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>

            <div class="login-box">
                <h2>Customer Login</h2>
                <form action="customer-login.php" method="post">
                    <input type="text" name="account_number" placeholder="Account Number" required>
                    <input type="password" name="password" placeholder="PIN" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Our Bank. All rights reserved.</p>
    </footer>
</body>
</html>
