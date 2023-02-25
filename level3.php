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
<br>
<br>

<body>
    <div class="heading">
        <h1><b> Answer some questions </b></h1>
    </div>

    <form name="bookticket" action = "" method="post"  onsubmit="return validateform()" >
        <div class="user-input">

            <div class="radio-buuton-header">
                <p class="p2"><b>Level 3</b></p>
            </div>
            <div class="radio-buuton-header">
                <p class="p2"><b>  Cryptography,Encryption&Key Management</b></p>
            </div>
            <div class="sourceStation-and-destinationStaion">

                <div class="source">
                    <label for="source"> Do you want data to be encrypted at rest?
</label>
                    <br>
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <?php  
                         $choicesSQL = "SELECT choices FROM choices where sub_id=1";
                        $result = $conn->query($choicesSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                        }
                            
                        ?>
                            
                        </optgroup>
                    </select>
                </div>
            <div class="sourceStation-and-destinationStaion">

                <div class="source">
                    <label for="source">Data Encryption</label>
                    <br>
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <?php  
                         $choicesSQL = "SELECT choices FROM choices where sub_id=1";
                        $result = $conn->query($choicesSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                        }
                            
                        ?>
                            
                        </optgroup>
                    </select>
                </div>

                <div class="destination">
                    <label for="destination">Encryption Algorithm</label>
                    <br>
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <?php  
                         $choicesSQL = "SELECT choices FROM choices where sub_id=2";
                        $result = $conn->query($choicesSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                        }
                            
                        ?>
                            
                        </optgroup>
                    </select>
                </div>
                <div class="destination">
                    <label for="destination">Key Generation</label>
                    <br>
                    <select name="destinationStation" id="destination" required >
                        

                        <optgroup label="choices">
                        <?php   
                        $choicesSQL = "SELECT choices FROM choices";
                        $result = $conn->query($choicesSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                        }
                                
                        ?>
                           
                        
                    </select>
                </div>
            <div class="destination">
                    <label for="destination">Key Inventory Management</label>
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


                <div class="radio-buuton-header">
                <p class="p2"><b>Identity & Access Management</b></p>
                </div>


                <div class="source">
                    <label for="source">Strong Password Policy and Procedures</label>
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
                    <label for="destination">Strong Authentication</label>
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
                    <label for="destination">Passwords Management</label>
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
                    <label for="destination">Authorization Mechanisms</label>
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
                    
                <div class="radio-buuton-header">
                <p class="p2"><b>Logging and Monitoring</b></p>
                </div>

                <div class="source">
                    <label for="source">Clock Synchronization</label>
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
                    <label for="destination">Log Protection</label>
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
                    <label for="destination">Encryption Monitoring and Reporting</label>
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
                    <label for="destination">Failures and Anomalies Reporting</label>
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
                <div class="submit-and-reset">
                <input type="submit" value="Submit" id="submit" name = 'submit'>
                

            </div>
            </div>
           
    </form>

    </body>
    
            

</html>