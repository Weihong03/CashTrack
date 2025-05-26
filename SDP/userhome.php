<?php

include 'dbConn.php';

session_start();
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
   header('location:userlogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/piechart.css">

   <style>
      @keyframes openAccount {
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
   <?php
   if (!empty($_SESSION['user_id'])) {
   ?>
      <?php include 'userheader.php'; ?>

      <section class="home">

         <div class="content">
            <h3>CashTrack</h3>
            <p>
               Your Personal Expense Tracking and Budgeting Companion</p>
         </div>
      </section>

      <section style="font-size: 24px; animation: openAccount 0.5s ease forwards">
         <div style="display: flex; justify-content: space-between;">
            <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px;">
               <h4>Current Balance in each Accounts</h4>
               <hr>
               <br>
               <?php
               $i = 1;
               $categories = $connection->query("SELECT * FROM `tblaccounts` WHERE user_id = $myID order by `balance` desc ");
               while ($row = $categories->fetch_assoc()) :
               ?>
                  <div class="payments">
                     <div class="payment">
                        <div class="card green">
                           <span>Account #<?php echo $i++; ?></span>
                           <span>
                              <?php echo $row['name'] ?>
                           </span>
                        </div>
                        <div class="payment-details">
                           <h3>Balance</h3>
                           <div>
                              RM <?php echo ($row['balance']) ?>
                              <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn" style="display: flex; justify-content: center; align-items: center; height: 3vh; width:8vh">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endwhile; ?>
            </div>

            <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; display: flex; justify-content: center; align-items: center">
               <?php
               $accountBalance = 0; // Variable to store the total account balance
               $categories = $connection->query("SELECT * FROM `tblaccounts` WHERE user_id = $myID");
               while ($row = $categories->fetch_assoc()) {
                  $accountBalance += $row['balance']; // Add each account balance to the total
               }
               ?>
               <div>
                  <h3 style="display: flex; justify-content: center; align-items: center">Welcome back to CashTrack, <?php echo $_SESSION['name']?></h3>
                  <br>
                  <h5 style="display: flex; justify-content: center; align-items: center">Total Account Balance: RM <?php echo $accountBalance; ?></h5>
                  <br>
                  <?php
                  $categories->data_seek(0); // Reset the query result pointer to the beginning
                  while ($row = $categories->fetch_assoc()) {
                     $percentage = ($row['balance'] / $accountBalance) * 100;
                     $formattedPercentage = number_format($percentage, 2);
                     echo '
                     <div style=" display: inline-block; text-align: center; margin: 10px;">
                     <div class="pie animate" style="--p:' . $formattedPercentage . '%;--c: rgba(0,225,0,1)">' . $formattedPercentage . '%</div>';
                     echo '<h5>' . $row['name'] . '</h5>';
                     echo '</div>';
                  }
                  ?>
               </div>
            </div>

            <?php
            function getColorBasedOnCreditScore($creditScore)
            {
               if ($creditScore < 20) {
                  return 'rgba(225,0,0,1)'; // Red color for low credit scores
               } elseif ($creditScore >= 20 && $creditScore < 50) {
                  return 'rgba(225,225,0,1)'; // Yellow color for moderate credit scores
               } else {
                  return 'rgba(0,225,0,1)'; // Green color for high credit scores
               }
            }
            ?>

            <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; display: flex; justify-content: center; align-items: center">
               <?php
               $credit = $connection->query("SELECT * FROM `tbluser` WHERE id = $myID");
               while ($rows = $credit->fetch_assoc()) :
               ?>
                  <div style="text-align: center;">
                     <h5><b style="font-size: 24px;"><?php echo $rows['firstname'] ?>'s Credit Score</b></h5>
                     <?php
                     $creditScore = $rows['creditscore'];
                     $color = getColorBasedOnCreditScore($creditScore); // Function to determine the color based on credit score
                     echo '<div class="pie animate" style="--p:' . $creditScore . ';--c:' . $color . '">' . $creditScore . '</div>';
                     ?>
                     <br>
                     <a href="addexpensedata.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Record Expense</a>
                     <a href="addincomedata.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn">Record Income</a>
                  </div>

               <?php endwhile; ?>
            </div>

      </section>

      <section class="home-contact">

         <div class="content">
            <h3>Have any questions?</h3>
            <p>As ever, if you have any questions about the Cashtrack App, please email CashTrack123@gmail.com, or feel free to leave a comment below.</p>
            <a href="feedback.php" class="white-btn">Feedback</a>
         </div>

      </section>

      <?php include 'userfooter.php'; ?>

      <!-- custom js file link  -->
      <script src="js/script.js"></script>

   <?php
   } else {
      header('location:userlogin.php');
   }

   ?>
</body>

</html>