<?php
$sql_entrance = "SELECT * FROM rate_fee";
$result2 = $con->query($sql_entrance);
if ($result2->num_rows > 0) {
  $row =$result2->fetch_assoc();
  $adult_fee = $row['adult_rate'];
  $kids_fee =$row['kids_rate'];
}


if(isset($_POST['walkinguest']))
{
$name =$_POST['name'];
$adult=$_POST['adult'];
$kids=$_POST['kids'];
$from_date =$currentDate;
$to_date =$_POST['to_date'];
$from_date= date('Y-m-d', strtotime($from_date));
$to_date= date('Y-m-d', strtotime($to_date));

$difference = strtotime($from_date) - strtotime($to_date);
          $days = abs($difference/(60 * 60)/24);
if($kids==''){
	$kids = 0;
}
 if($days>1){

    $sql_insert="INSERT INTO reservation set name_guest='$name',checkin='$from_date',checkout='$to_date',adult='$adult',children='$kids',approvalstatus='Approved', restype='Walkin', approve_by='Frontdesk'";
           if ($con->query($sql_insert) === TRUE) {
           }else{
            echo $con->error;
           }
 }elseif($days == 1 || $days == 0){
 	$adult_rate =$adult * $adult_fee;
 	$kids_rate =$kids * $kids_fee;
 	$total_payment =$adult_rate + $kids_rate;
 	$sql_insert="INSERT INTO reservation set name_guest='$name',checkin='$from_date',checkout='$to_date',adult='$adult',children='$kids',approvalstatus='Approved',balance='$total_payment', restype='Walkin', approve_by='Frontdesk'";
           if ($con->query($sql_insert) === TRUE) {

           }else{
            echo $con->error;
           }
 }
//end $days>1

}elseif(isset($_POST['add_rc'])){
	$balance=$_POST['balance'];
	$guestid=$_POST['guestid'];
	$roomid=$_POST['roomid'];
	$from_date=$_POST['checkin'];
	$to_date=$_POST['checkout'];
	$cottageid=$_POST['cottageid'];
$difference = strtotime($from_date) - strtotime($to_date);
          $days = abs($difference/(60 * 60)/24);

	$insert_rc="INSERT rooms_walkin set id='$guestid',roomid='$roomid',cottageid='$cottageid'";
	if($con->query($insert_rc) === TRUE){



		if($roomid !='' AND $cottageid!=''){
$select_r_price ="SELECT price FROM rooms where id='$roomid'";
			$result_price = $con->query($select_r_price);
			$r_price =$result_price->fetch_assoc();
			$room_price = $r_price['price'] * $days;

			$select_c_price ="SELECT cottage_price FROM cottages where id='$cottageid'";
			$cottage_price = $con->query($select_c_price);
			$c_price =$cottage_price->fetch_assoc();
			$cot_price =$c_price['cottage_price'] * $days;

			$update_r ="UPDATE rooms set Status='Unavailable',checkin='$from_date',checkout='$to_date' where id='$roomid'";
			$result_room = $con->query($update_r);

			$update_c ="UPDATE cottages set status='Unavailable' where id='$cottageid'";
			$result_cottage = $con->query($update_c);


			$new_balance = $balance + $room_price + $cot_price;
		$update_balance="UPDATE reservation set balance='$new_balance' where id ='$guestid'";
		$updated_balance = $con->query($update_balance);

		}elseif($roomid !='' AND $cottageid ==''){
			$select_r_price ="SELECT price FROM rooms where id='$roomid'";
			$result_price = $con->query($select_r_price);
			$r_price =$result_price->fetch_assoc();
			$room_price = $r_price['price'] * $days;



$update_r ="UPDATE rooms set Status='Unavailable',checkin='$from_date',checkout='$to_date' where id='$roomid'";
			$result_room = $con->query($update_r);


	$new_balance = $balance + $room_price ;
		$update_balance="UPDATE reservation set balance='$new_balance' where id ='$guestid'";
		$updated_balance = $con->query($update_balance);

		}elseif($roomid =='' AND $cottageid !=''){

			$select_c_price ="SELECT cottage_price FROM cottages where id='$cottageid'";
			$cottage_price = $con->query($select_c_price);
			$c_price =$cottage_price->fetch_assoc();
			$cot_price =$c_price['cottage_price'] * $days;
$update_c ="UPDATE cottages set status='Unavailable' where id='$cottageid'";
			$result_cottage = $con->query($update_c);

			$new_balance = $balance + $cot_price ;
		$update_balance="UPDATE reservation set balance='$new_balance' where id ='$guestid'";
		$updated_balance = $con->query($update_balance);
		}
	}
	//if insert walkin end
}elseif(isset($_POST['checkoutwalk'])){
	$mop=$_POST['mop'];
	$remaining=$_POST['remaining'];
$idd =$_POST['res_id'];
	$update_balance="UPDATE reservation set approvalstatus='Checkout',balance='0',Total_paid='$remaining',status='$mop', approve_by='Frontdesk' where id ='$idd'";
		if($updated_balance = $con->query($update_balance) ===TRUE){

			$room_scan ="SELECT * FROM rooms_walkin where id='$idd'";
			   $res_walkin = $con->query($room_scan);
                         if ($res_walkin->num_rows > 0) {
                   while ($walkin_id = $res_walkin->fetch_assoc()) {
                         $sroomid =$walkin_id['roomid'];
                         $scotid=$walkin_id['cottageid'];

                   $update_sroom ="UPDATE rooms set Status='Available',checkin=NULL,checkout=NULL where id in(SELECT roomid from rooms_walkin where id='$idd')";
                   $uupdate_sroom= $con->query($update_sroom);
               
               $update_cott ="UPDATE cottages set status='Available' where id in(SELECT cottageid from rooms_walkin where id='$idd')";
                   $uupdate_scott= $con->query($update_cott);
                   

                              }
                          }
		}

}

 ?>