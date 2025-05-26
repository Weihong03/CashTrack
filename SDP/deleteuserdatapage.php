<?php
include 'dbConn.php';
$myID = $_GET['myID'];
$query = "DELETE FROM tbluser WHERE id='$myID'";
if (mysqli_query($connection, $query)) {
    mysqli_close($connection);
    header("Location:user_data.php");
} else {
    echo 'Sorry, something went wrong! Please try again later.';
    mysqli_close($connection);
}
?>