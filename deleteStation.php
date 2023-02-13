<?php 
require_once 'database/dbConnection.php';

$selectedStationID = $_GET['id'];

$sqlDeleteStation = "DELETE FROM stations WHERE station_id = '$selectedStationID' ";

$result = mysqli_query($conn, $sqlDeleteStation);

if($result){
    echo "Station Deleted";
    header("Location: train-stations.php");
}
