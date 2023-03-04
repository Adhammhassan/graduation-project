<?php
   require APPROOT . '/views/includes/admin_navigation.php';
?>
<html>
<link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/admin.css">

<h5>ADD ADMIN FORM</h5>


<form class="form-control" action = "http://localhost/mvcframework/users/admin_panel_add_adminform" method = "POST">
<div class="form">
  <div class="col-md-5">
  
  <label class="form-label" for="Fname">First name</label><br>
  <input class="form-control" type="text" id="Fname" name="UserName"><br>

</div>

<div class="col-md-5">
  <label class="form-label" for="Email">Email</label><br>
  <input class="form-control" type="email" id="Email" name="UserPhone"><br>
</div>
<div class="col-md-5">
  <label class="form-label" for="password">Password</label><br>
  <input class="form-control" type="password" id="Lname" name="Password"><br>
</div>
<div class="col-md-15">
  
  <input  type="submit" id="submit-button" name="submit-button" value ="Add!" class="btn btn-dark "><br>
</div>
</div>
</form>


    </html>