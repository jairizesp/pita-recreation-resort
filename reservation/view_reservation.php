<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';

     if(isset($_SESSION['login'])){
       $name = $_SESSION['name'];
      $currentuser = $_SESSION['username'];

$sql_reserve="SELECT * FROM reservation where userid='$currentuser'";
   $result3 = $con->query($sql_reserve);
     if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) { 
            $checkin =$row['checkin'];
            $checkout =$row['checkout'];
        }
    }


$sql_user = "SELECT * FROM user where id='$currentuser'";
     $result2 = $con->query($sql_user);
     if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) { 
$username = $row['fname']. " ".$row['lname'];
$contactnum =$row['mobilenum'];
$email =$row['email'];
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
    <?php include'fonts/fonts.php'?>
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
         <h4 style="font-size:40px;color:black;font-weight:bold;font-family:'Aref Ruqaa Ink'; text-align:center;">            
 RESERVATION DETAILS
</h4>
    </div>
    <style type="text/css">
        .breakdown_list p{
            font-size:12px;
            font-weight:bold;
        }
        .breakdown_list h6{
            font-weight: bold;
        }
    </style>
    <section class="section visit-section">
<div class="container">
    <div class="row">
        <?php
          $id =$_GET['id'];
        $breakdown="SELECT * FROM reservation where id='$id'";
          $result = $con->query($breakdown);
     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
         ?>
        <div class="col-md-3 mr-5 mb-5 pb-2 breakdown_list" style="background:#ecdfee;border:1px solid grey;font-size:12px;">
            <p class="m-2" style="font-size:12px;font-weight:bold;">TOUR DATE</p>
            <center><span><?php echo date('M d, Y',strtotime($row['checkin'])) ?> <b>TO</b> <?php echo date('M d, Y',strtotime($row['checkout'])) ?></span></center>
            <br>
            <p class="m-2">GUESTS</p>
            <span><?php echo $row['adult'] ?> Adults</span><br>
            <span><?php echo $row['children'] ?> Kids</span>
            <hr>
            <h6>TOTAL PRICE:</h6>
            <h6 style="text-align:right;font-style:italic;">PHP <?php echo $row['balance'] ?>.00</h6>
            <?php if($row['approvalstatus'] == 'Approved'){ ?>
           <h6 style="text-align:right;font-style:italic;color:red;">- PHP <?php echo $row['expenses'] ?>.00</h6>
         <h6  style="text-align:right;font-style:italic">= PHP <?php echo $row['balance'] /2 ?>.00</h6>
            <?php }else{ ?>

         <?php } ?>
        </div>
    <?php }} ?>

    

        <div class="col-md-7 reserve_details mb-2" style="border:1px solid grey;">
           <p class="m-2" style="font-size:15px;font-weight:bold;"><i class="fas fa-book"></i> RESERVATION DETAILS</p>
           <hr>
    <div class="row">
        <div class="col-md-6 row">
<p class="m-2" style="font-size:15px;font-weight:bold;text-align:left;"><i class="fas fa-bed"></i> ROOM SELECTED</p>

  <?php
$user ="SELECT * FROM rooms where id in (SELECT roomid from selected_rooms where userid='$currentuser' AND start_date='$checkin' AND end_date='$checkout')";
     $result = $con->query($user);
     if ($result->num_rows > 0) {
 
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="col-md-12" style="text-align:right;">
<span style="font-size:15px;font-family:'Times New Roman';color:#3b3b3b;"> ROOM NAME:<i> <?php echo $row['room_name'] ?></i></span><br>
<span style="font-size:15px;font-family: 'Times New Roman';color:#3b3b3b;">ROOM TYPE:<i> <?php echo $row['room_type'] ?></i></span><br>
<span style="font-size:15px;font-family: 'Times New Roman';color:#3b3b3b;">ROOM RATE:<i> <?php echo $row['price'] ?>/Night</i></span><br>
<span style="font-size:15px;font-family: 'Times New Roman';color:#3b3b3b;">GOOD FOR:<i> <?php echo $row['pax'] ?> Pax</i></span>
</div>
      <?php }} ?>
        </div>
         <div class="col-md-6">
             <p class="m-2" style="font-size:15px;font-weight:bold;text-align:left;"><i class="fas fa-umbrella"></i> COTTAGE SELECTED</p>

  <?php
$user ="SELECT * FROM cottages where id in (SELECT cottage_id from selected_cottage where userid='$currentuser' AND from_date='$checkin' AND to_date='$checkout')";
     $result = $con->query($user);
     if ($result->num_rows > 0) {
 
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="col-md-12" style="text-align:right;">
<span style="font-size:15px;font-family:'Times New Roman';color:#3b3b3b;"> COTTAGE NAME:<i> <?php echo $row['cottage_name'] ?></i></span><br>
<span style="font-size:15px;font-family: 'Times New Roman';color:#3b3b3b;">COTTAGE PRICE:<i> <?php echo $row['cottage_price'] ?></i></span><br>
</div>
      <?php }}else{ ?>
        <div class="col-md-12" style="text-align:center;">

<span style="color:red;"><b>NO COTTAGE AVAILED</b></span>
</div>
   <?php   } ?>
         </div>
    </div>
    <hr>
  <?php
  $id=$_GET['id'];
        $breakdown="SELECT * FROM reservation where id='$id'";
          $result = $con->query($breakdown);
     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
         ?>
         <div class="col-md-12"  style="text-align:right;">
<span><b style="font-size:13px;">RESERVATION STATUS:</b> 
    <?php if($row['approvalstatus'] =='Pending'){ ?>
 <span style="color:#f6a200;"><?php echo $row['approvalstatus'] ?></span>
    <?php }elseif($row['approvalstatus']=='Approved'){ ?>
         <span style="color:#9cc439;font-weight:bold;"><?php echo $row['approvalstatus'] ?></span>
  <?php  }elseif($row['approvalstatus']=='Rejected'){ ?>

<span style="color:#fa4345;"><?php echo $row['approvalstatus'] ?></span>
 <?php } ?>
   

</span><br>
<span><b style="font-size:13px;">REFERENCE NUMBER:</b><i> <?php echo $row['payment_proof'] ?></i></span>
<br>
</div>
<div class="col-md-12">
    <p><?php echo $row['remarks'] ?></p>
</div>
         <?php }} ?>
    </div>


</div>
<center>
  <a href='reservation_status.php' name="" class="button-18 m-3" value="Go Back">Go Back</a>
</center>
</section>
<center>
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
            <p><span class="d-block">Address:</span> <span> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
            <p><span class="d-block">Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block">Email:</span> <span> info@yourdomain.com</span></p>
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
table td{
 padding:10px;
 border:1px solid black;
}
</style>