<?php
//-- Declaring variables to prevent errors --//
    $lname =  "";               
    $fname = "";
    $mobilenum = "";
    $email = "";
    $password = "";
    $id = "";
    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['editbutton'])) {

    //-- Registration form values --//
    //First name
    $fname = strip_tags($_POST['fnameEdit']); //Remove html tags
    $fname = str_replace(' ', '', $fname); //remove spaces
    $fname = ucfirst(strtolower($fname)); //Uppercase first letter
    $_SESSION['fnameEdit'] = $fname; //Stores first name into session variable

    //Last name
    $lname = strip_tags($_POST['lnameEdit']); //Remove html tags
    $lname = str_replace(' ', '', $lname); //remove spaces
    $lname = ucfirst(strtolower($lname)); //Uppercase first letter
    $_SESSION['lnameEdit'] = $lname; //Stores last name into session variable

    //Mobile Number
    $mobnum = strip_tags($_POST['mobilenumEdit']); //Remove html tags
    $mobnum = str_replace(' ', '', $mobnum); //remove spaces
    $_SESSION['mobilenumEdit'] = $mobnum; //Stores email into session variable

    //email
    $email = strip_tags($_POST['emailEdit']); //Remove html tags
    $email = str_replace(' ', '', $email); //remove spaces
    $email = strtolower($email); //Uppercase first letter
    $_SESSION['emailEdit'] = $email; //Stores email into session variable

    //Password
    $password = strip_tags($_POST['passwordEdit']); //Remove html tags

    //Id
    $id = strip_tags($_POST['id']); //Remove html tags
    $id = str_replace(' ', '', $id); //remove spaces
    $_SESSION['id'] = $id; //Stores email into session variables
    
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        $password = md5($password); //Encrypt password before sending to database

        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE user SET fname='$fname', lname='$lname', email='$email', mobilenum='$mobnum', password='$password' WHERE id=$id");

        //Clear Session Variables
        $_SESSION['fname'] = "";
        $_SESSION['lname'] = "";
        $_SESSION['mobilenum'] = "";
        $_SESSION['email'] = "";
        $_SESSION['id'] = "";
    } 
    //-- End of Error Validation --//
} //-- End Register Button --//