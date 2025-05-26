<?php

include 'dbConn.php';
session_start();

if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $query = "SELECT * FROM tbluser WHERE email='$email' AND password='$pass'";
   $results = mysqli_query($connection, $query);
   $message = mysqli_fetch_assoc($results);
   $count = mysqli_num_rows($results);
   if ($count == 1) {
      // echo 'Record Found!';
      $_SESSION['user_id'] = $message['id'];
      $_SESSION['name'] = $message['firstname'];
      $_SESSION['email'] = $message['email'];
      $_SESSION['password'] = $message['password'];
      $_SESSION['myID'] = $message['id'];
      $myID = $_SESSION['myID'];
      header("Location: userhome.php?myID=" . urlencode($myID));
   } else {
      echo 'Record not found! Please try again later.';
   }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

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

      <form action="" method="post">
         <h3>Login now</h3>
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="submit" name="submit" value="login now" class="btn">
         <p>Don't have an account? <a href="userregister.php">Register now</a></p>
         <p>Click here if you are <a href="adminhome.php">Admin</a></p>
      </form>

   </div>

</body>

</html>