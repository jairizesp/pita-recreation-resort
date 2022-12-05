<?php
session_start();

function build_calendar($month,$year){
  date_default_timezone_set('Asia/Manila');

$display= date('g:i:a  ');
 $mysqli = new mysqli('localhost','root','','reservationsystem1');

    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');
   
    $prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month = date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year = date('Y',mktime(0,0,0,$month+1,1,$year));
    $calendar = "<h4>$monthName $year $display </h4>"; 
    $calendar.= "<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
    $calendar.= "<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar.= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=".$next_year."'>Next Month</a>";
    $calendar.= "<table class='table table bordered' border='2px'>";
    $calendar .= "<tr>";

    foreach($daysOfWeek as $day) { 
     $calendar .= "<th class='headers'>$day</th>"; 
} 
$calendar.="<tr><tr>";
$currentDay =1;
if($dayOfWeek >0){
    for($k=0;$k < $dayOfWeek; $k++){
        $calendar.="<td class='empty'></td>";

    }
}
$month = str_pad($month,2,"0",STR_PAD_LEFT);
while ($currentDay <= $numberDays) {
    if($dayOfWeek == 7){
        $dayOfWeek =0;
        $calendar.="</tr><tr>";
    }

$currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
$date="$year-$month-$currentDayRel";
$dayName = strtolower(date('l',strtotime($date)));
$eventNum =0;
$disable = 5;
$today =$date==date('Y-m-d')?'today':'';
$disableddates = '2021-07-21';
if($date<date('Y-m-d')){
        $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
}
elseif ($date<=$today) {
  $calendar.="<td style='background-color:#bfc4dc;'><h6>$currentDay</h6>Today";
}
elseif($date == $disableddates){
     $calendar.="<td><h6>$currentDay</h6><button class='btn btn-info btn-xs'>Eid al-Adha Day 2</button>";
}elseif($date<date('Y-m-d')){
}
/*elseif(in_array($date,$bookings)){
 $calendar.="<td class='$today'><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Already Booked</button>";
}*/
else{
    $totalbookings = checkSlot($mysqli,$date);
    if($totalbookings ==28 ){
        $calendar.="<td class='$today'><h6>$currentDay</h6><a href='#' class='btn btn-danger btn-xs'>Fully Book</a>"; 
   
    }else{
    $availableslots = 4-$totalbookings; 
    $calendar.="<td class='$today'><h6>$currentDay</h6><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a><small><i><br>$availableslots slots</i></small>"; 
}
}
$calendar.="</td>";
$currentDay++;
$dayOfWeek++;
}
    return $calendar;
}
function checkSlot($mysqli,$rooms){
    $rooms ='Unavailable';
    $stmt = $mysqli->prepare("select * from rooms where Status = ?");
    $stmt->bind_param('s', $rooms);
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $totalbookings++;
            }
            $stmt->close();
        }
    }
    return $totalbookings;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SELECT DATE</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="icon" href="img/paglogo.png" type="image/png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Reservation</title>
    <link rel="icon" href="../ahhh/img/tablogo.png">
</head>
<body>

    <div class="container">
        <div class="row">

<div class="col-md-12 col-sm-12 scroll">
   <?php include'select_date.php';?>
</div>
        </div>
    </div>

   

</body>
</html>
<link rel="stylesheet" href="css/index/dashboard.css">
<script src='js/index/index.js'></script>
<style type="text/css">
/*    .scroll {
  background-color:;
  width: 100%;
  height: 600px;
  overflow-x: hidden;
  overflow-y: auto;

}*/


.table, .btn{
    font-size:15px;
}
#calendar{
    text-align: center;
}
small{
    font-size:15px;
}


</style>

