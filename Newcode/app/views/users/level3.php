
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert</title>
    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/book-ticket-stylesheet.css">
    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/navbarr.css">



</head>
<?php
   require APPROOT . '/views/includes/navbar.php';
?>
  <form action = "<?php echo URLROOT; ?>/users/choices" >
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
                <p class="p2"><b> Cryptography,Encryption&Key Management</b></p>
            </div>
            <div class="sourceStation-and-destinationStaion">
            <h3>Question 1</h3>
             <p >Do you want data to be encrypted at rest?</p>
  <label>
    <input type="radio"  name="pizza" value="yes" onclick="showAdditionalQuestion()">
    Yes
  </label>
  <label>
    <input type="radio" name="pizza"  value="no" onclick="hideAdditionalQuestion()">
    No
    
  </label>
   
  <div id="additional-question1" style="display:none;">
  <h3>Question 2</h3>
    <p>Which encryption algorithm you prefer? </p>
    
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <option value="RSA">RSA</option>
                    <option value="AES">AES</option>
                    <option value="Triple-Des">Triple-Des</option>
                         </optgroup>
                        </select>
                        <h3>Question 3</h3>
                        <p>Which key size you prefer?  </p> 
                        <select name="choices" id="source" required>
                        <optgroup label="choices">
                        <option value="256">256</option>
                        <option value="512">512</option>
                        <option value="1024">1024</option>
                        <optgroup label="choices">    
                     </optgroup>
                    </select>
                </div>
</div>


                <div class="sourceStation-and-destinationStaion">
            <h3>Question 4</h3>
             <p >Do you want the key inventory management system to track, and reports changes made to cryptographic
materials (encryption tools)?
</p><label>
    <input type="radio" name="4" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio"  name="4"value="no" >
    No
    
  </label>
  <div class="radio-buuton-header">
                <p class="p2"><b> Data Security and Privacy</b></p>
            </div>
            <h3>Question 5</h3>
             <p >Do you want your data to be created and maintained in the data inventory?
</p><label>
    <input type="radio" name="5" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio"  name="5" value="no" >
    No
    <h3>Question 6</h3>
             <p >Do you have different sensitivity level in your data?

</p><label>
    <input type="radio" name="6" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="6" value="no" >
    No
    

    <div class="sourceStation-and-destinationStaion">
            <h3>Question 7</h3>
             <p >Do you want data to be encrypted in transit?</p>
  <label>
    <input type="radio"  name="7" value="yes" onclick="showAdditionalQuestion1()">
    Yes
  </label>
  <label>
    <input type="radio" name="7"  value="no" onclick="hideAdditionalQuestion1()">
    No
    
  </label>
   
  <div id="additional-question" style="display:none;">
  <h3>Question 8</h3>
    <p>Which key size of RSA do you prefer? </p>
    
                    <select name="choices" id="source" required>
                    
                        <optgroup label="choices">
                        <option value="RSA">RSA</option>
                    <option value="AES">AES</option>
                    <option value="Triple-Des">Triple-Des</option>
                         </optgroup>
                        </select>
                        
                </div>
</div>
</p>
    <h3>Question 9</h3>
             <p > Do you want the more sensitive data to be more secured?

</p><label>
    <input type="radio" name="8" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="8" value="no" >
    No
    <div class="radio-buuton-header">
                <p class="p2"><b>Infrastructure & Virtualization Security</b></p>
            </div>
            <h3>Question 10</h3>
             <p >Do you want secured infrastructure and virtualization environment?
</p><label>
    <input type="radio" name="9" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="9" value="no" >
    No
    <h3>Question 11</h3>
             <p >Do you want to have the latest updates to your security controls?
</p><label>
    <input type="radio" name="10" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="10" value="no" >
    No<h3>Question 12</h3>
             <p >Do you want the Cloud provider's environments to be encrypted?
</p><label>
    <input type="radio" name="11" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio"name="11"  value="no" >
    No<h3>Question 13</h3>
             <p >Do you want the Cloud provider's environments to be monitored?
</p><label>
    <input type="radio" name="12" value="yes" >
    Yes
  </label>
  <label>
    <input type="radio" name="12" value="no" >
    No<h3>Question 14</h3>
             <p >Do you want access control in your system?
</p><label>
    <input type="radio" name="13" value="yes"onclick="showAdditionalQuestion2()" >
    Yes
  </label>
  <label>
  <input type="radio" name="13"  value="no" onclick="hideAdditionalQuestion2()">
    No
    </label>
    <div id="additional-question2" style="display:none;">
    No<h3>Question 15</h3>
             <p >How often do you want your network configuration to be reviewed?

</p>
<select name="choices" id="source" required>
                    
                    <optgroup label="choices">
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half-Annually">Half-Annually</option>
                    <option value="Annually">Annually</option>

                    
                    </optgroup>
                </select>
</div>
<h3>Question 16 </h3>
             <p >Do you want protection against attacks by implementation of new security measures?</p>
             <label>
             <input type="radio"  name="15" >
               Yes
             </label>
             <label>
             <input type="radio" name="15"  >
               No
               <br>
    <br>
    </form>
    <script>
  function showAdditionalQuestion() {
    document.getElementById("additional-question1").style.display = "block";
  }

  function hideAdditionalQuestion() {
    document.getElementById("additional-question1").style.display = "none";

    
  }function showAdditionalQuestion1() {
    document.getElementById("additional-question").style.display = "block";
  }

  function hideAdditionalQuestion1() {
    document.getElementById("additional-question").style.display = "none";
  }

  function showAdditionalQuestion2() {
    document.getElementById("additional-question2").style.display = "block";
  }

  function hideAdditionalQuestion2() {
    document.getElementById("additional-question2").style.display = "none";
  }

</script>

    </body>
    
            

</html>