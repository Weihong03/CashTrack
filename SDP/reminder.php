<?php

include 'dbConn.php';

session_start();
$myID = $_GET['myID'];
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userhome.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta userName="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder</title>

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
    </style>

</head>

<body>

    <?php include 'userheader.php'; ?>

    <div class="heading">
        <h3>Reminder </h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Reminder </p>
    </div>

    <section style="font-size: 24px; animation: openAccount 0.5s ease forwards">
        <div style="display: flex; justify-content: left; align-items: left">
            <a href="addreminder.php?myID=<?php echo $_SESSION['myID']; ?>" class="white-btn" style="animation: openAccount 0.5s ease forwards">Add New</a>
        </div>
        <?php
        $i = 1;
        $categories = $connection->query("SELECT * FROM `tblreminder` WHERE user_id = $myID order by `date` asc ");
        ?>
        <div class="payments" style="display: flex;justify-content:flex-start;flex-direction:row">
            <div class="reminder-container" style="display: flex; flex-wrap: wrap">
                <?php while ($row = $categories->fetch_assoc()) : ?>
                    <div class="payment" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);padding: 20px; width:590px; height:300px; margin-right: 20px; margin-bottom: 20px;">
                        <div class="card green" style="width: 350px; padding:20px; white-space:normal">
                            <span>Reminder #<?php echo $i++; ?></span>
                            <span style="display: block; word-wrap: break-word; overflow-wrap:break-word">
                                <?php echo $row['detail'] ?>
                            </span>
                        </div>

                        <div class="payment-details">
                            <h3>Reminder Date</h3>
                            <div>
                                <?php echo ($row['date']) ?>
                                <a href="editreminder.php?myIDS=<?php echo $row['id']; ?>" class="white-btn" style="display: flex; justify-content: center; align-items: center; height: 3vh; width:8vh">Update</a>
                                <a href="deletereminder.php?myIDS=<?php echo $row['id']; ?>" class="white-btn" style="display: flex; justify-content: center; align-items: center; height: 3vh; width:8vh">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
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
        <br>
        <br>
    </div>
    <?php include 'userfooter.php'; ?>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>