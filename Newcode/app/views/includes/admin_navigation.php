<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://localhost/MVCFRAMEWORK/public/css/admin.css">
<div class="opacity-80">
<div class="shadow-lg p-10 mb-5 bg-body rounded">
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="<?php echo URLROOT; ?>/users/admin_panel_landing"><h4>CAB</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class=" nav-link text-light" aria-current="page" href="<?php echo URLROOT ?>/users/admin_panel_admins">Admins</a>
        </li>
        <li class="nav-item">
          <a class=" nav-link text-light" aria-current="page" href="<?php echo URLROOT ?>/users/admin_panel_view_csp">CSP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo URLROOT ?>/users/admin_panel_users">Users</a>
        </li>
       
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION['Id'])) :?>
        <div class="  justify-content-end">
          <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
      </div>
        </li>
        <?php endif; ?>
      </ul>
      
     
      
    </div>
  </div>
        
</nav>
        </div>
        </div>
        <h3>
<?php
echo " Namera Administrative Side";
?>
</h3>
        
        
</html>