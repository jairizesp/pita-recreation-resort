<?php
//-- Declaring variables to prevent errors --//
$servicename = "";
$description ="";
$image = "";
$radiobutton = "";
$error_array = array();

if (isset($_POST['ratebutton'])) {      
    if (isset($_POST['rating'])) { // checks if radio is set

        if($_POST['rating'] == 1) {
         $radiobutton = 1;
        }elseif ($_POST['rating'] == 2) {
         $radiobutton = 2;
        }elseif ($_POST['rating'] == 3) {
         $radiobutton = 3;
        }elseif ($_POST['rating'] == 4) {
            $radiobutton = 4;
        }elseif ($_POST['rating'] == 5) {
            $radiobutton = 5;
        } else { 
            $radiobutton = 0;
        }
    }

    if("" == trim($_POST['name'])){
        $_SESSION['ratings'] = $radiobutton;
        header("Location: login.php");
        exit();
    } 
    else {
        //-- Registration form values --//
        //cottagetype
        $name = strip_tags($_POST['name']); //Remove html tags
        $roomid = strip_tags($_POST['roomid']); //Remove html tags




        

        //-- Start of Error Validation --//
        if (empty($error_array)) { //If No Error Statement

            //Insert Data to database
            $query1 = mysqli_query($con, "INSERT INTO `ratings` (room_id, name, rating) 
            VALUES ('$roomid', '$name', '$radiobutton')");

            $sql = "SELECT * FROM ratings WHERE room_id=$roomid";
            $result = $con->query($sql);
            $rowcount=mysqli_num_rows($result);
            
            $average="";
            $sql2="SELECT AVG(rating) AS average FROM ratings WHERE room_id=$roomid";
            $result1 = $con->query($sql2);
            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {
                    $average = $row1['average'];
                }
            }

            //Insert Data to database
            $query1 = mysqli_query($con, "UPDATE rooms SET reviews='$rowcount', average_rating='$average' WHERE id=$roomid");

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } 
    }
}
//-- Start Register Button --//