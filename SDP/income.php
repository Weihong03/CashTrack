<?php

include 'dbConn.php';
session_start();
$myID = $_GET['myID'];
$query = "SELECT * FROM tblbudget WHERE `user_id` = '$myID' AND tblbudget.category = 'Income' ORDER BY tblbudget.date DESC";
//Execute Query
$results = mysqli_query($connection, $query);

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

?>
<?php include 'userheader.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Management</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

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
        <h3>Income Management </h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Income Management </p>
    </div>
    <table border="1" class="table-fill" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
        <colgroup>
            <col width="1%">
            <col width="15%">
            <col width="10%">
            <col width="15%">
            <col width="25%">
            <col width="20%">
        </colgroup>
        <thead>
            <tr class="table-title text-left">
                <th>#</th>
                <th>Date Created</th>
                <th>Account</th>
                <th>Amount</th>
                <th>Title</th>
                <th>Expense Category</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $query = "SELECT * FROM `tblbudget` WHERE tblbudget.user_id = '$myID' AND tblbudget.category = 'Income' ORDER BY tblbudget.date DESC";
            $results = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo date("Y-m-d", strtotime($row['date'])) ?></td>
                    <td><?php echo $row['account'] ?></td>
                    <td>
                        <p>RM <?php echo number_format($row['amount']) ?></p>
                    </td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['expenseCategory'] ?></td>
                    <td><a href="editincomedata.php?myIDS=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="deleteincomedata.php?myIDS=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php }
            mysqli_close($connection);
            ?>
        </tbody>
    </table>

    <div style="height: 42px; width:200px; margin: 0 auto">
        <div style="display: flex; justify-content: center; align-items: center">
            <a href="addincomedata.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn" style="animation: openAccount 0.5s ease forwards">Add New</a>
        </div>
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