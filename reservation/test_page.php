<?php 
    require '../app/config/connect.php';
$ticket = $_POST['ticket'];
$name = $_POST['fullname'];
$mnum =$_POST['mobilenum'];
$email=$_POST['email'];
$adults=$_POST['adults'];
$kids =$_POST['kids'];
$arrival=$_POST['arrival'];

$update_temp ="UPDATE temp_reservation set name='$name',mobile_num='$mnum',email='$email',num_adult='$adults',num_kids='$kids' where reservation_token='$ticket' ";
	$result = mysqli_query($con, $update_temp);
			if($result == true){
				header('location:confirmation.php?ticket='.$ticket);
			}else{

			}


?>