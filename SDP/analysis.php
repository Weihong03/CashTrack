<?php

include 'dbConn.php';
session_start();
$myID = $_GET['myID'];

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:userlogin.php');
}

?>
<?php include 'userheader.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            width: 100%;
            height: 33px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            box-sizing: border-box;
        }

        @keyframes openCalculator {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        #loancal {
            width: 345px;
            height: 420px;
            background-color: white;
            color: #fff;
            padding: 10px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: openCalculator 0.5s ease forwards;
        }

        #interestcal {
            width: 345px;
            height: 420px;
            background-color: white;
            color: #fff;
            padding: 10px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: openCalculator 0.5s ease forwards;
        }


        h1 {
            font-size: 30px;
            text-align: center;
            color: rgba(160, 32, 240, 1);
            margin-bottom: 35px;
        }

        .input {
            margin-left: 40px;
            margin-right: 40px;
        }

        .inputs {
            margin-left: 40px;
            margin-right: 40px;
        }

        p {
            color: rgb(17, 103, 170);
            font-size: 17px;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: rgb(6, 111, 139);
            margin-top: 35px;
        }
    </style>

</head>

<body>
    <br>
    <br>
    <div class="heading">
        <h3>Investment Analysis </h3>
        <p> <a href="userhome.php?myID=<?php echo $_SESSION['myID']; ?>">Home</a> / Analysis </p>
    </div>
    <div style="display: flex; justify-content: center;">
        <div id="loancal">
            <h1>Loan Calculator</h1>
            <div class="input">
                <p>Loan Amount: RM</p>
                <input id="amount" type="number" min="1" max="5000000" onchange="computeLoan()">
                <p>Interest Rate: %</p>
                <input id="interest_rate" min="0" max="100" value="1" step=".1" onchange="computeLoan()">
                <p>Months to Pay: </p>
                <input id="months" type="number" min="1" max="300" value="1" step="1" onchange="computeLoan()">
            </div>
            <h2 id="payment"></h2>
            <script src="js/loan.js"></script>
        </div>

        <div id="interestcal">
            <h1>Interest Calculator</h1>
            <div class="inputs">
                <p>Starting Amount: RM</p>
                <input id="amounts" type="number" min="1" max="5000000" onchange="computeInterest()">
                <p>Interest Rate: %</p>
                <input id="interest_rates" min="0" max="100" value="2" step=".1" onchange="computeInterest()">
                <p>Months to Invest: </p>
                <input id="month" type="number" min="1" max="300" value="2" step="1" onchange="computeInterest()">
            </div>
            <h2 id="payments"></h2>
            <h2 id="paymentss"></h2>
            <script src="js/invest.js"></script>
        </div>
    </div>

    <div>
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