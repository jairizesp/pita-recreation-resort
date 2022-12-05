<?php
//-- Declaring variables to prevent errors --//
    $name = "";               
    $fname= "";
    $lname= "";
    $email= "";
    $contactnum= "";
    $profile_picture= "";
    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['editprofilebutton'])) {
/* && isset($_FILES['image'])*/
    $id = strip_tags($_POST['id']);
      $password = md5($_POST['passwordEdit']);
    //-- Registration form values --//
    //First name
    $first_name = strip_tags($_POST['fnameEdit']); //Remove html tags
    $first_name = ucwords(strtolower($first_name)); //Uppercase first letter
    $_SESSION['fnamereg'] = $first_name; //Stores first name into session variable

    //Last name
    $last_name = strip_tags($_POST['lnameEdit']); //Remove html tags
    $last_name = ucwords(strtolower($last_name)); //Uppercase first letter
    $_SESSION['lnamereg'] = $last_name; //Stores last name into session variable

    //Mobile Number
    $mobnum = $_POST['mobilenumEdit'];

    $imagename = "default-profile.jpg";
    //email
    $email = strip_tags($_POST['emailEdit']); //Remove html tags
    $email = str_replace(' ', '', $email); //remove spaces
    $email = strtolower($email); //Uppercase first letter
    $_SESSION['emailreg'] = $email; //Stores email into session variable

    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        //Check if email already exists
        $checkEmail = mysqli_query($con, "SELECT email FROM user WHERE email='$email'");

        //Count the number of rows returned
        $numberRows = mysqli_num_rows($checkEmail);

        if ($numberRows > 0) {
            array_push($error_array, "Email already in use<br>");
        }
    } else {
        array_push($error_array, "Invalid email format<br>");
    }
    
    if($img_name==''){
// Insert into Database
                 $query1 = mysqli_query($con, "UPDATE user SET fname='$first_name', lname='$last_name', mobilenum='$mobnum', email='$email', password='$password'  WHERE id=$id");
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
                $query1 = mysqli_query($con, "UPDATE user SET fname='$first_name', lname='$last_name', mobilenum='$mobnum', profile_picture='$new_img_name', password='$password' WHERE id=$id");
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


   
} //-- End Register Button --//