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
    <title>User_Data</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/user_data.css' />";
    ?>
</head>

<body>
    <h2 id="t1">User Data Page</h2>
    <form action="#" method="get" id="t2">
        Enter First Name or ID: <input type="text" name="info">
        <input type="submit" value="Search" name="btnSearch">
    </form>
    <br>
    <nav class="container">
        <a href="adduserdata.php">Add Data</a> 
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
        <table border=1 class="table-fill">
            <tr class="table-title text-left">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Telephone</th>
                <th>Address</th>
                <th colspan=2>Action</th>
            </tr>
            <a href="user_data.php">Back</a>
            <?php
            //Display Results
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><a href="edituserdatapage.php?myID=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="deleteuserdatapage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
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
                <th>Email</th>
                <th>Password</th>
                <th>Telephone</th>
                <th>Address</th>
                <th colspan=2>Action</th>
            </tr>
            <?php
            //Display Results
            while ($row = mysqli_fetch_assoc($results)) {
            ?>
                <tr class="table-hover text-left">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><a href="edituserdatapage.php?myID=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="deleteuserdatapage.php?myID=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
        <?php
            }
            mysqli_close($connection);
        }
        ?>

        </table>
</body>

</html>