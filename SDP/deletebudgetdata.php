<?php
include 'dbConn.php';
session_start();
$user_id = $_SESSION['user_id'];
$myIDS = $_GET['myIDS'];
$query = "DELETE FROM tblsetting WHERE id='$myIDS'";
if (mysqli_query($connection, $query)) {
    mysqli_close($connection);
    header("Location:budget.php?myID=" . $_SESSION['myID']);
} else {
    echo 'Sorry, something went wrong! Please try again later.';
    mysqli_close($connection);
}
?>