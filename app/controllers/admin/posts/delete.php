<?php
require_once '../../../config/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($con, "DELETE FROM posts WHERE id='$id'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}