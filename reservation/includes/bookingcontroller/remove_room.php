<?php
    require '../../../app/config/connect.php';
if(isset($_POST['remove_room']))
{	
		$start_d =$_POST['start_d'];
	$end_d =$_POST['end_d'];
	$removeid = $_POST['removeid'];
	$pax=$_POST['pax'];
	$remove ="DELETE FROM selected_rooms where roomid='$removeid' AND (start_date='$start_d' AND end_date='$end_d')";
		if ($con->query($remove) === TRUE) {
				header('location:../../book.php?start_date='.$start_d.'&end_date='.$end_d.'&search=&pax='.$pax);
		}else{
				header('location:../../book.php?error=error&start_date='.$start_d.'&search=&end_date='.$end_d.'&pax='.$pax);
		}
$con->close();
}

 ?>