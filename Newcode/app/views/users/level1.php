
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beginner</title>
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
                
            </div>
            <div class="radio-buuton-header">
                <p class="p2"><b> Encryption & Network Security:</b></p>
            </div>
            <div class="sourceStation-and-destinationStaion">
            <h3>Question 1</h3>
             <p>. Do you want the encryption on your data at rest to be?</p> 
            <select name="choices" id="source" required>
                    
                    <optgroup label="choices">
                    <option value="Strong">Strong</option>
                    <option value="Medium">Medium</option>
                    <option value="Weak">Weak</option>

                    
                    </optgroup>
                </select>
                <h3>Question 2</h3>

                <p>Do you want the encryption on your data at transfer to be?</p> 
            <select name="choices" id="source" required>
                    
                    <optgroup label="choices">
                    <option value="Strong">Strong</option>
                    <option value="Medium">Medium</option>
                    <option value="Weak">Weak</option>

                    
                    </optgroup>
                </select>
            <h3>Question 3</h3>
             <p>Do you want the encryption on your data at transfer to be?</p> 
            <select name="choices" id="source" required>
                    
                    <optgroup label="choices">
                    <option value="Strong">Strong</option>
                    <option value="Medium">Medium</option>
                    <option value="Weak">Weak</option>

                    
                    </optgroup>
                </select>
                
    <br>
    <br>
    </form>
    

    </body>
    
            

</html>