<?php
     require '../../app/config/connect.php';
     if(isset($_POST['ticket'])){
     	$ticket = $_POST['ticket'];
     	$dpayment =$_POST['downpayment'];
     	$refnum =$_POST['refnum'];
     	$downpayment ="UPDATE temp_reservation SET downpayment='$dpayment',ref_num='$refnum' where reservation_token='$ticket'";
     	$result = mysqli_query($con,$downpayment);
     	if($result===TRUE){
     		header('location:../reservation_status.php?success=paid');
     	}else{

     	}
     }
 ?>