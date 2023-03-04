<?php
 echo "<table border=1 >
 <th >id</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Number</th>";

foreach($data as $user){
    echo "<tr ><td>".$user->Id."</td><td>".$user->First_Name."</td><td>".$user->Last_Name."</td><td>".$user->Brand_Name."</td><td>".$user->User_Number."</td></tr>";

}
echo"</table>";