<?php  require 'database/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a ticket form</title>
    <link rel="stylesheet" href="css/book-ticket-stylesheet.css">



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
        <h1><b> Answer some questions </b></h1>
    </div>

    <form name="bookticket" action = "" method="post"  onsubmit="return validateform()" >
        <div class="user-input">

            <div class="radio-buuton-header">
                <p class="p2"><b>Level 1</b></p>
            </div>
            
            <div class="sourceStation-and-destinationStaion">

                <div class="source">
                    <label for="source">Cryptography,Encryption&Key Management</label>
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
                    <label for="destination">Identity & Access Management</label>
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
                <div class="destination">
                    <label for="destination">Logging And Monitoring</label>
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


            <div class="submit-and-reset">
                <input type="submit" value="Submit" id="submit" name = 'submit'>

                <!-- <input type="reset" value="Reset" id="reset"> -->
            </div>
            </div>
            
        </div>
    </form>
    </body>

</html>