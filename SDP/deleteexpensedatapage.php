<?php
include 'dbConn.php';
session_start();
$user_id = $_SESSION['user_id'];
$myIDS = $_GET['myIDS'];

// Retrieve the expense amount
$expenseAmountQuery = "SELECT amount, account FROM tblbudget WHERE id='$myIDS'";
$expenseAmountResult = mysqli_query($connection, $expenseAmountQuery);
$expenseAmountRow = mysqli_fetch_assoc($expenseAmountResult);
$expenseAmount = $expenseAmountRow['amount'];
$accountName = $expenseAmountRow['account'];

// Update the balance for the associated account
$balanceQuery = "SELECT balance FROM tblaccounts WHERE user_id = '$user_id' AND name = '$accountName'";
$balanceResult = mysqli_query($connection, $balanceQuery);
$balanceRow = mysqli_fetch_assoc($balanceResult);
$currentBalance = $balanceRow['balance'];

$updatedBalance = $currentBalance + $expenseAmount;

$updateBalanceQuery = "UPDATE tblaccounts SET balance = '$updatedBalance' WHERE user_id = '$user_id' AND name = '$accountName'";
mysqli_query($connection, $updateBalanceQuery);

$query = "DELETE FROM tblbudget WHERE id='$myIDS'";
if (mysqli_query($connection, $query)) {
    mysqli_close($connection);
    header("Location:expense.php?myID=" . $_SESSION['myID']);
} else {
    echo 'Sorry, something went wrong! Please try again later.';
    mysqli_close($connection);
}
