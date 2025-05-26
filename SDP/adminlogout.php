<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["adminName"]);
unset($_SESSION["password"]);
header("Location: adminhome.php");
?>