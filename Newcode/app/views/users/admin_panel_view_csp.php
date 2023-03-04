<?php
   require APPROOT . '/views/includes/admin_navigation.php';
?>

<form action = "<?php echo URLROOT; ?>/users/AddCSP" >
<div class="btn">
<a class="btn btn-dark" href = "http://localhost/mvcframework/users/admin_panel_add_CSPform" >Add CSP</a>
</div>
</form>
<table class="table table-striped table-hover">
 <th >id</th>
 <th>Name</th>
 <th>Website</th>
 <th>Services</th>

 
 <?php
foreach($data as $user){
    
    echo "<tr ><td>".$user->id."</td><td>".$user->name."</td><td>".$user->website."</td><td>".$user->services."</td><td>";
    

}
echo"</table>";
?>