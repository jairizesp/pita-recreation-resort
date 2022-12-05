<?php
require_once '../../../config/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql1 = "DELETE FROM informations WHERE id='$id'";

    if ($con->query($sql1) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
}