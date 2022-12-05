<?php
//-- Declaring variables to prevent errors --//
$servicename = "";
$description ="";
$image = "";
$error_array = array();

//-- Start Register Button --//
if (isset($_POST['addRoomButton'])) {

    //-- Registration form values --//
    //First name
    $servicename = strip_tags($_POST['roomname']); //Remove html tags

    $description = strip_tags($_POST['roomdescription']); //Remove html tags

    // Insert into Database
    $query1 = mysqli_query($con, "INSERT INTO `informations` (title, description) 
    VALUES ('$servicename', '$description')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}elseif(isset($_POST['add_imginfo'])){
    $img_status=$_POST['img_status'];
    $image_name=$_POST['imgname'];
    $img_type=$_POST['img_type'];
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if ($error === 0) {
        if ($img_size > 5097152) {
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                move_uploaded_file($tmp_name, "uploads/$new_img_name");
                // Insert into Database
                $query1 = mysqli_query($con, "INSERT INTO `img_info` (name,image_type,img_path,status) 
                VALUES ('$image_name','$img_type','$new_img_name','$img_status')");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    }
}elseif(isset($_POST['edit_imginfo'])){
    $img_status=$_POST['img_status'];
    $image_name=$_POST['imgname'];
    $imgid=$_POST['imgid'];
    $img_type=$_POST['img_type'];
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
if($img_name==''){
      $query1 = "UPDATE img_info set name='$image_name',image_type='$img_type',status='$img_status' where id='$imgid'";
                    $res_update =$con->query($query1);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
      if ($error === 0) {
        if ($img_size > 5097152) {
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                move_uploaded_file($tmp_name, "uploads/$new_img_name");
                // Insert into Database
                $query1 = "UPDATE img_info set name='$image_name',image_type='$img_type',img_path='$new_img_name',status='$img_status' where id='$imgid'";
                    $res_update =$con->query($query1);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    }
}
      
}