<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cart.css">

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
 <?php


 foreach($data as $key)
 {
    cartElement($key->Id,IMGROOT."Boxers.jpeg",$key->base_product, $key->Fabric, $key->Colour,$key->Printing,$key->Quantity,$key->additionalInfo,$key->deliveryTime);
 }


function cartElement($Id,$productimg,$Base, $Fabric,$colour, $printing,$Quantity,$info,$Time){
    $element = "
    
    <form action=\"Cart.php?action=remove&id=$Id\" method=\"Post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                            <h5 class=\"pt-2\"> <i>$Base</i></h5>
                            <h6 class=\"text-secondary\"><i>Fabric </i> : $Fabric</h6>
                            <h6 class=\"text-secondary\"><i>Printing</i> : $printing</h6>
                            <h6 class=\"text-secondary\"><i>Quantity</i> : $Quantity</h6>
                            <h6 class=\"text-secondary\"><i>Comments</i> : $info</h6>
                            <h6 class=\"text-secondary\">Time:$Time</h6>

                            </div>
                            
  
  
  
                            <div class=\"col-md-3 py-5\">
                                <div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
  }

