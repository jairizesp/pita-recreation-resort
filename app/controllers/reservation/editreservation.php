<?php
//-- Declaring variables to prevent errors --//
    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['editreservation'])) {

    $id = $_POST['id'];
    $cottagetype = $_POST['rooms'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement


        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE reservation SET cottagetype='$cottagetype', checkin='$checkin', checkout='$checkout', adult='$adult', children='$children' WHERE id=$id");

    } 
    //-- End of Error Validation --//
} //-- End Register Button --//