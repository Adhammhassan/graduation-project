
<?php
session_start();
require_once 'database/dbConnection.php';
include 'navbar.php';
$userLoggedID = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/purchase.css" />
		<title>Form</title>
	</head>
	<body class="purchace-ticket-body">

    <form action="" method = 'POST'>
    <h2>Purchase <span>Credits</span></h2>
    <div class="name-on-card">
        <label for="nameOnCard">Name on card: </label>
        <br>
        <input id="nameOnCard" required type = 'text' placeholder = 'ex: Johnny Richard'>
    </div>
    
    <div class="credit-card-number">
        <label for="cardNumber">Credit Card Number: </label>
        <br>
         <input id="cardNumber" required type = 'text' placeholder = 'ex: 1111 2222 3333 4444'>
    </div>
    <div class="expiry-date">
        <label for="expiryDate">Card expiry Date: </label>
        <br>
        <input id="expiryDate" required type = 'text' placeholder = 'ex: 26/06'>
    </div>
    <div class="cvv-number">
        <label for="cvvNumber">CVV: </label>
        <br>
        <input id="cvvNumber" required type = 'number' placeholder = 'ex: 111'>
    </div>

    <div class="amount-if-credits">
        <label for="amountCredits">Amount Of Credits: </label>
        <br>
        <input id="amountCredits" required type = 'number' name = 'amount' placeholder = 'ex: 10'>
    </div>

    <div class="button-to-submit">
    <input id="buttonToSubmit" type = 'submit' name = 'recharge-submit' value = 'Recharge'>
    </div>
    </form>

	</body>
</html>




<?php

if(isset($_POST['recharge-submit'])){

    $balanceAmount = $_POST['amount'];
    //To get current balance
    $getCurrentBalanceSQL = "SELECT * FROM users WHERE id = '$userLoggedID' ";
    $result = mysqli_query($conn,$getCurrentBalanceSQL);
    $row = mysqli_fetch_array($result);
    // Add existing balance to new recharged balance
    $newBalance = $balanceAmount + $row['user_balance'];

    //Insert new balance into database
    $insertNewBalanceSQL = "UPDATE users SET user_balance = '$newBalance'  WHERE id = '$userLoggedID' ";
    $result2 = mysqli_query($conn, $insertNewBalanceSQL);
    
    if($result2){
        echo "<script>alert('Balance recharged successfully!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }



}

?>
 <?php include 'footer.php';?>