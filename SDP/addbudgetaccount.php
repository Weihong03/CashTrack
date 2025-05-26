<?php
session_start();
include 'dbConn.php';
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $balance = $_POST['balance'];
    $query = "INSERT INTO `tblaccounts`(`user_id`, `name`, `balance`) VALUES ( $myID,
    '$name','$balance')";
    if (mysqli_query($connection, $query)) {
        echo 'Account successfully created!';
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
    <title>Add Budget Account</title>
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
        <h3>Add Budget Account</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>">Budget Account</a> / Add Account</p>
    </div>
    <div class="contact">
        <form action="#" method="post" id="registerForm" style="font-size: 20px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
            Account Name: <input type="text" name="name" class="boxs"> <br>
            Account Balance (RM): <input type="number" name="balance" id="amountInput" class="boxs"> <br>
            <input type="submit" value="Add" name="send" class="btn">
            <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Cancel</a>
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