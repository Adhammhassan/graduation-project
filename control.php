<!DOCTYPE html>
<html lang="en">

<?php session_start();
  require_once './database/dbConnection.php';
  $currentLoggedUserID = $_SESSION['user_id'];
  $sqlGetUserType = "SELECT user_type FROM users WHERE id = '$currentLoggedUserID' ";
  $executeSQL = mysqli_query($conn,$sqlGetUserType);

  $userTypeRow = mysqli_fetch_array($executeSQL);

  if($userTypeRow['user_type'] == "User"){
    header("Location: noAccess.php");
  }


    ?>
<head>
<script defer src="js/TrainStationsValidation.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin-panel.css">
    <title>Document</title>
</head>


<?php 
    include 'navbar.php';?>


<body>
    <div class="sidenav">
        <a href="admin-panel.php">DashBoard</a>
        <a href="CSP.php">cloud providers</a>
    </div>

    <div class="body2">

        <div class="title">
            <p> <b>Control</b></p>
        </div>

        <div class="users-table">
            <table>
                <thead>
                    <tr>
                        
                        <th  class="special-head"> sub_id</th>  
                        <th >control</th>
                        
                        
                    </tr>
                </thead>
        <?php 


if(isset($_POST['submit'])){

$choices = $_POST['choices '];
$sub_id = $_POST['sub_id '];
$sql = "INSERT INTO choices  (choices,sub_id) VALUES ('$choices ','$sub_id')";

$query = mysqli_query($conn,$sql);

}

?>
                <?php  
                         
                         $sql = 'SELECT * FROM choices ';
                         $result= mysqli_query($conn,$sql);
                         while ($row= mysqli_fetch_assoc($result)){
                         ?>
                                         <tbody>

                                                <tr class="grey-tr">
                                                 <td><?php echo  $row['sub_id'];?>
                                                 <td><?php echo $row['choices']; ?>
                                                <form action = 'deleteStation.php?action=remove&id=<?php echo $row['id'];?>' method = 'POST'>
                                                    <input id="delete-station-button" type = 'submit' name = 'delete' value = 'Delete' >
                                                    <div class="button-to-edit-station">
                                                        <a id="edit-station-button" href = 'edit-station.php?action=edit&id=<?php echo $row['id'];?>'>Edit Station</a>
                                                    </div>

                                                   </td>
                                                </form>  
                                               

                                             </tr>
                                         </tbody>
                                         <?php
                         }
                         
                         ?>             
                                     </table>
                                 </div>
                

        <div class="centering">

        <div class="button-to-add-station">
            <button id="add-station-button" onclick="openForm()">Add control</button>
        </div>
<!-- 
        <div class="button-to-delete-station">
            <input id="delete-station-button" type="button" value="Delete Station">
        </div> -->
        
    </div>


        <div class="form-popup" id="myForm">
            <form method="POST" class="form-container">
                <h1>Add your control</h1>
               
                <input id="choices" type="text" placeholder="choices" name="choices" >
                <h1>sub_id</h1>
               
                <input id="sub_id" type="text" placeholder="sub-id" name="sub_id" >
                <button name ="submit" type="submit" class="btn">Save</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
            </form>
        </div>

    </div>

</body>
<script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>
</html>