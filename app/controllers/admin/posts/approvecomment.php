<?php
    $error_array = array();
    require_once '../../../config/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "UPDATE comments SET approval_status='Approved' WHERE id='$id'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>