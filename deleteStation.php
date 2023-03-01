<?php 
require_once 'database/dbConnection.php';

$selectedID = $_GET['id'];

$sqlDeleteStation = "DELETE FROM cloud_providers WHERE id = '$selectedID' ";

$result = mysqli_query($conn, $sqlDeleteStation);

if($result){
    echo "Station Deleted";
    header("Location: train-stations.php");
}
