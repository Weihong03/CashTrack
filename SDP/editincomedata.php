<?php
session_start();
include 'dbConn.php';
$myIDS = $_GET['myIDS'];
$myID = $_SESSION['myID'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $account = $_POST['account'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $updateQuery = "UPDATE tblbudget SET title='$title', amount='$amount', account='$account', expenseCategory='$category', date='$date' WHERE id= '$myIDS'";

    // Update the 'balance' for the associated account
    $expenseAmount = $_POST['amount'];
    $accountName = $_POST['account'];

    $balanceQuery = "SELECT balance FROM tblaccounts WHERE user_id = '$myID' AND name = '$accountName'";
    $balanceResult = mysqli_query($connection, $balanceQuery);
    $balanceRow = mysqli_fetch_assoc($balanceResult);
    $currentBalance = $balanceRow['balance'];

    // Get the original expense amount from the database
    $originalExpenseAmountQuery = "SELECT amount FROM tblbudget WHERE id = '$myIDS'";
    $originalExpenseAmountResult = mysqli_query($connection, $originalExpenseAmountQuery);
    $originalExpenseAmountRow = mysqli_fetch_assoc($originalExpenseAmountResult);
    $originalExpenseAmount = $originalExpenseAmountRow['amount'];

    $updatedBalance = $currentBalance - $originalExpenseAmount + $expenseAmount;

    $updateBalanceQuery = "UPDATE tblaccounts SET balance = '$updatedBalance' WHERE user_id = '$myID' AND name = '$accountName'";
    mysqli_query($connection, $updateBalanceQuery);

    $querys = $updateQuery . "; " . $updateBalanceQuery;

    if (mysqli_multi_query($connection, $querys)) {
        echo 'Income successfully updated!';
        header("Location:income.php?myID=" . $_SESSION['myID']);
    } else {
        echo 'Sorry, something went wrong';
    }
}
?>

<?php include 'userheader.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Income</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

        var amountInput = document.getElementById("amountInput");
        amountInput.addEventListener("input", function() {
            var value = parseFloat(this.value);
            this.value = value.toFixed(2);
        });
    </script>

    <style>
        @keyframes openAccount {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="heading">
        <h3>Edit Income</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / <a href="income.php?myID=<?php echo $_SESSION['myID']; ?>">Income Management</a> / Edit Income</p>
    </div>

    <?php
    $query = "SELECT * FROM tblbudget WHERE id = '$myIDS'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
    ?>
        <div class="contact">
            <form action="#" method="post" id="registerForm" style="font-size: 20px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
                Title: <input type="text" name="title" class="boxs" value="<?php echo $rows['title']; ?>"> <br>
                <label for="account">Account:</label>
                <select name="account" id="account" class="boxs">
                    <?php
                    $sql = "SELECT name FROM tblaccounts WHERE user_id = $myID";
                    $result = mysqli_query($connection, $sql);

                    // Loop through the database results and generate options
                    while ($row = mysqli_fetch_assoc($result)) {
                        $account = $row['name'];
                        $selected = ($account == $rows['account']) ? "selected" : "";
                        echo "<option value='$account' $selected>$account</option>";
                    }
                    ?>
                </select>
                <br>
                Amount (RM): <input type="number" name="amount" id="amountInput" class="boxs" value="<?php echo $rows['amount']; ?>"> <br>
                <label for="category">Expense Category:</label>
                <select name="category" id="category" class="boxs">
                    <?php
                    $sqls = "SELECT categoryName FROM tblexpense WHERE type LIKE 'Income'";
                    $results = mysqli_query($connection, $sqls);

                    // Loop through the database results and generate options
                    while ($rowss = mysqli_fetch_assoc($results)) {
                        $categoryName = $rowss['categoryName'];
                        $selected = ($categoryName == $rows['category']) ? "selected" : ""; // Check if the option matches the database value
                        echo "<option value='$categoryName' $selected>$categoryName</option>";
                    }
                    ?>
                </select>
                <br>
                Date: <input type="text" name="date" id="datepicker" class="boxss" value="<?php echo $rows['date']; ?>"> <br>
                <input type="submit" value="Update" name="send" class="btn">
                <a href="income.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Cancel</a>
                <?php
                mysqli_close($connection);
                ?>
            </form>
        </div>
    <?php
    } else {
        echo 'Record not found! Please try again later.';
    }
    ?>

</body>

<?php include 'userfooter.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>