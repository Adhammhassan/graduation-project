<!DOCTYPE html>
<html lang="en">
<head>
  <title>Css Navbar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/Nheader.css">
</head>
<body>


 <header class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
           <div class="logo">
             <a href="<?php echo URLROOT?>">Namera</a>
           </div>
           <input type="checkbox" id="nav-check">
           <label for="nav-check" class="nav-toggler">
              <span></span>
           </label>
           <nav class="nav">
              <ul>
                 <li><a href="<?php echo URLROOT?>">Home</a></li>
                 <?php if(!isset($_SESSION['Id'])) :?>

                 <li><a href="<?php echo URLROOT; ?>/users/login">LOGIN</a></li>
                 <li><a href="<?php echo URLROOT; ?>/users/Register">REGISTER</a></li>


                 <?php endif; ?>
<?php if(isset($_SESSION['Id'])) :?>

 <li><a href="<?php echo URLROOT; ?>/users/logout">LOGOUT</a></li>
                 <li><a href="<?php echo URLROOT; ?>/users/profile">Profile</a></li>
                 <li><a href="<?php echo URLROOT; ?>/orders/myOrders">MyOrders</a></li>
                 <li><a href="<?php echo URLROOT; ?>/orders">Start an Order</a></li>
              </ul>
              <?php endif; ?>
           </nav>
        </div>
    </div>
 </header>

</body>
</html>
