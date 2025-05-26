<?php

include 'dbConn.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:userhome.php');
}

// Retrieve user details from tbluser
$myID = $_SESSION['myID'];
$query_user = "SELECT * FROM tbluser WHERE id = '$myID'";
$result_user = mysqli_query($connection, $query_user);
$user_data = mysqli_fetch_assoc($result_user);

// Retrieve account details from tblaccounts
$query_accounts = "SELECT * FROM tblaccounts WHERE user_id = '$user_id'";
$result_accounts = mysqli_query($connection, $query_accounts);

// Retrieve budget details from tblbudget
$query_budget = "SELECT * FROM tblbudget WHERE user_id = '$user_id'";
$result_budget = mysqli_query($connection, $query_budget);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta userName="viewport" content="width=device-width, initial-scale=1.0">
   <title>Report</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      @keyframes openAccount {
         0% {
            transform: scale(0);
         }

         100% {
            transform: scale(1);
         }
      }

      .report-container {
         width: fit-content;
         min-width: 21cm;
         height: fit-content;
         min-height: 29.7cm;
         margin: 0 auto;
         border: 1px solid black;
      }

      @media print {
         @page {
            size: A4 portrait;
            margin: 0;
         }
      }

      .user-details {
         margin-bottom: 20px;
      }

      .user-details .user-info {
         display: flex;
      }

      .user-details .user-info .user-info-left {
         flex: 1;
      }

      .user-details .user-info .user-info-right {
         flex: 1;
         text-align: left;
      }

      .user-details h2 {
         margin-bottom: 5px;
      }

      .user-details p {
         margin-bottom: 2px;
      }

      .account-details {
         margin-bottom: 20px;
      }

      .account-details table {
         width: fit-content;
         border-collapse: collapse;
         margin-top: 10px;
         border: 1px solid #ddd;
      }

      .account-details th,
      .account-details td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         border: 1px solid #ddd;
      }

      .budget-details {
         margin-bottom: 20px;
      }

      .budget-details table {
         width: fit-content;
         border-collapse: collapse;
         margin-top: 10px;
         border: 1px solid #ddd;
      }

      .budget-details th,
      .budget-details td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         border: 1px solid #ddd;
      }
   </style>

</head>

<body>

   <?php include 'userheader.php'; ?>

   <div class="heading">
      <h3>Report </h3>
      <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Report </p>
   </div>

   <section style="font-size: 24px; animation: openAccount 0.5s ease forwards">
      <div class="report-container" style="border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px;">
         <img src="style/CashTrack Logo.png" alt="Company Logo" style="max-width: 100%;">

         <p> <i class="fas fa-phone"></i> +017-5822-766 </p>
         <p> <i class="fas fa-envelope"></i> CashTrack123@gmail.com </p>
         <p> <i class="fas fa-map-marker-alt"></i> Kuala Lumpur - 11900</p>

         <div style="border-bottom: 5px solid #ddd; margin-top:20px;margin-bottom: 20px;"></div>

         <div class="user-details">
            <h2>User Details</h2>
            <div class="user-info">
               <div class="user-info-left">
                  <p><strong>Name:</strong> <?php echo $user_data['firstname'] . ' ' . $user_data['lastname']; ?></p>
                  <p><strong>Email:</strong> <?php echo $user_data['email']; ?></p>
                  <p><strong>Telephone:</strong> <?php echo $user_data['telephone']; ?></p>
               </div>
               <div class="user-info-right">
                  <p><strong>Address:</strong> <?php echo $user_data['address']; ?></p>
                  <p><strong>Credit Score:</strong> <?php echo $user_data['creditscore']; ?></p>
               </div>
            </div>
         </div>

         <div class="account-details">
            <h2>Account Details</h2>
            <table>
               <thead>
                  <tr>
                     <th>Account Name</th>
                     <th>Balance</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while ($row_accounts = mysqli_fetch_assoc($result_accounts)) { ?>
                     <tr>
                        <td><?php echo $row_accounts['name']; ?></td>
                        <td><?php echo $row_accounts['balance']; ?></td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>

         <div class="budget-details">
            <h2>Budget Details</h2>
            <table>
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Amount</th>
                     <th>Account</th>
                     <th>Expense Category</th>
                     <th>Category</th>
                     <th>Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while ($row_budget = mysqli_fetch_assoc($result_budget)) { ?>
                     <tr>
                        <td><?php echo $row_budget['title']; ?></td>
                        <td><?php echo $row_budget['amount']; ?></td>
                        <td><?php echo $row_budget['account']; ?></td>
                        <td><?php echo $row_budget['expenseCategory']; ?></td>
                        <td><?php echo $row_budget['category']; ?></td>
                        <td><?php echo $row_budget['date']; ?></td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>

   <div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
   </div>
</body>

<?php include 'userfooter.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>