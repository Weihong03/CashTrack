<?php
session_start();
include 'dbConn.php';

if (isset($_POST['btnRegister'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['username'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $query = "INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `password`, `telephone`, `address`) VALUES ('$fname',
    '$lname','$email','$password','$telephone','$address')";
    if (mysqli_query($connection, $query)) {
        echo 'Account successfully created!';
        header("Location:user_data.php");
    } else {
        echo 'Sorry, something went wrong';
    }
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_User_Date_Page</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/adduserdata.css' />";
    ?>
</head>

<body>
    <h2>Add User Data Page</h2>
    <div class="container">
        <form action="#" method="post">
            First Name: <input type="text" name="firstname"> <br>
            Last Name: <input type="text" name="lastname"> <br>
            Email: <input type="email" name="username"> <br>
            Password: <input type="password" name="password"> <br>
            Telephone: <input type="text" name="telephone"> <br>
            Address: <input type="text" name="address"> <br>
            <input type="submit" value="Register" name="btnRegister">
        </form>
    </div>
    <nav class="container1">
    <a href="user_data.php">Back</a>
    </nav>
</body>

</html>