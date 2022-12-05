<?php
  require '../../app/config/connect.php';
  date_default_timezone_set("Asia/Manila");
if(isset($_POST['userid'])){
  $userid = $_POST['userid'];
  $checkin=$_POST['checkin'];
  $checkout=$_POST['checkout'];
  $adults =$_POST['adults'];
    $kids =$_POST['kids'];
  $refnum = $_POST['refnum'];
  $total_payment = $_SESSION['totalpayment'];
  $partial_payment = $total_payment /2;
  $difference = strtotime($checkin) - strtotime($checkout);
          $days = abs($difference/(60 * 60)/24);

  $sql_reserve ="INSERT INTO reservation set userid='$userid',checkin='$checkin',checkout='$checkout',adult='$adults',children='$kids',balance='$total_payment',expenses='$partial_payment',payment_proof='$refnum',approvalstatus='Pending'";
    $result = mysqli_query($con, $sql_reserve);
    if($result ===TRUE){
      echo'success';

}

}


 ?>