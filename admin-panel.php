<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  require_once './database/dbConnection.php';
  $currentLoggedUserID = $_SESSION['user_id'];
  $sqlGetUserType = "SELECT user_type FROM users WHERE id = '$currentLoggedUserID' ";
  $executeSQL = mysqli_query($conn,$sqlGetUserType);

  $userTypeRow = mysqli_fetch_array($executeSQL);

  if($userTypeRow['user_type'] != "Admin"){
    header("Location: noAccess.php");
  }
 
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/admin-panel.css">
  <title>Admin panel</title>
</head>

<?php 
    include 'navbar.php';?>

<body>
  <div class="sidenav">
    <a href="CSP.php">cloud providers</a>
    <a href="control.php">conrtol</a>
  </div>

  <div class="body2">
    <div class="title">
      <p> <b>Dashboard</b></p>
    </div>

    <div class="three-squares">
      <div class="square1">
        <div class="text1">
          <p>Users Count:-</p>
          <h4 name="numberOfUsers" class="heading4"><span><?php $sql = "SELECT COUNT(*) AS total from users";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
echo $data['total'];?></span> Users</h4>
        </div>
      </div>
      
      

  

    <div class="users-table">
      <table>

        <caption><b>Users</b></caption>

        <thead>
          <tr>
            <th>User #ID</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Phone Number</th>
          </tr>
        </thead>

        <?php

$sql='SELECT * FROM users';

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>
  <tbody>
  <tr>
    <td><span name="ID"><?php echo $row['id'] ?></span></td>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['user_email'] ?></td>
    <td><?php echo $row['user_phone'] ?></td>
  </tr>

</tbody>
<?php
}
?>
       
      </table>

    </div>

  </div>

</body>

</html>
