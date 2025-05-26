<?php
session_start();
include 'dbConn.php';
$myID = $_GET['myID'];


if (isset($_POST["btnUpdate"])) {
    $expensename = $_POST['expensename'];
    $type = $_POST['type'];
    $updateQuery = "UPDATE tblexpense SET categoryName='$expensename', type ='$type' WHERE id = $myID";
    if (mysqli_query($connection, $updateQuery)) {
        echo 'Account successfully created!';
        header("Location:expense_category_data.php");
    } else {
        echo 'Sorry, something went wrong';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Expense_Category</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/editexpensedatapage.css' />";
    ?>
</head>

<body>
    <h2>Update Expense Information</h2>
    <?php
    $query = "SELECT * FROM tblexpense WHERE id = '$myID'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
    ?>
        <div class="container">
            <form action="#" method="post">
                Expense Name:
                <input type="text" name="expensename" value="<?php echo $row['categoryName']; ?>"> <br>
                <input type="text" name="type" value="<?php echo $row['type']; ?>"> <br>
                <input type="submit" value="Update Profile" name="btnUpdate">
            </form>
        </div>
    <?php
    } else {
        echo 'Record not found! Please try again later.';
    }
    ?>
    <hr>
    <nav class="container1">
        <a href="expense_category_data.php">Back</a>
        <a href="adminhome.php">Home</a>
    </nav>

</body>

</html>