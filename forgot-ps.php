<link rel="stylesheet" href="forgot.css">
<?php
// Include the database connection
include "include/dbcon.php";

$email = $_POST['email'];
// Fetch questions from the database

$sql2 = "SELECT * FROM accounts where email= '$email'";
$result2 = mysqli_query($conn, $sql2);
$r2 = mysqli_fetch_assoc($result2);
$id = $r2['account_number'];


$sql = "SELECT * FROM account_answers where accid= '$id'";
$result = mysqli_query($conn, $sql);
$r1 = mysqli_fetch_array($result);
  
$question = $r1['questions'];
$accid = $r1['accid'];
?>

<main>
    <section class="account-section">
        <form action="ans-c.php" method="post">

                <div>
                    <label>Question: <?php echo $question; ?></label><br>
                    <!-- <input type="text" name="questions" value="<//?php echo $question; ?>"><br> -->
                    <input type="text" name="accid" value="<?php echo $accid; ?>" hidden>
                    <label for="">Enter Answer : </label>
                    <input type="text" name="answers" required>
                </div>

            <input type="submit" value="Submit Answers">
        </form>
    </section>
</main>
