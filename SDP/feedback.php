<?php

include 'dbConn.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:userhome.php');
}


if (isset($_POST['send'])) {

   $name = mysqli_real_escape_string($connection, $_POST['name']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $msg = mysqli_real_escape_string($connection, $_POST['feedback']);

   $select_message = mysqli_query($connection, "SELECT * FROM `tblfeedback` WHERE userName = '$name' AND email = '$email' AND feedback = '$msg'") or die('query failed');

   if (mysqli_num_rows($select_message) > 0) {
      $message[] = 'Feedback sent already!';
   } else {
      mysqli_query($connection, "INSERT INTO `tblfeedback`(userName, email, feedback) VALUES('$name', '$email','$msg')") or die('query failed');
      $message[] = 'Feedback sent successfully!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta userName="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feedback</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      @keyframes openFeedback {
         0% {
            transform: scale(0);
         }

         100% {
            transform: scale(1);
         }
      }
   </style>

</head>

<body>

   <?php include 'userheader.php'; ?>

   <div class="heading">
      <h3>Feedback </h3>
      <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Feedback </p>
   </div>

   <section class="contact">
      <div style=" animation: openFeedback 0.5s ease forwards;">
         <form action="" method="post">
            <h3>say something!</h3>
            <input type="text" name="name" required placeholder="Enter Your Name" class="box">
            <input type="email" name="email" required placeholder="Enter Your Email" class="box">
            <textarea name="feedback" class="box" placeholder="Enter Your Feedback" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Send message" name="send" class="btn">
         </form>
      </div>

      <div>
         <br>
         <br>
         <br>
         <br>
         <br>
      </div>
   </section>
   <?php include 'userfooter.php'; ?>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>

</html>