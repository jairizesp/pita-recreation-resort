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

    $description = strip_tags($_POST['roomprice']); //Remove html tags


 $img_name = $_FILES['cottageimg']['name'];
    $img_size = $_FILES['cottageimg']['size'];
    $tmp_name = $_FILES['cottageimg']['tmp_name'];
    $error = $_FILES['cottageimg']['error'];
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
                move_uploaded_file($tmp_name, "../reservation/uploads/$new_img_name");
    // Insert into Database
    $query1 = mysqli_query($con, "INSERT INTO `cottages` (cottage_name, cottage_price,cottge_img) 
    VALUES ('$servicename', '$description','$new_img_name')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
                $em = "You can't upload files of this type";
                header("Location: cottage.php?error=$em");
            }
}
}else {
        $em = "unknown error occurred!";
        header("Location: cottage.php?error=$em");
    }
}