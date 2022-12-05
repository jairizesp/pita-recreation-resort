<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';

     if(isset($_SESSION['login'])){
       $name = $_SESSION['name'];
      $currentuser = $_SESSION['username'];



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
        .summaryselect{
  font-size:20px;

}
.book_div{
  padding:5px;
  color:black;
  background:white;
}
.book_div_total{
  padding:5px;
  color:white;
  background:black;
}

.book_div_next{
  margin-top:5px;
  padding:5px;
  font-weight:bold;
  color:white;
  background: #964444;
}
        
    </style>
    <body>
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
        include "../navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-size: cover; height: 100vh; max-height: 140px;">
        <div class="container ">
   

        </div>
    </div>
    </div>
         <center>
            <h6 class="heading1"  style="font-family:'Belgrano';color:black;">            
CONFIRMATION
</h6>
    <section class="section visit-section">
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
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fas fa-user"></i></div>
    <div class="step-name">Guest Information</div>
  </div>
  <div class="stepper-item active">
    <div class="step-counter active-counter"><i class="fas fa-check"></i></div>
    <div class="step-name">Booking Confirmation</div>
  </div>
</div>
<hr>
        <div class="row">
          <div class="col-md-12 m-2">
            <center>
                <span>
            <h1 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold;color:black;font-size:40px;">We're so glad you booked with us! <br><h1 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold;color:black;font-size:30px;">Thank you for choosing</h1><h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:bold;color:black;font-size:30px;">Pita Recreation Center and Fishing Resort</h1></h1><br>
             <div>
  <div>
    <div>
      <div>
        <div>
          <div>
            <div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><br>
            <span>We are currently reviewing your reservation. We'll let know soon.</span><br> <a href="reservation_status.php" class="button-18">View My Reservation</a>
          </span>
            </center>
        
        </div>
        </div>
</div>
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
  <link rel="stylesheet" type="text/css" href="includes/css/loader.css">
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

.responsive{
   max-width: 100%;
  height: auto;
}



</style>