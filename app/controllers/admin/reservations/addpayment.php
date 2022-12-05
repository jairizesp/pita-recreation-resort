<?php
//-- Declaring variables to prevent errors --//
    $payment = "";

    $error_array = array();

//-- Start Register Button --//
if (isset($_POST['paybutton'])) {

    //-- Registration form values --//

    $payment = $_POST['cashPayment'];
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM reservation WHERE id=$id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $updatedbalance = $row['balance'] - $payment;
            $sql1 = mysqli_query($con, "UPDATE reservation SET balance='$updatedbalance' WHERE id=$id");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
} //-- End Register Button --//