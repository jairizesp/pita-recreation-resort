<?php
    $error_array = array();
    require_once '../../../config/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "UPDATE posts SET approvalstatus='Rejected' WHERE id='$id'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>