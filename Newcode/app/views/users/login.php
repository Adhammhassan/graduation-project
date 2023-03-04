
<?php
   require APPROOT . '/views/includes/navigation.php';
?>

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sign up.css">
</div>
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


<div id ="container">
    <div class="card1">
        

        <form action="<?php echo URLROOT; ?>/users/login" id="register-form" method ="POST" class="login-form">
        <h2>Login <h2>  
            <div class ="form-group">
        <input type="text" placeholder="Email" name="email" class="form-control" >
    
            <span class="invalidFeedback">
                
            </span>
            </div>
            <div class ="form-control">
            <input type="password" placeholder="Password" name="Pass" class="form-control" >
            <span class="invalidFeedback">
               
            </span>
            </div>

            <input type="submit" value="Login" class="btn">

            <p>don't have an account <a href="<?php echo URLROOT; ?>/users/register">create now</a></p>
        </form>
    </div>
</div>


=======
<?php
   require APPROOT . '/views/includes/navigation.php';
?>




