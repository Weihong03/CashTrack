<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>Quick links</h3>
         <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a>
         <a href="expense.php?myID=<?php echo $_SESSION['myID']; ?>">Expense</a>
         <a href="income.php?myID=<?php echo $_SESSION['myID']; ?>">Income</a>
         <a href="budgetaccount.php?myID=<?php echo $_SESSION['myID']; ?>">Account</a>
         <a href="budget.php?myID=<?php echo $_SESSION['myID']; ?>">Budget</a>
      </div>

      <div class="box">
         <h3>Extra links</h3>
         <a href="analysis.php?myID=<?php echo $_SESSION['myID']; ?>">Analysis</a>
         <a href="reminder.php?myID=<?php echo $_SESSION['myID']; ?>">Reminder</a>
         <a href="report.php?myID=<?php echo $_SESSION['myID']; ?>">Report</a>
         <a href="calculator.php">Calculator</a>
         <a href="feedback.php">Feedback</a>
      </div>

      <div class="box">
         <h3>Feedback Info</h3>
         <p> <i class="fas fa-phone"></i> +017-5822-766 </p>
         <p> <i class="fas fa-envelope"></i> CashTrack123@gmail.com </p>
         <p> <i class="fas fa-map-marker-alt"></i> Kuala Lumpur - 11900</p>
      </div>


   </div>



</section>