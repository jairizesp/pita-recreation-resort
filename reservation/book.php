<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';
$start_d = $_GET['start_date'];
$end_d = $_GET['end_date'];
     if(isset($_SESSION['login'])){
       $name = $_SESSION['name'];
      $currentuser = $_SESSION['username'];
$select_fee ="SELECT * FROM rate_fee";
    $result = $con->query($select_fee);
     if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { 
        $adults_rate= 0;
        $kids_rate = 0;
        if(isset($_SESSION['time_rate'])){
          if($_SESSION['time_rate'] === 'night'){
            $adults_rate = ($_SESSION['adults'] * $row['adult_rate']) + ( $row['night_rate'] * $_SESSION['adults']);
              if($_SESSION['kids'] > 0){
                $kids_rate = ($_SESSION['kids'] * $row['kids_rate']) + ($row['night_rate'] * $_SESSION['kids']);
              }
              else{
                $kids_rate = $_SESSION['kids'] * $row['kids_rate'];
              }
             
          }
          else{
            $adults_rate = $_SESSION['adults'] * $row['adult_rate'];
            $kids_rate = $_SESSION['kids'] * $row['kids_rate'];
            
          }
     }
      }

}

if(isset($_POST['change_date'])){
 $start_d =$_POST['start_d'];
 $end_d =$_POST['end_d'];
 $pax =$_POST['pax'];
$select_d="SELECT * FROM selected_rooms where userid='$currentuser' AND (start_date='$start_d' AND end_date='$end_d')";
    $result = $con->query($select_d);
     if ($result->num_rows > 0) {
      $delete_d="DELETE FROM selected_rooms where userid='$currentuser' AND (start_date='$start_d' AND end_date='$end_d')";
        if ($con->query($delete_d) === TRUE) {
        header('location:available_dates.php');
    }
     }else{
      header('location:available_dates.php');
     }
}

if(isset($_POST['select_cottage'])){
  $cottageid =$_POST['cottageid'];
  $userid=$currentuser;
  $from =$_GET['start_date'];
  $to =$_GET['end_date'];
  $occupied ="INSERT INTO selected_cottage set userid='$userid', cottage_id='$cottageid',from_date='$from', to_date='$to'";
    $result =$con->query($occupied);
}

if(isset($_POST['remove_cottage'])){
  $cottageid=$_POST['cottageid'];
  $from =$_POST['start_d'];
  $to = $_POST['end_d'];
  $remove_cot ="DELETE FROM selected_cottage where userid='$currentuser'AND cottage_id='$cottageid'AND from_date='$from'AND to_date='$to'";
   if ($con->query($remove_cot) === TRUE) {

    }
}
if(isset($_POST['submittotal'])){
  $_SESSION['totalpayment'] = $_POST['total_payment'];
header('location:details_reservation.php?start_date='.$_GET["start_date"].'&end_date='.$_GET["end_date"].'&pax='.$_GET["pax"]);
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
  <h4 style="font-size:40px;color:white;font-weight:bold;font-family:'Aref Ruqaa Ink';">            
SELECT ROOM
</h4>
        </div>
    </div>
    </div>
    <section class="section visit-section">
         <div class="stepper-wrapper">
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fas fa-calendar"></i></div>
    <div class="step-name">Select Date</div>
  </div>
  <div class="stepper-item active">
    <div class="step-counter active-counter"><i class="fas fa-bed"></i></div>
    <div class="step-name">Select Room</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-book"></i></div>
    <div class="step-name">Booking Information</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-check"></i></div>
    <div class="step-name">Booking Confirmation</div>
  
  </div>
</div>
         <div class="container-fluid">
        <div class="row">

 <?php

          if(isset($_GET['return']) && $_GET['return']=='existing'){ 
     echo'<div class="alert alert-danger alert-dismissible col-sm-12">
    <a type="button" class="close" href="book.php?start_date='.$_GET['start_date'].'&end_date='.$_GET['end_date'].'&search=&pax='.$_GET['pax'].'">&times;</a>
    <strong>Error!</strong> Room Already Selected.
  </div>';

      }elseif(isset($_GET['return']) && $_GET['return']=='success'){
  echo'<div class="alert alert-success alert-dismissible col-sm-12">
    <a type="button" class="close" href="book.php?start_date='.$_GET['start_date'].'&end_date='.$_GET['end_date'].'&search=&pax='.$_GET['pax'].'">&times;</a>
    <strong>Success!:</strong> Room Added Successfully.
  </div>';
      }
  unset($_SESSION['success']);
           ?>


          <div class="col-md-3 booking_summary ml-2 mb-2">
 <?php include'includes/bookingcontroller/step2/summary_booking.php'; ?>

  </div>


<div class="col-md-7 row scroll" id="roomsavail">
<?php
$filter_data = $_GET['search'];
$start_dd=$_GET['start_date'];
if($filter_data ==''){
  $vacant ="SELECT * FROM rooms WHERE status='Available'";
     $result2 = $con->query($vacant);
}elseif($filter_data =='Show All Room'){
  $vacant ="SELECT * FROM rooms Where Status='Available'";
     $result2 = $con->query($vacant);
}else{
  $vacant ="SELECT * FROM rooms WHERE room_type='$filter_data' AND Status='Available'";
     $result2 = $con->query($vacant);
}

     if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) { ?>
<div class='col-md-4 visit mb-3'>
        <center>
<a href='#'data-toggle='modal' data-target='#myModal<?php echo $row['id'] ?>'><img src='uploads/<?php echo $row['image'] ?>' alt='Image placeholder'width="250px" height="150px"></a>
<div class='reviews-star'> 
 <span><?php echo $row['room_name'] ?></span>
 <button data-toggle='modal' data-target='#confirm<?php echo $row['id'] ?>' class='button-18 w-100'>SELECT ROOM </button>

 </div>
 </center>
          </div>
          
<?php include'includes/modal_book.php' ?>
</div>
      <?php  }
       } ?>
       <hr>
<div id="third"style='display:none;' class="col-md-12">
  <div class="row">
    <?php
$select_cottage="SELECT * FROM cottages where status='Available'";
$result = $con->query($select_cottage);
     if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
<div class='col-md-4 visit mb-3'>
<a href='#'><img src='uploads/<?php echo $row['cottge_img'] ?>' width="200px" height="150px" alt='Image placeholder'></a>
<div class='reviews-star'> 
<center> <span class=""><?php echo $row['cottage_name'] ?></span></center>
 <button data-toggle='modal' data-target='#select<?php echo $row['id'] ?>' class='button-18 w-100'>SELECT COTTAGE </button>
 </div>
</div>


       <!-- The Modal -->
<div class="modal fade" id="select<?php echo $row['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header btn-info">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<form method="post">
      <!-- Modal body -->
      <div class="modal-body">
        <input type="text" name="cottageid" value="<?php echo $row['id'] ?>" hidden>
      <center><H4> ARE YOU SURE YOU WANT TO SELECT THIS COTTAGE?</H4></center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="select_cottage" class="btn btn-secondary" >Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
</form>
    </div>
  </div>
</div>
        <?php }} ?>
        </div>
  </div>
</div>

<div class="col-md-2 menu_filter ml-2 mb-2">
  <h5 class="filter_title"> FILTER ROOMS</h5>
  <hr>
    <input type="text" id="room_type"name='room_type' value="Show All Rooms" hidden />
  <input type="text" id="start_d" value="<?php echo $_GET['start_date'] ?>" hidden />
    <input type="text" id="end_d" value="<?php echo $_GET['end_date'] ?>" hidden />
  <a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date']?>&search=Single Room&pax=<?php echo $_GET['pax'] ?>"id="Single_Room" class="button-18 w-100">Single Room</a>
 <a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date']?>&search=Double Room&pax=<?php echo $_GET['pax'] ?>"id="Single_Room" class="button-18 w-100">Double Room</a>
 <a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date']?>&search=Deluxe Room&pax=<?php echo $_GET['pax'] ?>"id="Single_Room" class="button-18 w-100">Deluxe Room</a>
      <a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date']?>&search=Luxury Room&pax=<?php echo $_GET['pax'] ?>"id="Single_Room" class="button-18 w-100">Luxury Room</a>
 <a href="book.php?start_date=<?php echo $_GET['start_date'] ?>&end_date=<?php echo $_GET['end_date']?>&search=Show All Room&pax=<?php echo $_GET['pax'] ?>"id="Single_Room" class="button-18 w-100">Show All Room</a>



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
<link rel="stylesheet" type="text/css" href="includes/css/book_css.css">
<script>
  const targetDiv = document.getElementById("third");
const btn = document.getElementById("showdiv");
btn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
  } else {
    targetDiv.style.display = "block";

  }
};
</script>
<?php }else{ ?>
<?php header('location:../login.php') ?>
<?php } ?>
<style type="text/css">
 .msg{
        margin-top: 25px;
        padding: 25px;
        display: none;
        color: #fff;
      }


  /*STEPS TEMPALTE*/
.stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

/*  @media (max-width: 768px) {
    font-size: 12px;
  }*/
}
.active-counter{
      border:5px solid  #ff6e00;
}
.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
</style>