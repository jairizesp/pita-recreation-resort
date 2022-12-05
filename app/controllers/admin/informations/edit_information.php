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
if (isset($_POST['editinformation'])) {

    $id = $_POST['id'];
    $title = $_POST['informationtitle'];
    $description = $_POST['informationdescription'];

    
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE informations SET title='$title', description='$description' WHERE id=$id");

    } 
    //-- End of Error Validation --//
} //-- End Register Button --//