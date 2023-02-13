<?php  require 'database/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a ticket form</title>
    <link rel="stylesheet" href="css/book-ticket-stylesheet.css">

    <script>  
 

    function validateform(){  
    var date=document.bookticket.date.value;  
    var time=document.bookticket.time.value;  
    var way=document.bookticket.way.value;  
    var cariage=document.bookticket.cariage.value;  
    var ticketCount=document.bookticket.ticketCount.value;  
    var sourceStation=document.bookticket.sourceStation.value;  
    var destinationStation=document.bookticket.destinationStation.value;  

    const currentDate = new Date();
    let day = currentDate.getDate();
    let month = currentDate.getMonth() + 1;
    let year = currentDate.getFullYear();
    let year1 = currentDate.getFullYear()+3;

    let currentDateWithFormat = `${year}-0${month}-${day}`;
    let currentDateWithFormat2 = `${year1}-0${month}-${day}`;


    if(sourceStation==destinationStation){  
        alert("Source and Destination staion can't be the same.");  
    return false;  
    }    
    else if (date==null || date==""){  
        alert("Date can't be blank.");  
    return false;  
    }
    else if(date <= currentDateWithFormat){
        alert("Date can't be in the past.");  
    return false;  
    }
    else if(date >= currentDateWithFormat2){
        alert("Date have to be earlier than that!");  
    return false;  
    }
    else if(time==null || time==""){  
        alert("Time can't be blank.");  
    return false;  
    }  
    else if(way==null || way==""){  
        alert("Choose wether The trip is one way or two way.");  
    return false;  

    }  
    else if(cariage==null || cariage==""){  
        alert("Choose a Class cariage option.");  
    return false;  
    }  
    else if(ticketCount<=0 || ticketCount>30){  
        alert("Choose sufficient number of tickets.");  
    return false;  
    }  
}

function hideShowReturnTime(val) {
  if (val == "twoWay") {
    document.getElementById("returnDateJS").style.display = "inline-block";
  } else {
    document.getElementById("returnDateJS").style.display = "none";
  }
}
</script>  

<script>

function dynamicTotal(){
    let numberOfPassengers = document.getElementById("noTickets");
    
    let price = document.getElementById("ticketPrice");
    price.value = 10 * numberOfPassengers.value;
}






</script>


</head>
<?php session_start();
    include 'navbar.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<body>
    <div class="heading">
        <h1><b>Book your ticket here!</b></h1>
    </div>

    <form name="bookticket" action = "" method="post"  onsubmit="return validateform()" >
        <div class="user-input">

            <div class="radio-buuton-header">
                <p class="p2"><b>Trip Details</b></p>
            </div>
            
            <div class="sourceStation-and-destinationStaion">

                <div class="source">
                    <label for="source">Source Station</label>
                    <br>
                    <select name="sourceStation" id="source" required>
                    
                        <optgroup label="Source Stations">
                        <?php  
                         $sourceStationsSQL = "SELECT stations FROM stations";
                        $result = $conn->query($sourceStationsSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['stations'].">".$row['stations']."</option>"; 
                        }
                            
                        ?>
                            
                        </optgroup>
                    </select>
                </div>

                <div class="destination">
                    <label for="destination">Destination Station</label>
                    <br>
                    <select name="destinationStation" id="destination" required >
                        

                        <optgroup label="Destination Stations">
                        <?php   
                        $destinationStationsSQL = "SELECT stations FROM stations";
                        $result = $conn->query($destinationStationsSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['stations'].">".$row['stations']."</option>"; 
                        }
                                
                        ?>
                           
                        
                    </select>
                </div>
            </div>

            <div class="date-and-time">
                <div class="date">
                    <label for="date">Deprature Date</label>
                    <br>
                    <input type="date" id="date" name = 'date'>
                </div>

                <div class="returning-date" id="returnDateJS">
                    <label for="return-date">Return Date</label>
                    <br>
                    <input type="date" id="return-date" name = 'returnDate'>
                </div>

                <div class="time">
                    <label for="time">Time</label>
                    <br>
                    <input type="time"  id="time" name = 'time'>
                </div>
            </div>

            <div class="oneWay-twoWay">
                <input id="oneWay" type="radio" value="One Way" name="way" checked onclick="hideShowReturnTime('oneWay');">
                <label for="oneWay">One way trip</label>

                <br>

                <input id="twoWay" type="radio" value="Two Way" name="way" onclick="hideShowReturnTime('twoWay');">
                <label for="twoWay">Two way trip</label>
            </div>
            <div class="firstClass-secondClass">
                <input id="firstClass" type="radio" value="First Class" name="cariage" checked >
                <label for="firstClass">1st - Class Carriage</label>

                <br>

                <input id="secondClass" type="radio" value="Second Class" name="cariage">
                <label for="secondClass">2nd - Class Carriage</label>
            </div>



            <div class="no-of-tickets">
                <label for="noTickets">Number of Passengers: </label>
                <input id="noTickets" type="number" name = 'ticketCount' onkeyup = 'dynamicTotal();' value="1">
            </div>

            <div class="ticket-price">
                <label for="ticketPrice">Total: </label>
                <input id="ticketPrice" name="ticketPrice" type="number" max="1000" min="10" value="10">
            </div>



            <div class="submit-and-reset">
                <input type="submit" value="Book Now" id="submit" name = 'submit'>

                <!-- <input type="reset" value="Reset" id="reset"> -->
            </div>
        </div>
    </form>

    <br>
    <br>
    <br>
    <?php 
    if(isset($_POST['submit'])){
        

        $id=$_SESSION['user_id'];
        $sql="SELECT user_balance FROM users where id ='$id'";

        $result=mysqli_query($conn,$sql);
        $Balance=mysqli_fetch_array($result);
       
       
        
        $Total=$_POST['ticketCount']*10;
    

      if($Balance[0]>=$Total)
      {
        $currentBalance=$Balance[0]-$Total;
        $sql="UPDATE users SET user_balance ='$currentBalance' where id ='$id'";

        $result=mysqli_query($conn,$sql);
        

        $source = $_POST['sourceStation'];
        $destination = $_POST['destinationStation'];
        $date = $_POST['date'];
        $returnDate = $_POST['returnDate'];
        $time = $_POST['time'];
        $trip_type_retriever = $_POST['way'];
        $trip_class_retriever = $_POST['cariage'];
        $ticketCount = $_POST['ticketCount'];
        
        if($trip_type_retriever == "One Way")
            $tripType = "One way trip";
        else if($trip_type_retriever == "Two Way")
            $tripType = "Two way trip"; 

        
        if($trip_class_retriever == "First Class" )
            $tripClass = "1st - Class Carriage";
        else if($trip_class_retriever == "Second Class")
            $tripClass = "2nd - Class Carriage";
    
        
    
        $byUser = $_SESSION['user_id'];
        
        $query = "INSERT INTO tickets (by_user_id, source, destination, date, return_date, time, trip_type, trip_class, ticketCount) 
        VALUES 
        ('$byUser' , '$source',  '$destination', '$date', '$returnDate' , '$time', '$tripType', '$tripClass', '$ticketCount')";
        $userHasTicket = 1;
        $query2 = "UPDATE users SET hasTicket = '$userHasTicket' WHERE id = '$byUser' ";
        
    
        $sql = mysqli_query($conn,$query);
        $sql2 = mysqli_query($conn,$query2);
            if($sql && $sql2)
            {
                echo "<script>alert('Ticket booked successfully!');</script>";
                echo "<script>window.location.href = 'train-ticket.php';</script>";
            }
        else
            echo "Ticket not booked!, check for errors";
        
    
}else
echo "<script>alert('Ticket not booked, funds insufficient!');</script>";


}
    ?>
    
</body>

</html>

