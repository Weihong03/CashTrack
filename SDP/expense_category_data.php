<?php
include 'dbConn.php';
//Step 2- Retrieve Database(Create Query)
$query = "SELECT * FROM tblexpense";
//Execute Query
$results = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense_Data</title>
    <style>
        td img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: max-content;
            width: max-content;
            max-height: 200px;
            max-width: 200px;
        }
    </style>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/expense_data.css' />";
    ?>
</head>

<body>
    <h2 id="t1">Expense Category Page</h2>
    <form action="#" method="get" id="t2">
        Enter Expense Name or ID: <input type="text" name="info">
        <input type="submit" value="Search" name="btnSearch">
    </form>
    <br>
    <nav class="container1">
        <a href="addexpensecategorydata.php">Add Data</a> |
        <a href="adminhome.php">Home</a> |
        <a href="adminlogout.php">Logout</a>
    </nav>

    <hr>
    <?php
    if (isset($_GET['btnSearch'])) {
        $info = $_GET['info'];
        //Step 2- Retrieve Database(Create Query)
        $query = "SELECT * FROM tblexpense WHERE categoryName LIKE '%$info%' OR id = '$info' ";
        //Execute Query
        $results = mysqli_query($connection, $query);
    ?>
        <table border=1 class="table-fill">
            <tr class="table=title text-left">
                <th>ID</th>
                <th>Expense Name</th>
                <th>Type</th>
                <th colspan=2>Action</th>
            </tr>
            <a href="expense_category_data.php">Back</a>
            <?php
            //Display Results
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['categoryName']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><a href="editexpenseCategorypage.php?myID=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="deleteexpenseCategorypage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
        } else {
            ?>
        </table>
        <table border=1 class="table-fill">
            <tr class="table=title text-left">
                <th>ID</th>
                <th>Expense Name</th>
                <th>Type</th>
                <th colspan=2>Action</th>
            </tr>
            <?php
            //Display Results
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['categoryName']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><a href="editexpenseCategorypage.php?myID=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="deleteexpenseCategorypage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
        <?php
            }
            mysqli_close($connection);
        }
        ?>

        </table>
</body>

</html>