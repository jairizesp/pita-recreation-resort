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
if (isset($_POST['editgcashnumber'])) {

    $id = $_POST['id'];
    $gcashnumber = $_POST['gcashnumber'];

    
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE gcashqr SET contact_num='$gcashnumber' WHERE id=$id");

    } 
    //-- End of Error Validation --//
} //-- End Register Button --//