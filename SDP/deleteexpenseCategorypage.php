<?php
include 'dbConn.php';
$myID = $_GET['myID'];
$query = "DELETE FROM tblexpense WHERE id='$myID'";
if (mysqli_query($connection, $query)) {
    mysqli_close($connection);
    header("Location:expense_category_data.php");
} else {
    echo 'Sorry, something went wrong! Please try again later.';
    mysqli_close($connection);
}
?>