<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namera</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/style.css">

</head>
<body>
    session_start();
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"></i> CAB </a>

    <nav class="navbar">
         <a href="<?php echo URLROOT?>">Home</a></li>
                 <?php if(!isset($_SESSION['Id'])) :?>

                 <a href="<?php echo URLROOT; ?>/users/login">LOGIN</a>
                 <a href="<?php echo URLROOT; ?>/users/Register">REGISTER</a>


                 <?php endif; ?>
<?php if(isset($_SESSION['Id'])) :?>

 <a href="<?php echo URLROOT; ?>/users/logout">LOGOUT</a>
                 <a href="<?php echo URLROOT; ?>/users/profile">Profile</a>
                 
              </ul>
              <?php endif; ?>
        
    </nav>
  

    

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/ATHLETIC WEAR.jpg" alt="">
            <div class="content">
                <h3>SWEATPANTS</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/POLO TSHIRTS.jpg" alt="">
            <div class="content">
                <h3>Polo Shirt</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/kindpng_357703.png" alt="">
            <div class="content">
                <h3>Hoodie</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="total"> total : $19.69/- </div>
        <a href="#" class="btn">checkout</a>
    </div>

    <form action="" class="login-form">
        <h3>login now</h3>
        <input type="email" placeholder="your email" name="logEmail" class="box">
        <input type="password" placeholder="your password" name= "logPass"class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="http://localhost/MVCFRAMEWORK/users/register">create now</a></p>
        <input type="submit" name="login" value="login now" class="btn">
    </form>

</header>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="http://localhost/MVCFRAMEWORK/public/Js/script.js"></script>
</body>