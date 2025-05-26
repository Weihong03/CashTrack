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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Setting</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/piechart.css">

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
        <h3>Budget Setting</h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Budget Setting </p>
    </div>
    <table border="1" class="table-fill" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; animation: openAccount 0.5s ease forwards">
        <thead>
            <tr class="table-title text-left">
                <th>#</th>
                <th>Category</th>
                <th>Amount</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $query = "SELECT * FROM `tblsetting` WHERE tblsetting.user_id = '$myID' ORDER BY tblsetting.amount DESC";
            $results = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>RM <?php echo $row['amount']; ?></td>
                    <td><a href="editbudgetdata.php?myIDS=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="deletebudgetdata.php?myIDS=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <div style="height: 42px; width:200px; margin: 0 auto">
        <div style="display: flex; justify-content: center; align-items: center">
            <a href="addbudgetdata.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn" style="animation: openAccount 0.5s ease forwards">Add New</a>
        </div>
    </div>

    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <?php
    function getColorBasedOnCreditScore($formattedPercentage)
    {
        if ($formattedPercentage < 30) {
            return 'rgba(225,0,0,1)'; // Red color for low credit scores
        } elseif ($formattedPercentage >= 30 && $formattedPercentage < 70) {
            return 'rgba(225,225,0,1)'; // Yellow color for moderate credit scores
        } else {
            return 'rgba(0,225,0,1)'; // Green color for high credit scores
        }
    }
    ?>
    <div style="display: flex; justify-content: center;">
        <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; display: flex; justify-content: center; align-items: center; animation: openAccount 0.5s ease forwards">
            <div>
                <h1 style="display: flex; justify-content: center; align-items: center">Remaining Budget in each Category</h1>
                <br>
                <?php
                $categories = $connection->query("SELECT * FROM `tblsetting` WHERE user_id = $myID");
                while ($rows = $categories->fetch_assoc()) {
                    $categoryName = $rows['category'];
                    $categoryBudget = $rows['amount'];
                    $spentAmountQuery = "SELECT SUM(amount) AS totalSpent FROM `tblbudget` WHERE user_id = '$myID' AND expenseCategory = '$categoryName'";
                    $spentAmountResult = mysqli_query($connection, $spentAmountQuery);
                    $spentAmountRow = mysqli_fetch_assoc($spentAmountResult);
                    $spentAmount = $spentAmountRow['totalSpent'];
                    $remainingBudget = $categoryBudget - $spentAmount;
                    $percentage = ($remainingBudget / $categoryBudget) * 100;
                    $formattedPercentage = number_format($percentage, 2);
                    $color = getColorBasedOnCreditScore($formattedPercentage);
                    echo '
                 <div style=" display: inline-block; text-align: center; margin: 10px;">
                 <div class="pie animate" style="--p:' . $formattedPercentage . ';--c:' . $color . '">' . $formattedPercentage . '%</div>';
                    echo '<h1>' . $categoryName . '</h1>';
                    echo '<h2>RM ' . $remainingBudget . '</h2>';
                    echo '</div>';
                }
                mysqli_close($connection);
                ?>
            </div>
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
    </div>
    <?php include 'userfooter.php'; ?>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>


</html>