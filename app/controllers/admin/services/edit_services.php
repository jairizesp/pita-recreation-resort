<?php
//-- Declaring variables to prevent errors --//
    $service_name =  "";               
    $price = "";
    $description = "";
    $image = "";
    $id = "";
    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['editbutton'])) {

    //-- Registration form values --//

    //Last name
    $service_name = strip_tags($_POST['service_nameEdit']); //Remove html tags
    $service_name = str_replace(' ', '', $service_name); //remove spaces
    $service_name = ucfirst(strtolower($service_name)); //Uppercase first letter
    $_SESSION['service_nameEdit'] = $service_name; //Stores last name into session variable

    //Mobile Number
    
    //email
    $price = strip_tags($_POST['priceEdit']); //Remove html tags
    $price = str_replace(' ', '', $price); //remove spaces
    $price = strtolower($price); //Uppercase first letter
    $_SESSION['priceEdit'] = $price; //Stores email into session variable

    //email
    $description = strip_tags($_POST['descriptionEdit']); //Remove html tags
    $description = str_replace(' ', '', $description); //remove spaces
    $description = strtolower($description); //Uppercase first letter
    $_SESSION['descriptionEdit'] = $description; //Stores email into session variable

    //email
    

    //Id
    $id = strip_tags($_POST['id']); //Remove html tags
    $id = str_replace(' ', '', $id); //remove spaces
    $_SESSION['id'] = $id; //Stores email into session variables
    
    
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE services SET service_name='$service_name', price='$price', description='$description' WHERE id=$id");

        //Clear Session Variables
        $_SESSION['service_nameEdit'] = "";
        $_SESSION['priceEdit'] = "";
        $_SESSION['descriptionEdit'] = "";
        $_SESSION['id'] = "";
    } 
    //-- End of Error Validation --//
} //-- End Register Button --//