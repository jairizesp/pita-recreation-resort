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

$_SESSION['adults'];
$_SESSION['kids'];
$select_fee ="SELECT * FROM rate_fee";
    $result = $con->query($select_fee);
     if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { 
        $adults_rate =$_SESSION['adults'] * $row['adult_rate'];
        $kids_rate =$_SESSION['kids'] * $row['kids_rate'];
      }

}
if(isset($_POST['tocancel'])){

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
    <title>Reservation</title>
    <link rel="icon" href="../ahhh/img/pitalogo2.png">
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
    
  table td{
    font-size:17px;
    font-family:Artifika;

  }
        
    </style>
    <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
    <?php include'fonts/fonts.php'?>
    <body>

    <?php
        include "../navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-size: cover; height: 100vh; max-height: 140px;">
        <div class="container ">
 
        </div>
    </div>
    </div>
    <h4 style="font-size:40px;color:black;font-weight:bold;font-family:'Belgrano';text-align:center;">COMPLETE THE DETAILS
</h4>
    <section class="section visit-section" style="padding-bottom:10px;">
         <div class="container-fluid">
            <div class="stepper-wrapper">
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fas fa-calendar"></i></div>
    <div class="step-name">Select Date</div>
  </div>
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fas fa-bed"></i></div>
    <div class="step-name">Select Room</div>
  </div>
  <div class="stepper-item active">
    <div class="step-counter active-counter"><i class="fas fa-user"></i></div>
    <div class="step-name">Guest Information</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-check"></i></div>
    <div class="step-name">Booking Confirmation</div>
  </div>
</div>
<hr>
        <div class="row">
  <div class="col-md-3 booking_summary mb-2">
 <?php include'includes/bookingcontroller/guest_info/summary_book.php'; ?>
  </div>

<div class="col-md-9 mb-2 guest_info">
<h1 style="font-family:'Belgrano';color:black;">GUEST INFORMATION</h1>
<hr>
<div class="container">
  <div class="row">
  <?php
$sql_guest ="SELECT * FROM user where id='$currentuser'";
$result2 = $con->query($sql_guest);
if($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {  ?>
  <table id="example1" class="col-md-12 table-bordered">
    <tbody>
      <tr>
        <td>
          <b>Name of Guest: </b><br> <?php echo $row['fname'] ?> <?php echo $row['lname'] ?></span>
        </td>
        <td>
          <b>Contact Number: </b><br> <?php echo $row['mobilenum'] ?></span><br>
        </td>
        <td>
          <b>Email Address: </b><br> <?php echo $row['email'] ?></span><br>
        </td>
      </tr>
    </tbody>
  </table>
          <?php }} ?>
<h1 class="mt-5" style="font-family:'Belgrano';color:black;">OTHER DETAILS</h1>
<hr>
  <form method="post">
<div class="row formdetails">
<div class="row">
<span class="col-md-12" style="text-align:center;font-family:Bree;font-size:17px;font-weight:bold;">SCAN QR CODE TO PAY</span>
<div class='img_qrcode col-md-4'>
<h1 style="font-family:'Belgrano'; font-size:2  0px;">GCASH PAYMENT</h1>
  <center>
  <img src="uploads/306144472_885289432645506_2128604742002938340_n.jpg" alt="Nature" class="responsive" style="
 width: 100%;
  height: auto;
  ">
</center>
</div>
<div class="col-md-8 row">
<div class="col-md-12 row ml-1">
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
         if($days == 0 ){
  $cot_total =$row['cot_total'] * 1;

      }else{
  $cot_total =$row['cot_total'] * $days;

      }
      }
                while ($total = $result4->fetch_assoc()) { 

                  if($days ==0){
                      $room_total = $total['total'] * 1;
                      $total_all = $room_total + $cot_total + $adults_rate + $kids_rate;
          $total_wrooms=$total_all /2;
                  }else{
          $room_total = $total['total'] * $days;
          $total_all = $room_total + $cot_total;
          $total_wrooms=$total_all /2;
              }
        
                  ?>

  <span class="col-md-6">
      <p style="text-align:center;">Pay 50% of the total Amount as Downpayment</p><br><b>Amount to Pay:</b><br>Php <?php echo $total_wrooms; ?>.00
</span>
                <?php }}?>

   <div class="col-md-6">
        <label for="date" class="col-form-label"><b>REFERENCE NUMBER:</b></label>
        <div class="input-group date" >
       <input type="text" name="userid" id="userid" value="<?php echo $currentuser?>" hidden>
    <input type="text" name="checkin" id="checkin" value="<?php echo $_GET['start_date'] ?>"hidden>
    <input type="text" name="adults" id="adults" value="<?php echo $_SESSION['adults'] ?>"hidden>
     <input type="text" name="kids" id="kids" value="<?php echo $_SESSION['kids'] ?>"hidden>
    <input type="text" name="checkout" id='checkout' value="<?php echo $_GET['end_date'] ?>"hidden>
          <input type="text" class="form-control"id="reference" name="reference" required style="border:1px solid black" />
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-credit-card"></i>
            </span>
          </span>
        </div>
          <a type="#" id="btn-submit" name='topayment' class="button-18 mt-4 text-white">Proceed to Confirmation</a></div>
      </div>
</div>
</div>
</div>
<div class="col-md-12 mt-2 mb-3"></div>
<div class="col-md-3"></div>
<div class="col-md-6">

<div class="col-md-3"></div>
</div>
</form>
</div>
  </div>
</div>
</div>
</div>
</div>
</section>
<center>
    <footer class="section footer-section">
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="includes/css/book_css.css">
  <script src="includes/script/details_r.js"></script>

<?php }else{ ?>
<?php header('location:../login.php') ?>
<?php } ?>
