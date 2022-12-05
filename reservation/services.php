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
    

    <link rel="stylesheet" href="../ahhh/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Pita | About Us</title>
    <link rel="icon" href="../ahhh/img/pitalogo2.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Services</title>
    </head>
    <style></style>
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

    <?php
 $select_bg ="SELECT * FROM img_info where image_type='Services Background' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];  
         ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(../admin/uploads/<?php echo $imgurl; ?>); border-radius: 0px; background-position: center; background-size: cover; height: 100vh; min-height: 140px;">
    <?php } ?>
        <div class="container p-5">
            <br><br><br><br><br>
        <center>
        <h2 class="heading center p-2">            
          <?php
            $sql75 = "SELECT * FROM informations WHERE id='5'";
            $result75 = $con->query($sql75);

            if ($result75->num_rows > 0) { 

              while ($row75 = $result75->fetch_assoc()) {
                 echo $row75 ['title'];
              }
            }
            ?>
            </h2>
        <h3 class="sub-heading center" style="text-align: justify;">
        <?php
            $sql76 = "SELECT * FROM informations WHERE id='5'";
            $result76 = $con->query($sql76);

            if ($result76->num_rows > 0) { 

              while ($row76 = $result76->fetch_assoc()) {
                 echo $row76 ['description'];
              }
            }
            ?>

        </h3>
        </center>
        </div>
    </div>

<footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="../index.php" >Home </a></li>
                 <li><a href="../reservation/available_dates.php">Reservation</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="../user/feedback.php">Feedback</a></li>
            <li><a href="../user/faqs.php">FAQs</a></li>
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
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header p-3 mb-2 bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modalform"action="calendar.php" method="POST">
        <div class="input-group mb-3" id="modaldate">

        </div>
        <div class="input-group mb-3">
            <select class="form-select w-100 p-2" name="timeswimming" aria-label="Default select example" placeholder="aaa">
                <option disabled selected hidden>Day Swimming</option>
                <option value="1">Day Swimming</option>
                <option value="2">Night Swimming</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-select w-100 p-2" name="cottagenum" aria-label="Default select example">
                <option disabled selected hidden>Cottage No.</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="1">3</option>
                <option value="2">4</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-select w-100 p-2" name="adultnum" aria-label="Default select example">
                <option disabled selected hidden>Number of Adults</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="1">3</option>
                <option value="2">4</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-select w-100 p-2" name="childrennum" aria-label="Default select example">
                <option disabled selected hidden>Number of Children</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="1">3</option>
                <option value="2">4</option>
            </select>
        </div>
            <input type="submit" name="reservebutton" class="btn-primary btn w-100" value="Reserve">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header p-3 mb-2 bg-dark text-white">
        <h5 class="modal-title" id="headerModal"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <?php
            $sql = "SELECT * FROM reservation";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
            <div class="row">
                <div class="col">
                    <?php echo $row['id']?>
                </div>
            </div>
        <?php 
                }
            }
        ?>
        <br>
        <button type="button" id="toReservation" class="button-18 w-100 h-100" onclick="inputDate()">Add Reservation</button>
      </div>
    </div>
  </div>
</div>

    <script>

    function openModal() {
        $('#confirmModal').modal('show');
    }

    var numArray = [];
    a = "";

    function addToArray(i) {
        i = i.replace(/\s+/g,''); 
        currValue=0;
        currValue = document.getElementById("qtyservice").value;
        for(j=0;j<currValue;j++) {
          numArray.push(i);
        }
        event.target.disabled = true;
    }

    function printArray() {
        console.log(numArray);
    }

    function printIt() {
        for(var i=0; i<numArray.length; i++){
            a += ("id" + i + "=" + numArray[i] + "&");
        }
        console.log(a);
    }

    function passService() {
        window.open("../reservation/reservationpage.php?" + a +"loop=" + numArray.length, "_self");
    }
    //delete.php?id=1&
    
    </script>
</body>
</html>