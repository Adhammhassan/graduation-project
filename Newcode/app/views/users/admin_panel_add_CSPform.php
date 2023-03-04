<?php
   require APPROOT . '/views/includes/admin_navigation.php';
?>
<html>
<link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/admin.css">

<h5>ADD CSP FORM</h5>


<form class="form-control" action = "http://localhost/mvcframework/users/admin_panel_add_CSPform" method = "POST">
<div class="form">
  <div class="col-md-5">
  
  <label class="form-label" for="Fname">Name</label><br>
  <input class="form-control" type="text" id="Fname" name="Name"><br>

</div>
<div class="col-md-5">
  <label class="form-label" for="Lname">Website</label><br>
  <input class="form-control" type="text" id="Lname" name="Website"><br>
</div>
<div class="col-md-5">
  <label class="form-label" for="Email">Services</label><br>
  <input class="form-control" type="text" id="Email" name="Services"><br>
</div>

  
  <input  type="submit" id="submit-button" name="submit-button" value ="Add!" class="btn btn-dark "><br>
</div>
</div>
</form>


    </html>