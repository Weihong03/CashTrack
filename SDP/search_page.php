<?php
include 'dbConn.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:userlogin.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'userheader.php'; ?>

   <div class="heading">
      <h3>Search Page</h3>
      <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Search </p>
   </div>

   <section class="search-form">
      <form action="" method="post">
         <input type="text" name="search" placeholder="Type here..." class="box">
         <input type="submit" name="submit" value="Search" class="btn">
      </form>
   </section>

   <section class="products" style="padding-top: 0;">

      <div class="box-container">
         <?php
         $navigationLinks = array(
            "Home" => "userhome.php?myID=" . $_SESSION['myID'],
            "Expense" => "expense.php?myID=" . $_SESSION['myID'],
            "Income" => "income.php?myID=" . $_SESSION['myID'],
            "Account" => "budgetaccount.php?myID=" . $_SESSION['myID'],
            "Budget" => "budget.php?myID=" . $_SESSION['myID'],
            "Analysis" => "analysis.php?myID=" . $_SESSION['myID'],
            "Reminder" => "reminder.php?myID=" . $_SESSION['myID'],
            "Report" => "report.php?myID=" . $_SESSION['myID'],
            "Calculator" => "calculator.php",
            "Feedback" => "feedback.php"
         );

         if (isset($_POST['submit'])) {
            $search_item = $_POST['search'];
            $results = array();
            foreach ($navigationLinks as $name => $link) {
               if (stripos($name, $search_item) !== false) {
                  $results[$name] = $link;
               }
            }

            if (!empty($results)) {
               foreach ($results as $name => $link) {
         ?>
                  <form action="<?php echo $link; ?>" method="post" class="box" enctype="multipart/form-data">
                     <div class="name"><?php echo $name; ?></div>
                     <input type="submit" class="btn" value="Go to Page">
                  </form>
         <?php
               }
            } else {
               echo '<p class="empty">No result found!</p>';
            }
         } else {
            echo '<p class="empty">Search something..</p>';
         }
         ?>
      </div>

   </section>


   <?php include 'userfooter.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>