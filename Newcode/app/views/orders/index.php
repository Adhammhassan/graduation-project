
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
    <link rel="stylesheet" href="">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->


    <!-- custom css file link  -->
    <link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/orders.css">
    

    <?php  
require APPROOT . '/views/includes/Nheader.php';





?>
</head>
<body>


 <?php
function selectTop($productimg, $productname,$productParag){


$element = "
    <section class=\"home\" id=\"home\">

        <div class=\"swiper-container home-slider\">
    
            <div class=\"swiper-wrapper\">
    
                <div class=\"swiper-slide\">
                    <div class=\"box\">
                        <img src = \"$productimg\" alt = \"image here\">
                        <div class=\"content\" >
                           <h3>$productname</h3>
                           <span>  $productParag </span>
                           <br>
                            <a href=\"http://localhost/mvcframework/orders/Enter?id=\" class=\"btn\">SUBMIT</a>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>

    ";
    echo $element;
    }
   echo selectTop(IMGROOT."Bucket.jpeg","dfefccr","hdsgvefuiwvcgfvy7");
  
  
?>

    <br>
<Form method='POST'>
    <button class = "bot"  name='Men'>MEN - </button>
   <button  class = "bot1" name='Woman'> WOMEN -</button>
   
   <button  class = "bot1" name='Uni'> UNISEXX -</button>
    

</Form>


 
<br>
<br>
<?php

function showProducts($productimg, $productname)
{


$element = "
<div class=\"col-md-3 col-sm-6 my-3 my-md-0\"> 
<form action=\"sizing.php\" method=\"POST\">
<section class=\"Printing\" id=\"Printing\">


    <div class=\"box-container\">

        <div class=\"box\">
        <img src = \"$productimg\" alt = \"image here\">

            <br>
            <h3> $productname</h3>
            <a href=\"http://localhost/mvcframework/orders/Enter?name=$productname\" class=\"btn\"  >Start</a> 
            </div>
            </div>
   </div>
</form>
</div>
";
    echo $element;
    }
   


  if(isset($_POST['Men']))
  {

    foreach ($data['Men'] as $a)
    {
        echo showProducts(IMGROOT.$a->Image,$a->Name);
    
        
    }

   
  
  }


  elseif(isset($_POST['Woman']))
    {
        foreach ($data['Woman'] as $a)
        {
            echo showProducts(IMGROOT.$a->Image,$a->Name);
            
        }
        
     
    }
    elseif(isset($_POST['Uni']))
    {
        foreach ($data['Uni'] as $a)
        {
            echo showProducts(IMGROOT.$a->Image,$a->Name);
            
        }
    }

  /*
    echo "<tr><td>".$product->Product_Name."</td><td><form action ='http://localhost/mvcframework/products/admin_panel_products_men_delete?action=remove&id=$product-%3EId' method = 'POST'>
        <input type = 'submit' name = 'del-button' value ='Delete'></input>
        <td><a href = 'http://localhost/mvcframework/products/admin_panel_products_men_edit?id=$product-%3EId%27%3EEdit</a></td>
        </form>
        </td></tr>
        ";*/
       