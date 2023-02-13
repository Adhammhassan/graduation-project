<!DOCTYPE html>
<html lang="en">

<?php session_start();
        require_once 'database/dbConnection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/add-credits.css">
    <title>Add Credits</title>
</head>
<body>

<div class="main-header">
    <p>Enter info bellow:-</p>
</div>

<form class="my-form"  method = 'POST'>

    <div class="add-credit-user">
        <label for="statioName">Add credit to user #ID: </label>
        <input id="statioName" type = 'number' name = 'userID' required min="1" max="10000" placeholder="1" >
    </div>
    <br>
    <div class="station-name-input">
        <label for="amountCredit">Amount of Credits: </label>
        <input id="amountCredit" type = 'number' name = 'credit-amount' required min="1" max="100000000" placeholder="1&dollar;" >
    </div>

    <div class="submit-button">
        <input id="submitButton" type = 'submit' name = 'submit-credit' value = 'Add Credits!'>
    </div>
</form>

</body>
</html>



<!-- <form action = "" method = 'POST'>
<center>
<br><br><br><br><br>
user ID you want to add credits to <input type = 'number' name = 'userID' required><Br><br>
Amount of Credits <input type = 'number' name = 'credit-amount' required><br><br>
        <input type = 'submit' name = 'submit-credit' value = 'Add Credits!'>
</center>
</form> -->

<?php
if(isset($_POST['submit-credit'])){
    $userID = $_POST['userID'];
    $creditAmount = $_POST['credit-amount'];

    $sqlGetUserBalance = "SELECT * FROM users WHERE id = '$userID' ";
    $result1 = mysqli_query($conn,$sqlGetUserBalance);

    if($result1){
    $row1 = mysqli_fetch_array($result1);
    }

    $newBalance = $creditAmount + $row1['user_balance'];


    $sqlAddCredits = "UPDATE users SET user_balance = '$newBalance' WHERE id = '$userID' ";
    $result2 = mysqli_query($conn, $sqlAddCredits);

    if($result2){
        echo "<script>alert('Credits Added Successfully!');</script>";
        echo "<script>window.location.href = 'admin-panel.php';</script>";
    }

}

?>