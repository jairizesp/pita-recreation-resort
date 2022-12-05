<?php 
    require 'app/config/connect.php';
    //login, register handler
    require 'app/controllers/reservation/reserve.php';

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
    <link href='https://fonts.googleapis.com/css?family=Almendra SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Aref Ruqaa Ink' rel='stylesheet'>
    <body>
    <?php
        include "navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-size: cover; height: 100vh; max-height: 140px;">
        <div class="container ">
        <center>
        <h4 style="font-size:40px;color:white;font-weight:bold;font-family:'Aref Ruqaa Ink';">            
 BOOK APPOINTMENT
</h4>
        </div>
    </div>
    </div>

           <section class="section visit-section m-5" style="padding-bottom:250px;">
      <div class="stepper-wrapper">
  <div class="stepper-item active">
    <div class="step-counter  active-counter"><i class="fas fa-calendar"></i></div>
    <div class="step-name">Select Date</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-bed"></i></div>
    <div class="step-name">Select Room</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-user"></i></div>
    <div class="step-name">Guest Information</div>
  </div>
  <div class="stepper-item">
    <div class="step-counter"><i class="fas fa-check"></i></div>
    <div class="step-name">Booking Confirmation</div>
  </div>
</div>
      <div class="card-body d-flex flex-column align-items-center">
      <div class="card shadow border">
      <form method="post">

     <div class="row w-100 p-3">
      <div class="col-sm-6">
        <label for="date" class="col-form-label"><b>Check in Date:</b></label>
        <div class="input-group" >
          <input type="text" class="form-control"id="checkin"name="checkin" required>
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-calendar"></i>
            </span>
          </span>
        </div>
      </div>
 <div class="col-sm-6">
        <label for="date" class="col-form-label"><b>Check out Date:</b></label>
        <div class="input-group date" >
          <input type="text" class="form-control"id="checkout" name="checkout" onchange="loadproducts();"required />
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-calendar"></i>
            </span>
          </span>
        </div>
      </div>

       <div class="col-sm-6">
        <label for="date" class="col-form-label"><b>Number of Adults:</b></label>
        <div class="input-group date" >
        <input type="text" class="form-control"id="adults"name="adults" required>
         <!--  <option selected>Number of Adults</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>9</option>
        <option value="10">10+</option>
      </select> -->
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-users"></i>
            </span>
          </span>
        </div>
      </div>

      <div class="col-sm-6">
        <label for="date" class="col-form-label"><b>Number of Kids:</b></label>
        <div class="input-group date" >
          <input type="text" class="form-control"id="kids"name="kids" required>
       <!--   <select class="form-control">
          <option selected>Select Booking Type</option>
        <option>Day Tour</option>
        <option>Night Tour</option>
      </select> -->
          <span class="input-group-append">
            <span class="input-group-text bg-light d-block">
              <i class="fa fa-users"></i>
            </span>
          </span>
        </div>
      </div>
      <div class="col-12 text-center" id="products">
    
      </div>
      <center>
      <div class="col-12 mt-2">
        <input type="submit" name="next_page" class="button-18 w-100" value="Select Rooms">
        </div>
        </center>
             </div> 
              </form>
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
<script type="text/javascript">
  var holidays = ["11/04/2022","11/08/2022"];
$(function(){
$("#checkin").datepicker({
  beforeShowDay: function(date){
    var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [ holidays.indexOf(datestring) == -1 ]
},
showAnim:'drop',
numberOfMonth:1,
minDate:new Date(),
dateFormat:'yy-mm-dd',
onClose:function(selectedDate){
    $('#checkout').datepicker("option","minDate",selectedDate);
}
});
$("#checkout").datepicker({
    beforeShowDay: function(date){
    var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [ holidays.indexOf(datestring) == -1 ]
},
showAnim:'drop',
numberOfMonth:1,
minDate:new Date(),
dateFormat:'yy-mm-dd',
onClose:function(selectedDate){
    $('#checkin').datepicker("option","maxDate",selectedDate);
}
});
});


function loadproducts(){
  var checkin = $("#checkin").val();
  var checkout =$("#checkout").val();
  var pax =$("#pax").val();
  if(checkout){
    $.ajax({
      type: 'post',
      data: {
        key1:checkin,
        key2:checkout,
        paxs:pax,
      },
      url: 'load_rooms.php',
      success: function (Response){
        $('#products').html(Response);
      }
    });
  }
};



</script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="includes/script/jquery-ui.js"></script>
<!--   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
<style type="text/css">
  .total_rooms{
    color:#74ee15;
    font-weight:bold;
    font-size:20px;
  }
  .no_rooms{
    color:#ff5252;
    font-weight:bold;
    font-size:20px;
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