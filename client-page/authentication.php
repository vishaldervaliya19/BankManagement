<?php include "header.php";  $accid = $_SESSION['id']; ?>
<main>
    <section class="account-section">
        <?php $sql = "SELECT * FROM account_answers";
        $result = mysqli_query($conn, $sql);
        $userAnswerSql = "SELECT DISTINCT accid FROM account_answers WHERE accid = $accid";
        $userAnswerResult = mysqli_query($conn, $userAnswerSql);
        if (mysqli_num_rows($userAnswerResult) > 0) {
            echo "You have already given the answers."; } else { ?>
        <form action="insert-ans.php" method="post" enctype="multipart/form-data">
                <label for="question"> Enter Your Question : </label>
                <input type="text" name="questions" value=""><br><br>
                <label for=" ">Enter Your Answer :</label>
                <input type="text" name="answers" required> <br><br>
            <input type="submit" value="Submit Answers">
        </form>
        <?php } ?>
    </section>
</main>
<?php include "footer.php"; ?>
