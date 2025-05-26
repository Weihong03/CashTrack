<?php

include 'dbConn.php';

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
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
<header class="header">

   <div class="header-2">
      <div class="flex">
         <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>" class="logo">CashTrack</a>

         <nav class="navbar">
            <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a>
            <a href="expense.php?myID=<?php echo $_SESSION['myID']; ?>">Expense</a>
            <a href="income.php?myID=<?php echo $_SESSION['myID']; ?>">Income</a>
            <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>">Account</a>
            <a href="budget.php?myID=<?php echo $_SESSION['myID']; ?>">Budget</a>
            <a href="analysis.php?myID=<?php echo $_SESSION['myID']; ?>">Analysis</a>
            <a href="reminder.php?myID=<?php echo $_SESSION['myID']; ?>">Reminder</a>
            <a href="report.php?myID=<?php echo $_SESSION['myID']; ?>">Report</a>
            <a href="calculator.php">Calculator</a>
            <a href="feedback.php">Feedback</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
         </div>

         <div class="user-box">
            <p>Username : <span><?php echo $_SESSION['name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['email']; ?></span></p>
            <a href="userlogout.php" class="delete-btn">Logout</a>
         </div>
      </div>
   </div>

</header>