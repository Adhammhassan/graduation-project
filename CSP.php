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
        <a href="admin-panel.php">Dash Board</a>
    </div>

    <div class="body2">

        <div class="title">
            <p> <b>Cloud service providers</b></p>
        </div>

        <div class="users-table">
            <table>
                <thead>
                    <tr>
                        
                        <th  class="special-head"> #ID</th>  
                        <th >Providers</th>
                        
                    </tr>
                </thead>
        <?php 


if(isset($_POST['submit'])){

$cloud_providers = $_POST['name'];

$sql = "INSERT INTO cloud_providers (name) VALUES ('$cloud_providers')";

$query = mysqli_query($conn,$sql);
}

?>
                <?php  
                         
                         $sql = 'SELECT * FROM cloud_providers ';
                         $result= mysqli_query($conn,$sql);
                         while ($row= mysqli_fetch_assoc($result)){
                         ?>
                                         <tbody>

                                                <tr class="grey-tr">
                                                 <td>#<?php echo  $row['id'];?>
                                                 <td><?php echo $row['name']; ?>
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
            <button id="add-station-button" onclick="openForm()">Add CSP</button>
        </div>
<!-- 
        <div class="button-to-delete-station">
            <input id="delete-station-button" type="button" value="Delete Station">
        </div> -->
        
    </div>


        <div class="form-popup" id="myForm">
            <form method="POST" class="form-container">
                <h1>Add your cloud service provider</h1>
               
                <input id="name" type="text" placeholder="Cloud provider" name="name" >
                
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