<?php
   require APPROOT . '/views/includes/admin_navigation.php';
?>



 <table class="table table-striped table-hover">
 <th >id</th>
 <th>First Name</th>
 
 <th>Email</th>
 <th>Number</th>
 
 <?php
foreach($data as $user){
    if($user->user_type == 'User'){
    echo "<tr ><td>".$user->id."</td><td>".$user->user_name."</td><td>".$user->user_email."</td><td>".$user->user_phone."</td><td>";
    }

}
echo"</table>";
?>
   


