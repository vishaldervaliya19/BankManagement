<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Results</title>
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
        <?php
        include "include/dbcon.php";

        if (isset($_POST['accountNumber'])) {
            $accountNumber = $_POST['accountNumber'];
            
            $sql = "SELECT * FROM accounts WHERE account_number = '$accountNumber' and `disable`='1' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<ul>';
                echo '<li><strong>Account Number:</strong> ' . $row['account_number'] . '</li>';
                echo '<li><strong>Name:</strong> ' . $row['firstName'] . '</li>';
                echo '<li><strong>Balance:</strong> ' . $row['balance'] . '</li>';
                echo '</ul>';
            } else {
                echo '<p>No account found with that account number.</p>';
            }
        } else {
            echo '<p>No account number provided.</p>';
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</body>
</html>
