<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';
    
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
    <title>Pita | FAQs</title>
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
        h2 {
    font-family: Arial, Verdana;
    font-weight: 800;
    font-size: 2.5rem;
    color: #091f2f;
    text-transform: uppercase;
}
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #f4f4f4;
    padding: 0;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 3rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    margin-top: -12px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
        
    </style>



    <link href='https://fonts.googleapis.com/css?family=Almendra SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Aref Ruqaa Ink' rel='stylesheet'>
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
    <div class="jumbotron" >
      
        <div class="container ">
        <center>

        </div>
    </div>
    </div>
        <h4 style="font-size:40px;color:black;font-weight:bold;align-text:center;text-align:center;">            
 FREQUENTLY ASK QUESTIONS
</h4>
<!-- <section class="section visit-section m-5" >
  <div class="row">
    <?php
$select_faq="SELECT * FROM faqs";
    $result = $con->query($select_faq);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
     ?>
    <div class="col-md-12">
      <h2>QUESTION: <?php echo $row['Question'] ?></h2>
      
      <h4>Answer:<br>
        <?php echo $row['Response'] ?></h4>
        <hr>
    </div>
  <?php }} ?>
  </div> 
</section> -->
<script>
$(".panel").on("click", function(e){
              var $_target =  $(e.currentTarget);
              var $_panelBody = $_target.find(".panel-collapse");
              if($_panelBody){
                $_panelBody.collapse('toggle')
              }
        })

</script>


<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
  <div class="container">
  <?php
$select_faq="SELECT * FROM faqs";
    $result = $con->query($select_faq);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
     ?>
	  
	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['id'] ?>" aria-expanded="true" aria-controls="#">
				<?php echo $row['Question'] ?>
			  </a>
			</h3>
		  </div>
		  <div id="<?php echo $row['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
			<div class="panel-body px-3 mb-4">
      <?php echo $row['Response'] ?>
			</div>
		  </div>
		</div>
    
		
	
		</div>
    <?php }} ?>
	  </div>
  
  </div>
</section>
 
<center>
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="../index.php" >Home </a></li>
                 <li><a href="../reservation/available_dates.php">Reservation</a></li>
            <li><a href="../reservation/services.php">About Us</a></li>
            <li><a href="../user/feedback.php">Feedback</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="../user/profile.php">Profile</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a class="d-block">Facebook</a></li>
              <li><a class="d-block">Contact No. 0917-505-0421</a></li>
              <li><a class="d-block">Email: Pitaresort@gmail.com</a></li>
              <li><a class="d-block">Address: </a></li>
              <li><a class="d-block">Pila-Calumpang Rd, Pila, Laguna</a></li>
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