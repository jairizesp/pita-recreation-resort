
           <center>
              <br>
            <span class="summaryselect text-white">PAYMENT BREAKDOWNS</span><br>
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
                <b>Stay-in Date:</b><?php echo $start_d; ?> - <?php echo $end_d; ?> <br> 

                <a href="#" data-toggle='modal' data-target='#changedate' style="color:white;">Change Date</a>
<!-- The Modal -->
<div class="modal fade" id="changedate">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
    

      <!-- Modal body -->
      <form method="post">
            <div class="modal-body">
              <input type="text" name="start_d" value="<?php echo $_GET['start_date']; ?>" hidden>
              <input type="text" name="end_d" value="<?php echo $_GET['end_date']; ?>" hidden>
              <input type="text" name="pax" value="<?php echo $_GET['pax']; ?>" hidden>
        <h1>Are you sure you want to change Date?</h1>
        <p></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="submit" name="change_date" class="btn btn-primary btn-sm">Yes</button>
       </form>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>
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
          if($days == 0){
$subtotal = 1 * $row['price'];
          }else{
              $subtotal = $days * $row['price'];
          }
        
          ?>
        <form  method="post" action="includes/bookingcontroller/remove_room.php">
            <div class="book_div mb-1" style="color:black;">

                                  <div class="row">
  <div class="col-md-6 col-sm-12" style="text-align:left;">
<b><?php echo $row['room_name'] ?></b><br>
<p><?php echo $row['room_type'] ?><br>
Price: <?php echo $row['price'] ?><br>
Stay-in Days: <?php if($days == 0){ ?>
<br>Day Tour
      <?php }else{ ?>
<?php echo $days ?>
      <?php } ?></p>

  </div>
  <div class="col-md-6 col-sm-12" style="text-align:right;">
<b>Subtotal:</b><br>
<b>PHP <?php echo $subtotal ?></b><br>
 <input type="text" name="start_d" value="<?php echo $_GET['start_date'] ?>" hidden>
        <input type="text" name="end_d" value="<?php echo $_GET['end_date'] ?>" hidden>
  <input type="text" name="removeid" value="<?php echo $row['id'] ?>" hidden>
  <input type="text" name="pax" value="<?php echo $_GET['pax'] ?>" hidden>
<button class="btn btn-sm" type="submit" name="remove_room" style="color:red">remove</button>
  </div>
    </div>
</div>
</form>
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
        $row=$result5->fetch_assoc();
      if($days == 0 || $days == 1 ){
  $cot_total =$row['cot_total'] * 1;

      }else{
  $cot_total =$row['cot_total'] * $days;

      }
            }
                while ($total = $result4->fetch_assoc()) { 
                  if($days == 0 || $days == 1){
                      $room_total = $total['total'] * 1;
                      $total_all = $room_total + $cot_total;
          $total_wrooms=$total_all + $adults_rate + $kids_rate;;
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
 if (($result->num_rows > 0 && $days > 1) || ($result->num_rows == 0 && $days > 1) ) { ?>
   <div class="col-md-6" style="text-align:left;">
      <b>Total Price</b>
      <br>

    </div>
        <div class="col-md-6" style="text-align:right;">
          <b>PHP</b><br>
          <p><?php echo $total_wrooms; ?>.00</p>
        </div>
       
 <?php }else if(($result->num_rows == 0 &&  $days == 1) || ($result->num_rows == 0 &&  $days == 0) || ($result->num_rows > 0 &&  $days == 0) || ($result->num_rows > 0 &&  $days == 1) ){ ?>
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
          <p><?php echo $total_wrooms ?>.00</p>
        </div>

                <?php } ?>
                </div>
           <?php   } 
              } ?>
</div>
<?php
$SQL_SCAN ="SELECT * FROM selected_rooms where userid='$currentuser' AND (start_date='$start_d' AND end_date='$end_d')";
 $result2 = $con->query($SQL_SCAN);
     if ($result2->num_rows > 0 ) { ?>
        <div class="book_div_next">
          <center><a type="button" class="" id='showdiv'>ADD COTTAGE</a></center>

         </div>
          <div class="book_div_next mb-1">
          <form method="post">
          <input type="text" name="total_payment" value="<?php echo $total_wrooms ?>" hidden> 
          <center><button type="submit" name='submittotal' style="background:transparent; border:0px;color:white;">PROCEED TO NEXT STEP</button></center>
          </form>

         </div>
                <?php }else if($result2->num_rows == 0){ ?>
           <div class="book_div_next">
          <center><a type="button" class="" id='showdiv'>ADD COTTAGE</a></center>
         </div>
          <div class="book_div_next mb-1">
          <center> 
           <a class="disabled" href="#" data-toggle='modal' data-target='#info'>PROCEED TO NEXT STEP</a></center>


         </div>


         <!-- The Modal -->
<div class="modal fade" id="info">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header btn-danger">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <center><H2> YOU MUST SELECT A ROOM FIRST TO PROCEED</H2></center>
      <b>Note:</b> This is a reservation, you must select a room to proceed.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        <?php } ?>