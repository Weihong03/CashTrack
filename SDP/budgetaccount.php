<?php
include 'dbConn.php';
session_start();
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Accounts</title>
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

    <?php include 'userheader.php'; ?>
</head>

<body>
    <div class="heading">
        <h3>Budget Account</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Budget Account </p>
    </div>
    <?php
    $i = 1;
    $query = "SELECT * FROM tblaccounts WHERE user_id = '$myID' order by `balance` desc ";
    //Execute Query
    $results = mysqli_query($connection, $query);
    ?>
    <table border=1 style="max-width: 650px;border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards" class="table-fill">
        <colgroup>
            <col width="1%">
            <col width="40%">
            <col width="10%">
            <col width="3%">
        </colgroup>
        <tr class="table-title text-left">
            <th>#</th>
            <th>Account Name</th>
            <th>Balance</th>
            <th colspan=2>Action</th>
        </tr>
        <?php
        //Display Results
        while ($row = mysqli_fetch_assoc($results)) {
        ?>
            <tr class="table-hover text-left">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <p>RM <?php echo number_format($row['balance']) ?></p>
                </td>
                <td><a href="editbudgetaccount.php?myIDS=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a href="deletebudgetaccount.php?myIDS=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
        <?php
        }
        mysqli_close($connection);
        ?>
    </table>

    <div style="height: 42px; width:200px; margin: 0 auto">
        <div style="display: flex; justify-content: center; align-items: center">
            <a href="addbudgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn" style="animation: openAccount 0.5s ease forwards">Add New</a>
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
    </div>

</body>
<?php include 'userfooter.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>