<?php
//-- Declaring variables to prevent errors --//
$first_name = "";
$last_name = "";
$mobnuum ="";
$email = "";
$password = "";
$error_array = array();

//-- Start Register Button --//
if (isset($_POST['registerbutton'])) {

    //-- Registration form values --//
    //First name
    $first_name = strip_tags($_POST['fnamereg']); //Remove html tags
    $first_name = ucwords(strtolower($first_name)); //Uppercase first letter
    $_SESSION['fnamereg'] = $first_name; //Stores first name into session variable

    //Last name
    $last_name = strip_tags($_POST['lnamereg']); //Remove html tags
    $last_name = ucwords(strtolower($last_name)); //Uppercase first letter
    $_SESSION['lnamereg'] = $last_name; //Stores last name into session variable

    //Mobile Number
    $mobnum = $_POST['mobnumreg'];

    $imagename = "default-profile.jpg";
    //email
    $email = strip_tags($_POST['emailreg']); //Remove html tags
    $email = str_replace(' ', '', $email); //remove spaces
    $email = strtolower($email); //Uppercase first letter
    $_SESSION['emailreg'] = $email; //Stores email into session variable

    //Password
    $password = strip_tags($_POST['passwordreg']); //Remove html tags

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
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        $password = md5($password); //Encrypt password before sending to database

        //Insert Data to database
        $query1 = mysqli_query($con, "INSERT INTO `user` (fname, lname, mobilenum, email, password, profile_picture) 
        VALUES ('$first_name', '$last_name','$mobnum','$email','$password', '$imagename')");

        //Clear Session Variables
        $_SESSION['fname'] = "";
        $_SESSION['lname'] = "";
        $_SESSION['mobilenum'] = "";
        $_SESSION['email'] = "";
    } 
}