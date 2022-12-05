<?php
//-- Declaring variables to prevent errors --//
$servicename = "";
$description ="";
$image = "";
$error_array = array();

//-- Start Register Button --//
if (isset($_POST['addRoomButton']) && isset($_FILES['image'])) {

    //-- Registration form values --//
    //First name
    $servicename = strip_tags($_POST['roomname']); //Remove html tags
    $roomtype= $_POST['roomtype'];
    $serviceprice = $_POST['roomprice'];
    $img_name = $_FILES['image']['name'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
	$img_size = $_FILES['image']['size'];
	$img1_size = $_FILES['img1']['size'];
	$img2_size = $_FILES['img2']['size'];
	$img3_size = $_FILES['img3']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$tmp1_name = $_FILES['img1']['tmp_name'];
	$tmp2_name = $_FILES['img2']['tmp_name'];
	$tmp3_name = $_FILES['img3']['tmp_name'];
	$error = $_FILES['image']['error'];

    $description = strip_tags($_POST['roomdescription']); //Remove html tags

    if ($error === 0) {
		if ($img_size > 5097152) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$img1_ex = pathinfo($img1, PATHINFO_EXTENSION);
			$img_ex_lc1 = strtolower($img1_ex);
			$img2_ex = pathinfo($img2, PATHINFO_EXTENSION);
			$img_ex_lc2 = strtolower($img2_ex);
			$img3_ex = pathinfo($img3, PATHINFO_EXTENSION);
			$img_ex_lc3 = strtolower($img3_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$new_img_name1 = uniqid("IMG-", true).'.'.$img_ex_lc1;
				$new_img_name2 = uniqid("IMG-", true).'.'.$img_ex_lc2;
				$new_img_name3 = uniqid("IMG-", true).'.'.$img_ex_lc3;

                move_uploaded_file($tmp_name, "../reservation/uploads/$new_img_name");
                move_uploaded_file($tmp1_name, "../reservation/uploads/$new_img_name1");
                move_uploaded_file($tmp2_name, "../reservation/uploads/$new_img_name2");
                move_uploaded_file($tmp3_name, "../reservation/uploads/$new_img_name3");
				// Insert into Database
				$query1 = mysqli_query($con, "INSERT INTO `rooms` (room_name,room_type, price, description, image,img_1,img_2,img_3,Status) 
                VALUES ('$servicename','$roomtype','$serviceprice','$description', '$new_img_name','$new_img_name1','$new_img_name2','$new_img_name3', 'Available')");
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}
}