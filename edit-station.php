<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Station</title>
    <link rel="stylesheet" href="CSS/edit-station.css">
</head>
<body>

<?php session_start();
require_once 'database/dbConnection.php';
$stationId = $_GET['id'];


$sqlGetName = "SELECT * FROM stations WHERE station_id ='$stationId' ";
$result = mysqli_query($conn,$sqlGetName);

$row = mysqli_fetch_array($result);
if($row){
    $stationName = $row['stations'];
}
?>

<div class="main-header">
    <p>Enter the updated station name bellow:-</p>
</div>

<form class="my-form"  method = 'POST'>

    <div class="station-name-input">
        <label for="statioName">Station Name: </label>
        <input id="statioName" type = 'text' name = 'station-name' required minlength="3" maxlength="150" value = '<?php echo $stationName;?>'  >
    </div>

    <div class="submit-button">
        <input id="submitButton" type = 'submit' name = 'submit-edit' value = 'Update'>
    </div>
</form>










<?php
if(isset($_POST['submit-edit'])){
    $stationNAME = $_POST['station-name'];
    $updateNameSQL = "UPDATE stations SET stations = '$stationNAME' WHERE station_id = '$stationId' ";
    $execute = mysqli_query($conn,$updateNameSQL);

    if($execute){
        echo "<script>alert('Station name updated!');</script>";
        echo "<script>window.location.href = 'train-stations.php';</script>";
        
    }
}
?>
</body>
</html>
