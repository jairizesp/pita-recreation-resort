<?php
    require '../../../app/config/connect.php';
        $_SESSION['success']=='';
if(isset($_POST['add_room'])){
	$pax=$_POST['pax'];
	$room =$_POST['roomid'];
	$userid =$_POST['userid'];
	$start_d =$_POST['start_d'];
	$end_d =$_POST['end_d'];
	$scan_rooms ="SELECT * FROM selected_rooms where roomid ='$room' AND (start_date='$start_d' AND end_date='$end_d')";
	  $result2 = $con->query($scan_rooms);
	     if ($result2->num_rows > 0) {
	     	header('location:../../book.php?return=existing&start_date='.$start_d.'&end_date='.$end_d.'&search=&pax='.$pax);

	     }else{
	$select_room ="INSERT INTO selected_rooms set userid='$userid',roomid='$room',status='Pending',start_date='$start_d',end_date='$end_d'";
	$result = mysqli_query($con, $select_room);
	header('location:../../book.php?return=success&start_date='.$start_d.'&end_date='.$end_d.'&search=&pax='.$pax);
}
$con->close();
}



 ?>