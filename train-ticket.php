<?php

session_start();
include 'navbar.php';
$loggedUserId = $_SESSION['user_id'];
require_once 'database/dbConnection.php';
$sqlLine = "SELECT * FROM users WHERE id = '".$loggedUserId."'  ";
$result2 = mysqli_query($conn, $sqlLine);
$row2 = mysqli_fetch_array($result2);

if($row2['hasTicket'] == 1):

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train tickets</title>
    <link rel="stylesheet" href="CSS/train-ticket-stylesheet.css">

<script>
    function hideShowReturnTime(val) {
    if (val == "Two way trip") {
        document.getElementById("returningDateJS").style.visibility = "visible";
    } else {
        document.getElementById("returningDateJS").style.visibility = "hidden";
    }
}
</script>
</head>
<h1 class="main-header" ><?php echo $_SESSION['username'];?> Tickets</h1>
<?php

$loggedUserID = $_SESSION['user_id'];
$sql = "SELECT * FROM tickets WHERE by_user_id = '".$loggedUserID."' ";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result))
{


?>
    
<body onload="hideShowReturnTime('<?php echo $row['trip_type'];?>')">

    <div class="main-header">
    
    </div>


    <div class="header1">
        <h1>TRAIN TICKET</h1>
    </div>
    <div class="whole-ticket">
        <div class="left-ticket-part">
            <div class="passenger-name">
                <label for="name">NAME OF PASSENGER:</label>
    
                <input type="text" id="name" value='<?php echo $_SESSION['username'];?>' name="name" maxlength="20" minlength="2" disabled>
            </div>

            <div class="no-of-tickets">
                <label for="noOfTickets">NUMBER OF PASSENGERS &numero;: </label>
                <input id="noOfTickets" name="ticketCount" type="number" max="30" min="1" value="<?php echo $row['ticketCount'];?>">
            </div>


            <div class="train-date">
                <label for="date">DEPRAT DATE:</label>
    
                <input type="date" id="date" value = '<?php echo $row['date'];?>' name="date" maxlength="20" minlength="2" disabled>
            </div>

            <div class="train-date-return" id="returningDateJS">
                <label for="date">RETURNING DATE:</label>
    
                <input type="date" id="date" value ='<?php echo $row['return_date'];?>' name="date" maxlength="20" minlength="2" disabled>
            </div>

        </div>

        <div class="right-ticket-part">

            <!-- <div class="train-name">
                <label for="t-name">TRAIN:</label>
    
                <input type="text" id="train-name" name="train-name" maxlength="20" minlength="2" value="Dummy train" disabled>
            </div> -->

            <!-- <div class="platform-number">
                <label for="platfrom">PLATFROM:</label>
    
                <input type="text" id="platfrom" name="platfrom" maxlength="20" minlength="2" value="Dummy platfrom" disabled>
            </div> -->

            <!-- <div class="carriage-number">
                <label for="carriage">CARRIAGE &numero;:</label>
    
                <input type="number" id="carriage" name="carriage-number" maxlength="20" minlength="2" value="101213" disabled>
            </div> -->


            <div class="from">
                <label for="from">FROM:</label>
    
                <input type="text" id="from" value='<?php echo $row['source'];?>' name="from" maxlength="20" minlength="2" disabled>
            </div>

            <div class="to">
                <label for="to">TO:</label>
    
                <input type="text" id="to" value='<?php echo $row['destination'];?>' name="to" maxlength="20" minlength="2" disabled>
            </div>

            <div class="one-way-two-way">
                <label for="oneWayTwoWay">TRIP TYPE:</label>
    
                <input type="text" id="oneWayTwoWay" value="<?php echo $row['trip_type'];?>" name="trip_type" maxlength="20" minlength="2" disabled>
            </div>
            
            <div class="filler-div">
    
                <input type="text" disabled>
            </div>

        </div>

        <div class="middle-ticket-part">
            <div class="depart-time">
                <label for="depart">DEPART TIME:</label>
    
                <input type="time" id="depart" value = '<?php echo $row['time'];?>'name="depart" maxlength="20" minlength="2" disabled>
            </div>

            <div class="class-degree">
                <label for="class">CLASS:</label>
    
                <input type="text" id="class" value='<?php echo $row['trip_class'];?>' name="class" maxlength="20" minlength="2" disabled>
            </div>
            
        </div>
        
    </div>
    <div class="footer"></div>
<?php
}
?>
</body>

<?php   


else: echo "<p><br><br><br><br><center>You have no tickets!</p><br><br><br>";
    echo "<a href = 'book-a-ticket.php'> Press here to book a ticket now!</a></center>";
        endif;   
      ?>
</html>