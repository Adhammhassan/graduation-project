<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'navbar.php';?>
  
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Training Studio</title>
  <link rel="stylesheet" href="css/index.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
</head>

<body>

 
  </header>
  <!-- Start Header -->
  <div class="header">
    <video autoplay muted loop>
      <source src="images/home.mp4" />
    </video>
    <div class="text-box">
    
      
      
      <h1>EASY WITH US TO FIND YOUR <span> CLOUD COMPUTING</span></h1>
      <a href="Signup.php">BECOME A MEMBER</a>
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
            <i class="fa fa-train" style="font-size:48px;color:rgb(60, 28, 238)"></i>
            <a href="level1.php">level 1</a>
             
          </div>
          <div class="class">
            <i  style="font-size:48px;color:rgb(60, 28, 238)"></i>
            <a href="level2.php">level 2</a>
          </div>
          <div class="class">
            <i class="fa fa-train" style="font-size:48px;color:rgb(60, 28, 238)"></i>
            <a href="level3.php">level 3</a>
          </div>
          
         </div>
        <div class="desc-sec">
          <img src="images/home.jpg" alt="" />
          <h3>Difference Between The 3 Levels</h3>
          <p>
            Phasellus convallis mauris sed elementum vulputate. Donec posuere
            leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed
            vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia
            gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut,
            accumsan diam.
          </p>
          <a href="book-a-ticket.php">VIEW SCHEDULE</a>
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
  <?php include 'footer.php';?>
</body>

</html>