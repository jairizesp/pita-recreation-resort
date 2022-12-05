<?php
//-- Declaring variables to prevent errors --//
$user_post = "";
$date = "";
$description ="";
$image = "";
$error_array = array();

//-- Start Register Button --//
if (isset($_POST['addpostbutton']) && isset($_FILES['image'])) {

    //-- Registration form values --//
    //First name
    $user_post = strip_tags($_POST['name']); //Remove html tags

    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    //First name
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    $description = strip_tags($_POST['postdescription']); //Remove html tags

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
				$query1 = mysqli_query($con, "INSERT INTO `posts` (user_post, date, description, image, approvalstatus) 
                VALUES ('$user_post', '$date','$description', '$new_img_name', 'Approved')");
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
}elseif(isset($_POST['addfeedback'])){
	$refnum=$_POST['refnum'];
	$name =$_POST['name'];
	 //-- Registration form values --//
    //First name
$sql_update="UPDATE reservation set rated='1' where payment_proof='$refnum'";
				$true = $con->query($sql_update);

				
    $user_post = strip_tags($_POST['name']); //Remove html tags

    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    //First name
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    $description = strip_tags($_POST['postdescription']); //Remove html tags

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
				$query1 = mysqli_query($con, "INSERT INTO `posts` (user_post, date, description, image, approvalstatus) 
                VALUES ('$user_post', '$date','$description', '$new_img_name', 'Approved')");
				header('Location:../');

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