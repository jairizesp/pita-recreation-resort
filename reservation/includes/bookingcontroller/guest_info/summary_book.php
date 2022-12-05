          <center>
              <br>
            <span class="summaryselect" style="font-size:20px;">SELECTED ROOMS</span><br>
          </center>
          <hr>
                        <?php
              $start_d = $_GET['start_date'];
          $end_d = $_GET['end_date'];
            $difference = strtotime($start_d) - strtotime($end_d);
          $days = abs($difference/(60 * 60)/24);
             ?>
             <center>
              <span class="">
                
                  <span><b> Number of Pax:</b> <?php echo $_GET['pax'] ?></span><br>
                <b>Stay-in Date: </b><?php echo $start_d; ?> - <?php echo $end_d; ?><br>
                <b>Stay-in Days: </b><?php if($days == 0){ ?>
                Day Tour
                 <?php }else{ ?>
              <?php echo $days ?>
      <?php } ?></p>
                     </span> 
                   </center>
              <div class="mb-1"></div>

                                  <?php 
          $start_d = $_GET['start_date'];
          $end_d = $_GET['end_date'];
$disp_rooms ="SELECT * FROM rooms where id in (SELECT roomid from selected_rooms where userid='$currentuser' AND (start_date ='$start_d' AND end_date ='$end_d'))";
  $result2 = $con->query($disp_rooms);
     if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                   $difference = strtotime($start_d) - strtotime($end_d);
          $days = abs($difference/(60 * 60)/24);
          $subtotal = $days * $row['price'];
          ?>

            <div class="book_div mb-1" style="color:black;">
                                  <div class="row">
  <div class="col-md-6 col-sm-12" style="text-align:left;">

<p>
<b><?php echo $row['room_name'] ?><a>:</a></b> <a> (</a><?php echo $row['room_type'] ?><a>)</a>
<br>
    <br>
    <br>


</p>
  </div>
  <div class="col-md-6 col-sm-12" style="text-align:bottom-right;">

      <p> Price: <?php echo $row['price'] ?><br>

    <b>Sub Total:</b>
      
<b>Php <?php if($days == 0){ ?>
<?php echo 1 * $row['price'] ?>
      <?php }else{ ?>
<?php echo $days * $row['price'] ?>
      <?php } ?></b><br>
 <input type="text" name="start_d" value="<?php echo $_GET['start_date'] ?>" hidden>
        <input type="text" name="end_d" value="<?php echo $_GET['end_date'] ?>" hidden>
  <input type="text" name="removeid" value="<?php echo $row['id'] ?>" hidden>
  </div>
    </div>
</div>

  <?php }} ?>

   <?php 
          $start_d = $_GET['start_date'];
          $end_d = $_GET['end_date'];
$disp_cottage ="SELECT * FROM cottages where id in (SELECT cottage_id from selected_cottage where userid='$currentuser' AND (from_date ='$start_d' AND to_date ='$end_d'))";
  $result2 = $con->query($disp_cottage);
     if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $difference = strtotime($start_d) - strtotime($end_d);
          $days = abs($difference/(60 * 60)/24);
    ?>
    <form method="post">
    <div class="book_div mb-1" style="color:black;">
  <div class="row">
   <div class="col-md-6" style="text-align:left;">
     <b> Cottage Name:</b><br> <?php echo $row['cottage_name'] ?> <br>
     Days:<?php if($days == 0){ ?>
<br>Day Tour
      <?php }else{ ?>
<?php echo $days ?>
      <?php } ?>
    </div>
    <div class="col-md-6" style="text-align:right;">
      <b> Price:</b> <br><b>PHP<?php echo $row['cottage_price'] ?></b> <br>
      <b>Sub total:<br><?php if($days == 0){ ?>
<?php echo 1 * $row['cottage_price'] ?>
      <?php }else{ ?>
<?php echo $days * $row['cottage_price'] ?>
      <?php } ?></b><br>
 <button class="btn btn-sm" type="submit" name="remove_cottage">remove</button>
      <input type="text" name="cottageid" value="<?php echo $row['id'] ?>" hidden>
       <input type="text" name="start_d" value="<?php echo $_GET['start_date'] ?>" hidden>
        <input type="text" name="end_d" value="<?php echo $_GET['end_date'] ?>" hidden>
    </div>
    </div>
  </div>
</form>
  <?php }} ?>
<div class="book_div_total">
 <?php 
$start_d = $_GET['start_date'];
$end_d = $_GET['end_date'];
 $difference = strtotime($start_d) - strtotime($end_d);
          $days = abs($difference/(60 * 60)/24);
$sql_total="SELECT *, SUM(price) as total FROM rooms where id in (SELECT roomid from selected_rooms where userid='$currentuser' AND (start_date ='$start_d' AND end_date ='$end_d'))";
  $result4 = $con->query($sql_total);
     if ($result4->num_rows > 0) {

      $cottage_total ="SELECT *, SUM(cottage_price) as cot_total from cottages where id in(SELECT cottage_id from selected_cottage where userid='$currentuser' AND (from_date='$start_d'AND to_date='$end_d'))";
      $result5 = $con->query($cottage_total);
      if ($result5->num_rows > 0) {
        if ($result5->num_rows > 0) {
        $row=$result5->fetch_assoc();
      if($days == 0 ){
  $cot_total =$row['cot_total'] * 1;

      }else{
  $cot_total =$row['cot_total'] * $days;

      }
            }
      }
                while ($total = $result4->fetch_assoc()) { 
        if($days ==0){
                      $room_total = $total['total'] * 1;
                      $total_all = $room_total + $cot_total;
          $total_wrooms=$total_all;
                  }else{


          $room_total = $total['total'] * $days;
          $total_all = $room_total + $cot_total;
          $total_wrooms=$total_all;
              }
                  ?>

<div class="row">
  <?php
$sql_scan="SELECT * FROM selected_rooms where userid='$currentuser'";
$result = $con->query($sql_scan);
 if ($result->num_rows > 0 && $days >0) { ?>
  <div class="col-md-6" style="text-align:left;">
    
      <b style="font-size: 25px;">Total Price:</b>
      <br>

    </div>
        <div class="col-md-6" style="text-align:left;">
          
          
          <b style="font-size: 25px;">PHP </b><b style="font-size: 25px;"><?php echo $total_wrooms; ?>.00</b>
          

        </div>
        </div>
         <?php }else if($result->num_rows > 0 && $days ==1){ ?>

          a
 <?php }else{ ?>
     <div class="col-md-12 row">
    <div class="col-md-6" style="text-align:left;">
      <br>
      Adults:  <?php echo $_SESSION['adults']; ?><br>
      Kids: <?php echo $_SESSION['kids']; ?><br>
Total Pax:<br> <?php echo $_SESSION['pax']; ?>
</div>
<div class="col-md-6" style="text-align:right;">
  Subtotal: <br>
PHP <?php echo $adults_rate ?><br>
PHP <?php echo $kids_rate ?><br>

Pax subtotal:<br> PHP <?php echo $adults_rate ?>
</div>
  </div>
 
  

    <div class="col-md-6" style="text-align:left;">
      <b>Total Price</b>
      <br>

    </div>
        <div class="col-md-6" style="text-align:right;">
          <b>PHP</b><br>
          <p><?php echo $total_all + $adults_rate + $kids_rate; ?>.00</p>
        </div>
</div>
                <?php }} 
              } ?>
</div>
         <div class="book_div_next mb-1">
          <center><a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date'] ?>&search=&pax=<?php echo $_GET['pax'] ?>">CHANGE ROOM</a></center>

         </div>
         <style type="text/css"></style>