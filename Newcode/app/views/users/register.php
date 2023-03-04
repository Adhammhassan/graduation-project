<?php
   require APPROOT . '/views/includes/navigation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sign up.css">

    
</head>
<body>


    <br>
    <br>
    <br>

<div id="container">
    <div class="card1">
        

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                class="login-form"
                >
                <h2>Register</h2>

            <input type="text" placeholder="UserName" name ="UserName" class="box" ><br>
            



            <input type="int" placeholder="PhoneNumber" name= "PhoneNumber"class="box" ><br>
           



            <input type="text" placeholder="Email" name="Email" class="box" ><br>
          



                <input type="Password" placeholder="Password" name="Password" class="box" ><br>
           


                <input type="Password" placeholder="ConfrimPassword" name= "ConfirmPassword" class="box" ><br>
           

            


                <p>Already Have an Account? <a href="<?php echo URLROOT; ?>/users/login">Login</a></p>
                <input type="submit" value="sign Up" class="btn">
           
        </form>
    </div>
</div>

<!-- 5od ay path zy mahowa bzbt 
w el Name bta3 ay text field yta5ed zy mahowa