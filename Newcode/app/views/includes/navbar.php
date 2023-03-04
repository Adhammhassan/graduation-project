

<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Training Studio</title>
  
  <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/navbarr.css">
 
  

</head>
     <!-- Start Nav -->
  <nav>
    <div class="logo">
      <a href="index.php"><span></span></a>
    </div>
    <i class="fas fa-ellipsis-v" id="menuButton"></i>
    <ul id="menu">

    <?php // Check if user is NOT logged in, then show the navigation bar that contains the login and signup hyperlinks
     
    if (!isset($_SESSION['Id'])):
    ?>
    
      <li><a href="index.php">Home</li></a>
      
      <li><a href="cu.php">Contact us</a></li>
      <li><a href="<?php echo URLROOT; ?>/users/Register">Signup</a>
      <li><a href="<?php echo URLROOT; ?>/users/login">Login</a>
      <?php endif;?>
    
 
      <?php //Check if user IS logged in, then show the nav bar that contains logout and doesn't contain signup
      if (isset($_SESSION['Id'])):

        //User Balance 
        $id=$_SESSION['Id'];
    ?>
      <li> <a href="index.php">Home</li></a>
        <li> <a href="profile.php">My Profile</li></a>
        <li><a href="cu.php">Contact us</a></li>
      <li> <a href="<?php echo URLROOT; ?>/users/logout">Logout</li></a>
      <?php endif;

      ?>



    </ul>
  </nav>
  <!-- End Nav -->
  
</html>