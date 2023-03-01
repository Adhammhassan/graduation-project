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
                
            </div>
            <div class="radio-buuton-header">
                <p class="p2"><b> Cryptography,Encryption&Key Management</b></p>
            </div>
            <div class="sourceStation-and-destinationStaion">
            <h3>Question 1</h3>
             <p >Do you want data to be encrypted at rest?
</p>
  <label>
    <input type="radio" name="pizza" value="yes" onclick="showAdditionalQuestion()">
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" onclick="hideAdditionalQuestion()">
    No
    
  </label>
  
</p>

  <div id="additional-question" style="display:none;">
  <h3>Question 2</h3>
    <p>Which encryption algorithm you prefer? </p>
    
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <?php  
                         $choicesSQL = "SELECT choices FROM choices where sub_id=2";
                        $result = $conn->query($choicesSQL);
                        
                        while($row = $result->fetch_assoc()){
                            echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                        }
                            
                        ?>   </optgroup>
                        </select>
                        <h3>Question 3</h3>
                        <p>Which key size you prefer?  </p> 
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
                </div>
                <div class="sourceStation-and-destinationStaion">
            <h3>Question 4</h3>
             <p >Do you want the key management system to track, and reports changes made to cryptographic
materials (encryption tools)?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    
  </label>
  <div class="radio-buuton-header">
                <p class="p2"><b> Data Security and Privacy</b></p>
            </div>
            <h3>Question 5</h3>
             <p >Do you want your data to be created and maintained in the data inventory?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    <h3>Question 6</h3>
             <p >Do you have different sensitivity level in your data?

</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    <h3>Question 7</h3>
             <p > Do you want the data to be encrypted while being transferred?

</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    <h3>Question 8</h3>
             <p > Do you want the more sensitive data to be more secured?

</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    <div class="radio-buuton-header">
                <p class="p2"><b>Infrastructure & Virtualization Security</b></p>
            </div>
            <h3>Question 9</h3>
             <p >Do you want secured infrastructure and virtualization environment?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No
    <h3>Question 10</h3>
             <p >Do you want to have the latest updates to your security controls?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No<h3>Question 11</h3>
             <p >Do you want the Cloud provider's environments to be encrypted?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No<h3>Question 12</h3>
             <p >Do you want the Cloud provider's environments to be monitored?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No<h3>Question 13</h3>
             <p >Do you want access control in your system?
</p><label>
    <input type="radio" name="pizza" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza" value="no" >
    No<h3>Question 14</h3>
             <p >How often do you want your network configuration to be reviewed?

</p>
<select name="choices" id="source" required>
                    
                    <optgroup label="choices">
                    <?php  
                     $choicesSQL = "SELECT choices FROM choices where sub_id=3";
                    $result = $conn->query($choicesSQL);
                    
                    while($row = $result->fetch_assoc()){
                        echo "<option value = ".$row['choices'].">".$row['choices']."</option>"; 
                    }
                        
                    ?>
                    
                    
                    </optgroup>
                </select><h3>Question 15</h3>
             <p >Do you want protection against attacks by implementation of new security
measures?
</p><label>
    <input type="radio" name="pizza"  >
    Yes
  </label>
  <label>
    <input type="radio" name="pizza"  >
    No
    </form>
    <script>
  function showAdditionalQuestion() {
    document.getElementById("additional-question").style.display = "block";
  }

  function hideAdditionalQuestion() {
    document.getElementById("additional-question").style.display = "none";
  }
</script>

    </body>
    
            

</html>