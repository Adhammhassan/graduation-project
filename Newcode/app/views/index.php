<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAB</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->

    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/navbar.css">
    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/index.css"> 

</head>
<body>

 
  <!-- Start Header -->
  <div class="header">
    <video autoplay muted loop>
      <source src="<?php echo URLROOT;?>/public/img/home.mp4" >
    </video>
    <div class="text-box">
    
      
      
      <h1>EASY WITH US TO FIND YOUR <span> CLOUD PROVIDER</span></h1>
      <a href="">BECOME A MEMBER</a>
    </div>
  </div>
  <!-- End Header -->


  <!-- Start Classes -->
  <div class="classes">
    <div class="container">
      <div class="special-heading">
        <h2>OUR <span>Levels</span></h2>
        <img src="images/line-dec.png" alt="" />
       
      </div>
      <div class="content">
        <div class="classes-sec">
          <div class="class activ">
            
            <a href="<?php echo URLROOT; ?>/Pages/level1">Beginner</a>
             
          </div>

          <div class="class">
            
            <a href="<?php echo URLROOT; ?>/Pages/level2">Intermediate</a>
          </div>
          <div class="class">
            
            
            <a href="<?php echo URLROOT; ?>/Pages/level3">Expert</a>
          </div>
          
         </div>
        <div class="desc-sec">
          <img src="<?php echo URLROOT;?>/public/img/home.jpg" alt="" />
          <h3>Difference Between The 3 Levels</h3>
          <p>
            Phasellus convallis mauris sed elementum vulputate. Donec posuere
            leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed
            vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia
            gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut,
            accumsan diam.
          </p>
          
        </div>
      </div>
    </div>
  </div>
  <!-- End Classes -->
 
  <!-- Start Contact -->
  <div class="contact">
    <div class="container">
      <div class="text">
        <h4><span>Feel free to contact us</span></h4>
        <a href="cu.php">Contact us</a>
      </div>
    </div>
  </div>
  <!-- End Contact -->
  <!-- Start Footer -->
  
</body>

<?php  
require APPROOT . '/views/includes/navbar.php';
?>


        
        

  











</body>
</html>
