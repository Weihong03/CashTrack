<?php
include 'dbConn.php';
//Step 2- Retrieve Database(Create Query)
$query = "SELECT * FROM tblfeedback";
//Execute Query
$results = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback_Data</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/feedback_data.css' />";
    ?>
</head>

<body>
    <h2 id="t1">Feedback Data Page</h2>
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
        $query = "SELECT * FROM tblfeedback WHERE userName LIKE '%$info%' OR ID = '$info' ";
        //Execute Query
        $results = mysqli_query($connection, $query);
    ?>
        <a href="feedback_data.php">Back</a>
        <?php
        //Display Results
        while ($row = mysqli_fetch_assoc($results)) {
        ?>
            <table border=1>
                <tr class="table-title text-left">
                    <th>ID</th>
                    <td><?php echo $row['id']; ?></td>
                    <td rowspan="4"><a href="deletefeedbackdatapage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td><?php echo $row['userName']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <th>Feedback</th>
                    <td><?php echo $row['feedback']; ?></td> <br>
                </tr>
            <?php
        }
    } else {
            ?>
            </table>
            <table border=1>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Action</th>
                </tr>
                <?php
                //Display Results
                while ($row = mysqli_fetch_assoc($results)) {
                ?>
                    <tr class="table-title text-left">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['feedback']; ?></td>
                        <td><a href="deletefeedbackdatapage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
            <?php
                }
                mysqli_close($connection);
            }
            ?>

            </table>
</body>

</html>