<?php
session_start();
include 'dbConn.php';
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

if (isset($_POST['send'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $query = "INSERT INTO `tblsetting`(`user_id`, `category`, `amount`) VALUES ( $myID, '$category'
    ,'$amount')";
    if (mysqli_query($connection, $query)) {
        echo 'Budget successfully created!';
        header("Location:budget.php?myID=" . $_SESSION['myID']);
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
    <title>Add Budget Setting</title>
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
        <h3>Add Budget</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / <a href="budget.php?myID=<?php echo $_SESSION['myID']; ?>">Budget Setting</a> / Add Budget</p>
    </div>
    <div class="contact">
        <form action="#" method="post" id="registerForm" style="font-size: 20px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
            <label for="category">Budget Category:</label>
            <select name="category" id="category" class="boxs">
                <?php
                $sqls = "SELECT categoryName FROM tblexpense WHERE type LIKE 'Expense'";
                $results = mysqli_query($connection, $sqls);

                // Loop through the database results and generate options
                while ($rows = mysqli_fetch_assoc($results)) {
                    $categoryName = $rows['categoryName'];
                    echo "<option value='$categoryName'>$categoryName</option>";
                }

                mysqli_close($connection);
                ?>
            </select>
            <br>
            Amount (RM): <input type="number" name="amount" id="amountInput" class="boxs"> <br>
            <input type="submit" value="Add" name="send" class="btn">
            <a href="budget.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Cancel</a>
        </form>
    </div>

    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</body>

<?php include 'userfooter.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>