<?php

//-- Declaring variables to prevent errors --//
$date = "";
$name = "";
$checkin = "";
$checkout = "";
$cottagetype = "";
$adultnum = "";
$childrennum = "";
$expenses = 0;
$roomnumber = 0;
$sampleint = 0;
$roomprice = 0;
$adulttotalprice = 0;
$childrentotalprice = 0;
$currentuseremail = "";
$error_array = array();
$servicesavailed = array();
$servicesavailedprices = array();


if (isset($_POST['reservebutton'])) {       
        //-- Registration form values --//
        //cottagetype
        $cottagetype = strip_tags($_POST['cottage']); //Remove html tags
    
        $cottagenum = strip_tags($_POST['cottagenum']);
        //$looplength = $_POST['loopservice'];
    
        //$service = $_POST['service0'];
    
        $resdervationid = $_POST['reservationid'];

        $checkincottage = "";
        $checkoutcottage ="";
        $totalexpenses =0;



        $sqlquery2 = "SELECT * FROM reservation WHERE id='$resdervationid'";
        $result2 = $con->query($sqlquery2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $checkincottage = $row2['checkin'];
                $checkoutcottage = $row2['checkout'];
                $totalexpenses += $row2['expenses'];
            }
        }

        
        //check in 
        $checkindatewhole = $checkincottage;
        $checkin = strtotime($checkincottage); //Remove html tags
        $checkindate=date('d',$checkin);
        $checkinmonth=date('m',$checkin);
        $checkinyear=date('Y',$checkin);
    
        //check out 
        $checkoutdatewhole = $checkoutcottage;
        $checkout = strtotime($checkoutcottage); //Remove html tags
        $checkoutdate=date('d',$checkout);
        $checkoutmonth=date('m',$checkout);
        $checkoutyear=date('Y',$checkout);

            
        $checkindatesample=date('Y-m-d', strtotime($checkindatewhole));
        $checkoutdatesample=date('Y-m-d', strtotime($checkoutdatewhole));

        $date1 = new DateTime($checkindatewhole);
        $date2 = new DateTime($checkoutdatewhole);
        $checkdifference = date_diff($date1, $date2);
        $diffDays = intval($checkdifference->format("%d"));
    

        $sql3="SELECT * FROM cottages WHERE cottage_name='$cottagetype'";
        $result3 = $con->query($sql3);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                $roomprice += $row3['cottage_price'];
                $expenses = ($diffDays * $row3['cottage_price']);
            }
        }

        $sqlquery1 = "SELECT * FROM cottage_availed WHERE cottage_name='$cottagetype' and room_no='$cottagenum'";
        $result1 = $con->query($sqlquery1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                
                //echo $paymentDate; // echos today! 
                $checkindateindatabase = date('Y-m-d', strtotime($row1['check_in']));
                $checkoutdateindatabase = date('Y-m-d', strtotime($row1['check_out']));
                    
                if (($checkindatesample >= $checkindateindatabase) && ($checkindatesample <= $checkoutdateindatabase)){
                    array_push($error_array, "Cottage type and Cottage Number is Occupied!<br>");
                }
                else if (($checkoutdatesample >= $checkindateindatabase) && ($checkoutdatesample <= $checkoutdateindatabase)){
                    array_push($error_array, "Cottage type and Cottage Number is Occupied!<br>");
                }
                else{
    
                }
            }
        }   


        $expensesupdate = $totalexpenses + $expenses;
    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        //Insert Data to database
        $query1 = mysqli_query($con, "INSERT INTO `cottage_availed` (reservation_id, cottage_name, room_no, check_in, check_out, expenses) 
        VALUES ('$resdervationid', '$cottagetype', '$cottagenum', '$checkincottage', '$checkoutcottage','$expenses')");

        $query2 = mysqli_query($con, "UPDATE reservation SET expenses='$expensesupdate' WHERE id='$resdervationid'");

        header("Location: ../user/profile.php");
        exit();
    } 
}
//-- Start Register Button --//
