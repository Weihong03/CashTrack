<?php
include 'dbConn.php';
//Step 2- Retrieve Database(Create Query)
$query = "SELECT * FROM tbluser";
//Execute Query
$results = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top_Credit_Score_Data</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/feedback_data.css' />";
    ?>
</head>

<body>
    <h2 id="t1">Top Credit Score Data Page</h2>
    <form action="#" method="get" id="t2">
        Enter User Name or ID: <input type="text" name="info">
        <input type="submit" value="Search" name="btnSearch">
    </form>
    <br>
    <nav class="container">
        <a href="adminhome.php">Home</a>
        <a href="adminlogout.php">Logout</a>
    </nav>
    <hr>
    <?php
    if (isset($_GET['btnSearch'])) {
        $info = $_GET['info'];
        //Step 2- Retrieve Database(Create Query)
        $query = "SELECT * FROM tbluser WHERE firstname LIKE '%$info%' OR ID = '$info' ";
        //Execute Query
        $results = mysqli_query($connection, $query);
    ?>
        <a href="creditscore_data.php">Back</a>
        <?php
        //Display Results
        while ($row = mysqli_fetch_assoc($results)) {
        ?>
            <table border=1 class="table-fill">
                <tr class="table-title text-left">
                    <th>ID</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr class="table-title text-left">
                    <th>User Name</th>
                    <td><?php echo $row['firstname']; ?></td>
                </tr>
                <tr class="table-title text-left">
                    <th>Credit Score</th>
                    <td><?php echo $row['creditscore']; ?></td> <br>
                </tr>
            <?php
        }
    } else {
            ?>
            </table>
            <table border=1 class="table-fill">
                <tr class="table-title text-left">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Credit Score</th>
                </tr>
                <?php
                //Display Results
                while ($row = mysqli_fetch_assoc($results)) {
                ?>
                    <tr class="table-title text-left">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['creditscore']; ?></td>
                    </tr>
            <?php
                }
                mysqli_close($connection);
            }
            ?>

            </table>
</body>

</html>