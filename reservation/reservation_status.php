<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "114139914852027");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';

     if(isset($_SESSION['login'])){
       $name = $_SESSION['name'];
      $currentuser = $_SESSION['username'];
$sql_user = "SELECT * FROM user where id='$currentuser'";
     $result2 = $con->query($sql_user);
     if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) { 
$username = $row['fname']. " ".$row['lname'];
$contactnum =$row['mobilenum'];
$email =$row['email'];
}
}

if(isset($_POST['cancel'])){
    $userid=$_POST['userid'];
    $cancelid=$_POST['cancelid'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
    $status=$_POST['status'];

    if($status=='Approved'){
      $select_room ="SELECT * FROM selected_rooms where userid='$userid' AND start_date='$checkin'AND end_date='$checkout'";
           $room_res = $con->query($select_room);
           if ($room_res->num_rows > 0) {
        while ($room = $room_res->fetch_assoc()) { 
          $roomid=$room['roomid'];
          $room_update="UPDATE rooms set checkin=NULL,checkout=NULL,Status='Available' where id='$roomid'";
           $res_update =$con->query($room_update);


        }
      }

      $select_cottage ="SELECT * FROM selected_cottage where userid='$userid' AND from_date='$checkin'AND to_date='$checkout'";
           $cot_res = $con->query($select_cottage);
           if ($cot_res->num_rows > 0) {
        while ($cott = $cot_res->fetch_assoc()) { 
          $cottageid=$cott['cottage_id'];
          $cottage_update="UPDATE cottages set status='Available' where id='$cottageid'";
           $cott_update =$con->query($cottage_update);


        }
      }


          $sql_cancel_rerserve="DELETE FROM reservation where id='$cancelid'";
    if ($con->query($sql_cancel_rerserve) === TRUE) {
              /*  header('location:reservation_status.php');*/
              $sql_remove_room="DELETE from selected_rooms where userid='$userid' AND (start_date='$checkin' AND end_date='$checkout')";
                if ($con->query($sql_remove_room) === TRUE){ 
                    
        }
  $sql_remove_cott="DELETE from selected_cottage where userid='$userid' AND (from_date='$checkin' AND to_date='$checkout')";
                if ($con->query($sql_remove_cott) === TRUE){ 
                    
        }

    }

    }else{
               $sql_cancel_rerserve="DELETE FROM reservation where id='$cancelid'";
    if ($con->query($sql_cancel_rerserve) === TRUE) {
              /*  header('location:reservation_status.php');*/
              $sql_remove_room="DELETE from selected_rooms where userid='$userid' AND (start_date='$checkin' AND end_date='$checkout')";
                if ($con->query($sql_remove_room) === TRUE){ 
                    
        }
          $sql_remove_cott="DELETE from selected_cottage where userid='$userid' AND (from_date='$checkin' AND to_date='$checkout')";
                if ($con->query($sql_remove_cott) === TRUE){ 
                    
        }


    }
    }


}
?>

<html>
    <head>
    <link rel="stylesheet" href="../app/css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="../app/css/reservation.css" />
    
    <link rel="stylesheet" href="../ahhh/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../ahhh/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Reservation Status</title>
    <link rel="icon" href="../ahhh/img/tablogo.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    </head>
    <style>
    .content{
        align-items: center;
        justify-content: center;
            
    }
        .nemu{
            
            border-radius: 25px;
            
        }
        .datos{
            padding: 20px;
            margin: 20px;
            box-shadow: 2px 2px 11px -2px rgba(0,0,0,0.75);
            -webkit-box-shadow: 2px 2px 11px -2px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 2px 11px -2px rgba(0,0,0,0.75);
            display: flex;
            width: 40%;
            height: 100vh;
            
        }
        
        
    </style>
    <body>
    <?php
        include "../navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-size: cover; height: 100vh; max-height: 140px;">
        <div class="container ">
        <center>
        </div>
    </div>
    </div>
            <h3 class="heading1" style="text-align:center;">            
RESERVATION STATUS </h3>
    <section class="section visit-section">
<div class="container">
<div class="row">
   <div class="col-md-12">
 <table id="example1" class="table table-hover">
                  <thead>
                  <tr class='text-center'>
              <th>Guest Name</th>
              <th>Contact Number</th>
              <th>Email</th>
               <th>Checkin</th>
                <th>Checkout</th>
                <th>Status</th>
                 <th>Action</th>
                  </tr>
                  </thead>
         <tbody>
              <?php 
$temp ="SELECT * from reservation where userid='$currentuser' AND (approvalstatus='Approved' OR approvalstatus='Pending' OR (approvalstatus='Checkout' AND rated='0'))";
     $result2 = $con->query($temp);
     if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) { 
          ?>

          <tr>
<td><?php echo $username ?></td>
<td><?php echo $contactnum ?></td>
<td><?php echo $email ?></td>
<td><?php echo $row['checkin'] ?></td>
<td><?php echo $row['checkout'] ?></td>
<td><?php echo $row['approvalstatus'] ?></td>
<td>
    <?php if($row['approvalstatus'] =='Pending'){ ?>
<a href="view_reservation.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
<a href="#" data-toggle='modal' data-target='#cancel<?php echo $row['id']?>' class="btn btn-warning btn-sm"><i class="fa fa-close"></i></a>
  <?php }elseif($row['approvalstatus']=='Approved'){ ?>
    <a href="view_reservation.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm">View</a>
    <a href="#"data-toggle='modal' data-target='#checkout<?php echo $row['id']?>' class="btn btn-info btn-sm">Checkout</a>
<a href="#" data-toggle='modal' data-target='#cancel<?php echo $row['id']?>' class="btn btn-warning btn-sm text-white"><b>Cancel</b></i></a>
  <?php }elseif($row['approvalstatus'] =='Checkout' and $row['rated'] =='0'){ ?>    
    <a href="../user/user_feedback.php?refnum=<?php echo $row['payment_proof']?>" class="btn btn-info btn-sm">Rate</a>
      <a href="#" class="btn btn-danger btn-sm">Delete</a>
  <?php } ?>
    

</td>
          </tr>
          <!-- The Modal -->
<div class="modal fade" id="cancel<?php echo $row['id']?>">
  <div class="modal-dialog">
    <div class="modal-content">
<form method="post">
      <!-- Modal Header -->
      <div class="modal-header btn-danger">
        <h4 class="modal-title">Cancel Reservation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <center>
       <h3>Are you sure you want to Cancel this Reservation?</h3>
       <p>Note: that you cant revert this changes and your downpayment is non refundable</p>
        <input type="text" name="status" value="<?php echo $row['approvalstatus'] ?>"hidden>
       <input type="text" name="cancelid" value="<?php echo $row['id'] ?>" hidden>
       <input type="text" name="userid" value="<?php echo $currentuser; ?>"hidden>
       <input type="text" name="checkin" value="<?php echo $row['checkin']?>"hidden>
       <input type="text" name="checkout" value="<?php echo $row['checkout']?>"hidden>
   </center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-sm" name='cancel'>Yes,Proceed Cancellation</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>


         <!-- The Modal -->
<div class="modal fade" id="checkout<?php echo $row['id']?>">
  <div class="modal-dialog">
    <div class="modal-content">
<form method="post">
      <!-- Modal Header -->
      <div class="modal-header btn-info">
        <h4 class="modal-title">Cancel Reservation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <center>
       <h3>Want to Check-out?</h3>
       <p><i>Please proceed to the lobby and confirm your check out.</i></p>
   </center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>

<?php }} ?>
         </tbody>
       </table>
     </div>

</div>
</div>
</section>
<center>
    <br>
    <br>
    <br>
    <br>
    <footer class="section footer-section pb-2">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Hosts</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <p><span class="d-block">Our Location</span> 
 <div> 

            <!-- Google Map Copied Code -->

            <iframe src= 
"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1309.3140336999063!2d121.36844421137654!3d14.238152433137556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397e357fd6c5553%3A0x16b690fbe7807ee9!2sPita%20Fishing%20Resort%20and%20Recreation%20Center!5e0!3m2!1sen!2sph!4v1669522562855!5m2!1sen!2sph"

                    width="500"

                    height="300"

                    frameborder="0"

                    style="border:1;"

                    allowfullscreen=""

                    aria-hidden="false"

                    tabindex="0"> 

            </iframe> 

        </div> 
        </div>
          
        </div>
        <div class="row bordertop pt-5">
          <p class="col-md-6 text-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is for School Purpose Only
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            
          
        </div>
      </div>
    </footer>
    


    
</body>
</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="includes/sweetalert.min.js"></script>
  <script type="text/javascript">

  </script>
<?php }else{ ?>
<?php header('location:../login.php') ?>
<?php } ?>
<style type="text/css">
 th,td{
    text-align:center;
 }
 .table thead{
    color:white;
    background-color: #009cc8;
 }
 table{
  padding: 10px;
  box-shadow: 5px 10px #888888;
 }


</style>