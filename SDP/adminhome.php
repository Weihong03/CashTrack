<?php
session_start();
include 'dbConn.php';

if (isset($_POST['btnLogin'])) {
    $email = $_POST['username'];
    $password = $_POST['pswd'];
    $query = "SELECT * FROM tbladmin WHERE email='$email' AND password='$password'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
        // echo 'Record Found!';
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['adminName'] = $row['adminName'];
        $_SESSION['password'] = $row['password'];

        header("Location:adminhome.php"); 
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
    <title>Admin_Home</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/adminhome.css' />";
    ?>
</head>

<body>
    <?php
    if (!empty($_SESSION['id'])) {
    ?>
        <br>
        <h2 id="t1">Welcome back to Admin Page of Cashtrack, <?php echo  $_SESSION['adminName']; ?>!</h2>
        <br>
        <br>
        <nav class="container">
            <a href="user_data.php" id="t2">View User Data</a>
            <a href="feedback_data.php" id="t2">View User Feedback</a>
            <a href="expense_category_data.php" id="t2">View Expenses Category</a>
            <a href="creditscore_data.php" id="t2">View Top Credit Score list</a>
            <a href="adminlogout.php" id="t2">Logout</a>
        </nav>
        <br>
        <hr>
    <?php
    } else {
        echo '<h2 id="t1"> Authorized Access Only!! </h2>';
    ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Button to open the modal login form -->
        <button onclick="document.getElementById('id01').style.display='block'" id="t3">
            Login
        </button>
        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!-- Modal Content -->
            <form class="modal-content animate" action="#" method="post">
                <div class="title">
                    <h1 style="text-align: center">Admin Login Page</h1>
                </div>

                <div class="container">
                    <label for="username"><b>Username:</b></label>
                    <input type="email" name="username" required />

                    <label for="pswd"><b>Password:</b></label>
                    <input type="password" name="pswd" required />
                    <input type="submit" value="Login" name="btnLogin" id="t3">
                </div>
                <br>

                <div class="container" style="background-color: #f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" id="t3">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("id01");

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        </script>
        <p id="t3">Click here if you are <a href="userlogin.php">User</a></p>
        <br>
        <hr>
    <?php
    }
    ?>
</body>

</html>