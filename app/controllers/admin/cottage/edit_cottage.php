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

    //Mobile Number
    
    //email
    $price = strip_tags($_POST['priceEdit']); //Remove html tags

    //email
    //Id
    $id = strip_tags($_POST['id']); //Remove html tags
    $id = str_replace(' ', '', $id); //remove spaces
    $_SESSION['id'] = $id; //Stores email into session variables
    $img_name = $_FILES['imageedit']['name'];
    $img_size = $_FILES['imageedit']['size'];
    $tmp_name = $_FILES['imageedit']['tmp_name'];
    $error = $_FILES['imageedit']['error'];
    if($img_name ==''){
 //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE cottages SET cottage_name='$service_name', cottage_price='$price' WHERE id=$id");
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
                move_uploaded_file($tmp_name, "../reservation/uploads/$new_img_name");
 //Insert Data to database
        $query1 = mysqli_query($con, "UPDATE cottages SET cottage_name='$service_name', cottage_price='$price',cottge_img='$new_img_name' WHERE id=$id");

                }else {
                $em = "You can't upload files of this type";
                header("Location: cottage.php?error=$em");
            }
}
}else {
        $em = "unknown error occurred!";
        header("Location: cottage.php?error=$em");
    }

    }

    //-- End of Error Validation --//
} //-- End Register Button --//