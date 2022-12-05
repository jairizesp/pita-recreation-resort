<?php
require_once '../../config/connect.php';

if (isset($_GET['loop'])) { 
    $loopnum = $_GET['loop'];
    $reserveid = $_GET['reserveid'];
    for($i=0; $i<$loopnum; $i++) {
        $getvariable = $_GET['id'.$i];
        $query2 = mysqli_query($con,"INSERT INTO `services_availed` (reservation_number, services_id) VALUES ('$reserveid','$getvariable')");
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>