<?php
session_start();
include 'dbConn.php';
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

if (isset($_POST['send'])) {
    $detail = $_POST['detail'];
    $datetime = $_POST['datetime'];
    $query = "INSERT INTO `tblreminder`(`user_id`, `detail`, `date`) VALUES ( $myID, '$detail', '$datetime')";
    if (mysqli_query($connection, $query)) {
        echo 'Reminder successfully created!';
        header("Location:reminder.php?myID=" . $_SESSION['myID']);
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
    <title>Add Reminder</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datetimepicker').datetimepicker({
                format: 'Y-m-d H:i:s', // Specify the desired format for date and time
                step: 15 // Set the time step to 15 minutes (optional)
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
        <h3>Add Reminder</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / <a href="reminder.php?myID=<?php echo $_SESSION['myID']; ?>">Reminder</a> / Add Reminder</p>
    </div>
    <div class="contact">
        <form action="#" method="post" id="registerForm" style="font-size: 20px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
            Detail: <input type="text" name="detail" class="boxs"> <br>
            Datetime: <input type="text" name="datetime" id="datetimepicker" class="boxss"> <br>
            <input type="submit" value="Add" name="send" class="btn">
            <a href="reminder.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Cancel</a>
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