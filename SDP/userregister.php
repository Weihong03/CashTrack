<?php
session_start();
include 'dbConn.php';

if (isset($_POST['submit'])) {


   $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $pass = mysqli_real_escape_string($connection, md5($_POST['password']));
   $telephone = mysqli_real_escape_string($connection, md5($_POST['telephone']));
   $address = mysqli_real_escape_string($connection, md5($_POST['address']));



   $select_users = mysqli_query($connection, "SELECT * FROM `tbluser` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exist!';
   } else {
      mysqli_query($connection, "INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `password`, `telephone`, `address`) VALUES ('$firstname','$lastname','$email','$pass','$telephone','$address')") or die('query failed');
      $message[] = 'Registered successfully!';
      header('location:userlogin.php');
   }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>



   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <div class="form-container">

      <form action="#" method="post">
         <h3>register now</h3>
         <input type="text" name="firstname" placeholder="Enter your first name" required class="box">
         <input type="text" name="lastname" placeholder="Enter your last name" required class="box">
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="text" name="telephone" placeholder="Enter your phone number" required class="box">
         <input type="text" name="address" placeholder="Enter your address" required class="box">
         <input type="submit" name="submit" value="Register now" class="btn">
         <p>Already have an account? <a href="userlogin.php">Login now</a></p>
      </form>

   </div>

</body>

</html>