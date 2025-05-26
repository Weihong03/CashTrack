<?php
session_start();
include 'dbConn.php';

// If file upload form is submitted 
$status = $statusMsg = '';
if (isset($_POST["btnRegister"])) {
    $expensename = $_POST['expensename'];
    $type = $_POST['type'];
    $query = "INSERT INTO `tblexpense`(`categoryName`,`type`) VALUES ('$expensename','$type')";
    if (mysqli_query($connection, $query)) {
        header("Location:expense_category_data.php");
        } else {
                echo 'Sorry, something went wrong';
            }
}
     
    
// Display status message 
echo $statusMsg;
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Expense_Category</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/edituserdatapage.css' />";
    ?>
</head>

<body>
    <h2>Add Expense Category Page</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        Expense Name: <input type="text" name="expensename"> <br>
        Type: <input type="text" name="type"> <br>
        <input type="submit" value="Register" name="btnRegister">
    </form>
    <a href="expense_category_data.php">Back</a>
</body>

</html>