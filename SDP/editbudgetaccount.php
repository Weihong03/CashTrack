<?php
session_start();
include 'dbConn.php';
$myID = $_SESSION['myID'];
$myIDS = $_GET['myIDS'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $balance = $_POST['balance'];
    $updateQuery = "UPDATE tblaccounts SET name='$name', balance='$balance' WHERE id= '$myIDS'";
    if (mysqli_query($connection, $updateQuery)) {
        echo 'Expense successfully created!';
        header("Location:budgetaccount.php?myID=" . $_SESSION['myID']);
    } else {
        echo 'Sorry, something went wrong';
    }
}
mysqli_close($connection);
?>

<?php include 'userheader.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
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
        <h3>Edit Budget Account</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>">Budget Account</a> / Edit Account</p>
    </div>


    <?php
    $query = "SELECT * FROM tblaccounts WHERE id = '$myIDS'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
    ?>
        <div class="contact">
            <form action="#" method="post" id="registerForm" style="font-size: 20px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
                Account Name: <input type="text" name="name" class="boxs" value="<?php echo $rows['name']; ?>"> <br>
                Account Balance (RM): <input type="number" name="balance" id="amountInput" class="boxs" value="<?php echo $rows['balance']; ?>"> <br>
                <input type="submit" value="Update" name="send" class="btn">
                <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Cancel</a>
            </form>
        </div>
    <?php
    } else {
        echo 'Record not found! Please try again later.';
    }
    ?>

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