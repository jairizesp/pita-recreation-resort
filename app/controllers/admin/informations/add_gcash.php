<?php
//-- Declaring variables to prevent errors --//
$servicename = "";
$description ="";
$image = "";
$error_array = array();

//-- Start Register Button --//
if (isset($_POST['addgcash']) && isset($_FILES['gcashqr'])) {

    
    $gcashnum = $_POST['gcashnumber'];

    $img_name = $_FILES['gcashqr']['name'];
	$img_size = $_FILES['gcashqr']['size'];
	$tmp_name = $_FILES['gcashqr']['tmp_name'];
	$error = $_FILES['gcashqr']['error'];

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
				$query1 = mysqli_query($con, "INSERT INTO `gcashqr` (qr_image, contact_num) 
                VALUES ('$new_img_name', '$gcashnum')");
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