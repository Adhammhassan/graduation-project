<!DOCTYPE html>
<html lang="en">
<?php require_once './database/dbConnection.php';?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin-panel.css">
    <title>Document</title>
</head>

<?php session_start();
    include 'navbar.php';?>
    
<body>
    <div class="sidenav">
        <a href="admin-panel.php">Dash Board</a>
        <a href="train-stations.php">Train Stations</a>

    </div>
    <div class="body2">
        <div class="title">
            <p> <b>All Tickets</b></p>
        </div>

        <div class="users-table">
            <table>

                <caption><b>Purchased Tickets</b></caption>

                <thead>
                    <tr>
                        <th>Ticket #ID</th>
                        <th>Source Station</th>
                        <th>Destination Station</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Trip Kind</th>
                        <th>Class carriage</th>
                    </tr>
                </thead>
                <?php

$sql="SELECT * FROM tickets";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

                <tbody>
                
                    <tr class="grey-tr">
                        <td><span name="ID"><?php echo $row['ticketID'] ?> </span></td>
                        <td><?php echo $row['source'] ?></td>
                        <td><?php echo $row['destination'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['trip_type'] ?></td>
                        <td><?php echo $row['trip_class'] ?></td>
                        
                      
                       
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