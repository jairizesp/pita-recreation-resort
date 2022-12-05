<?php
require_once '../../config/connect.php';

if (isset($_GET['idselect'])) {
    $id = $_GET['idselect'];
    $service = $_GET['serviceselect'];
    $sql1 = "DELETE FROM services_availed WHERE reservation_number='$id' and services_id='$service'";

    if ($con->query($sql1) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
}