<?php
    require '../app/config/connect.php';

  if (isset($_POST['key2'] )){
    $checkin =date('Y-m-d',strtotime($_POST['key1']));
    $checkout=date('Y-m-d',strtotime($_POST['key2']));

    $show   = "SELECT * FROM rooms WHERE '$checkin' BETWEEN checkin and checkout";
    $query  = mysqli_query($con,$show);
    if(mysqli_num_rows($query)>0){
       $rowcount = mysqli_num_rows($query);
       $show_2 ="SELECT * FROM rooms where checkin is null";
       $query2  = mysqli_query($con,$show_2);
    if(mysqli_num_rows($query2)>0){
        $rowcountt = mysqli_num_rows($query2);
        $available =$rowcountt;
        if($checkin < $checkout){
         echo "<span class='total_rooms'>Total Available Rooms: ".$available."</span>"; 
       }
    }
    }else{
         $show_2 ="SELECT * FROM rooms";
       $query2  = mysqli_query($con,$show_2);
    if(mysqli_num_rows($query2)>0){
        $rowcount2 = mysqli_num_rows($query2);
        $available =$rowcount2;
        if($checkin < $checkout){
         echo "<span class='total_rooms'>Total Available Rooms: ".$available."</span>"; 
       }
    }
    }
}
  ?>
    
