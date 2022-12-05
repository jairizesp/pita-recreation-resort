<?php
//-- Declaring variables to prevent errors --//
    $name =  "";               
    $cottagetype = "";
    $date = "";
    $checkin = "";
    $checkout = "";
    $adultnum = "";
    $childrennum = "";
    $approvalstatus = "";
    $id = "";
    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['editbutton'])) {

    //-- Registration form values --//

    //Last name
    $cottagetype = strip_tags($_POST['cottagetypeEdit']); //Remove html tags
    $cottagetype = str_replace(' ', '', $cottagetype); //remove spaces
    $cottagetype = ucfirst(strtolower($cottagetype)); //Uppercase first letter
    $_SESSION['cottagetypeEdit'] = $cottagetype; //Stores last name into session variable

    //Mobile Number
    
    //email
    $checkin = strip_tags($_POST['checkinEdit']); //Remove html tags
    $checkin = str_replace(' ', '', $checkin); //remove spaces
    $checkin = strtolower($checkin); //Uppercase first letter
    $_SESSION['emailEdit'] = $checkin; //Stores email into session variable

    //email
    $checkout = strip_tags($_POST['checkoutEdit']); //Remove html tags
    $checkout = str_replace(' ', '', $checkout); //remove spaces
    $checkout = strtolower($checkout); //Uppercase first letter
    $_SESSION['checkoutEdit'] = $checkout; //Stores email into session variable

    //email
    $adultnum = strip_tags($_POST['adultEdit']); //Remove html tags
    $adultnum = str_replace(' ', '', $adultnum); //remove spaces
    $adultnum = strtolower($adultnum); //Uppercase first letter
    $_SESSION['adultEdit'] = $adultnum; //Stores email into session variable

    //email
    $childrennum = strip_tags($_POST['childrenEdit']); //Remove html tags
    $childrennum = str_replace(' ', '', $childrennum); //remove spaces
    $childrennum = strtolower($childrennum); //Uppercase first letter
    $_SESSION['childrenEdit'] = $childrennum; //Stores email into session variable

    //Id
    $id = strip_tags($_POST['id']); //Remove html tags
    $id = str_replace(' ', '', $id); //remove spaces
    $_SESSION['id'] = $id; //Stores email into session variables
    
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE reservation SET cottagetype='$cottagetype', checkin='$checkin', checkout='$checkout', adult='$adultnum', children='$childrennum' WHERE id=$id");

        //Clear Session Variables
        $_SESSION['cottagetypeEdit'] = "";
        $_SESSION['checkinEdit'] = "";
        $_SESSION['emailEdit'] = "";
        $_SESSION['checkoutEdit'] = "";
        $_SESSION['adultEdit'] = "";
        $_SESSION['childrenEdit'] = "";
        $_SESSION['id'] = "";
    } 
    //-- End of Error Validation --//
} //-- End Register Button --//