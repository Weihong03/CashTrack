<?php
session_start();
include 'dbConn.php';
$myID = $_GET['myID'];

if (isset($_POST['btnUpdate'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $updateQuery = "UPDATE tbluser SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`password`='$password',`telephone`='$telephone',`address`='$address' WHERE id= '$myID'";

    if (mysqli_query($connection, $updateQuery)) {
        // echo 'Record updated successfully.';
        header("Location:user_data.php");
    } else {
        echo 'Sorry, something went wrong! Please try again later.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_User_Data</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/edituserdatapage.css' />";
    ?>
</head>

<body>
    <h2>Update User Information</h2>
    <?php
    $query = "SELECT * FROM tbluser WHERE id = '$myID'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
    ?>
        <div class="container">
        <form action="#" method="post">
            First name:
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"> <br>
            Last name:
            <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"> <br>
            Email:
            <input type="text" name="email" value="<?php echo $row['email']; ?>"> <br>
            Password:
            <input type="password" name="password" value="<?php echo $row['password']; ?>"> <br>
            Telephone:
            <input type="text" name="telephone" value="<?php echo $row['telephone']; ?>"> <br>
            Address:
            <input type="text" name="address" value="<?php echo $row['address']; ?>"> <br>
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
    <a href="user_data.php">Back</a>
    <a href="adminhome.php">Home</a>
    </nav>
    
</body>

</html>