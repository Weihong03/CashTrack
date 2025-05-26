<?php
//Step 1- Database Connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sdp2107';
$connection = mysqli_connect($host, $user, $password, $database);

if($connection === false){
    die('Connection failed' . mysqli_connect_error());
} 
// else{
//     echo 'Connection established successfully! <br>';
// }
// ?>