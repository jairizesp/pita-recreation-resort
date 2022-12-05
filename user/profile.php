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
    require '../app/controllers/post/add_post.php';
    require '../app/controllers/profile/profile.php';
    require '../app/controllers/reservation/editreservation.php';
    require '../app/controllers/reservation/paymentproof.php';
    //login, register handler

    if($_SESSION["login"]!=true){
        header("Location: ../login.php");
        exit();
    }else{
        $name = $_SESSION['name'];
        $currentuser = $_SESSION['username'];
    }

    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Pita | User Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <link rel="stylesheet" href="../app/css/login.css" />

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
    <!--bootstrap-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Ae8ktMtw4tFvNjR5ZX7aB9o4nkdQjNsGBMkW5_18K0pRiPRPoNcrrqoqgFfYFCt9INTk8u4VMWebV0ns"></script>
    
   
    <link rel="stylesheet" href="../app/css/profile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../ahhh/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../ahhh/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="icon" href="../ahhh/img/pitalogo2.png">
    </head>
    
  <body>
    
    <?php
        include "../navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-size: cover; height: 100vh; max-height: 120px;">
        <div class="container ">
        <center>

        </div>

    
    
        <div class="container">
            <br><br><br><br><br>
            <?php
                $sql = "SELECT * FROM user WHERE id='$currentuser'";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <div class="row">
                <div class="col">
                    <img src = "uploads/<?php echo $row['profile_picture']?>" class =" mx-auto d-block w-50 h-75 border">
                    <style>
                        .bilog{
                            object-fit: cover;
                            object-position: center;
                            height: 50vh;
                            width: 50vw;
                            }
                        @media (max-width: 991.98px) {
                            .bilog {
                                height: 100px;
                                
                                object-fit: cover;
                            object-position: center;
                                }
                            }
                    </style>
                    <br>
                    <center><button type="button" class="button-18 w-25 lefto" onclick="openProfileModal()">Edit Profile</button></center><br>
                    <style>
                        @media (max-width: 991.98px) {
                            .lefto {
                               padding: 20px;
                               font-size: 12px;
                                }
                            }
                    </style>
                </div>
                <div align="center" class="mama" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                <h1 class="m-b-20 p-b-5 b-b-default f-w-600 text-white lowe" style="font-weight: bold; "><?php echo $row['fname']." ".$row['lname']?></h1><hr>  
                    <div class="row p-2">
                        <div class="col">
                            <h3 class="text-white lvl m-b-10 f-w-600">Email: <?php echo $row['email']?></h3>
                            <h3 class="text-white lvl m-b-10 f-w-600">Contact Number: <?php echo $row['mobilenum']?></h3>
                        </div>
                    </div>
                </div>
                <style>
                    .mama{
                        margin-right: 90px;
                        padding: 12px;
                        min-width: 200px;
                    }
                    @media (max-width: 991.98px) {
                            .lvl{
                               font-size: 15px;
                              }
                              .lowe{
                               font-size: 25px;
                              }
                         }
                </style>
            </div>

            <!-- Modal for Profile -->
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" type="text" name="id" value="<?php echo $_SESSION['username']?>">
                    <div class="modal-body">
                        <img src = "uploads/<?php echo $row['profile_picture']?>" class ="rounded-circle mx-auto d-block w-50 border corn">
                        <br><center><input class="form-control w-50" type="file" name="image" id="image"><center><br>
                        <style>
                            .corn{
                                height: 260px; 
                                object-fit: cover; 
                                object-position: center;
                            }
                        </style>
                        <div class="input-group mb-3">
                            <label>First Name:</label>
                            <input class="form-control auth-input w-100 p-2" type="text" name="fnameEdit" value="<?php echo $row['fname']?>">
                        </div>
                        <div class="input-group mb-3">
                            <label>Last Name:</label>
                            <input class="form-control auth-input w-100 p-2" type="text" name="lnameEdit" value="<?php echo $row['lname']?>">
                        </div>
                        <div class="input-group mb-3">
                            <label>Email:</label>
                            <input class="form-control auth-input w-100 p-2" type="text" name="emailEdit" value="<?php echo $row['email']?>">
                        </div>
                        <div class="input-group mb-3">
                            <label>Contact Number:</label>
                            <input class="form-control auth-input w-100 p-2" type="text" name="mobilenumEdit" value="<?php echo $row['mobilenum']?>">
                        </div>
                        <div class="input-group mb-3">
                        <label>New Password:</label>
                            <input class="form-control auth-input w-100 p-2" type="password" name="passwordEdit" placeholder=".." >
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button-18" data-dismiss="modal">Close</button>
                        <button type="submit" class="button-18" name="editprofilebutton">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>

            <?php 
                    }
                }
            ?>
        </div>
          </div>
    </div> 
    <footer class="section footer-section" style="padding-top: 100px; margin-top: 50px;">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="../index.php" >Home </a></li>
                 <li><a href="../reservation/available_dates.php">Reservation</a></li>
            <li><a href="../reservation/services.php">About Us</a></li>
            <li><a href="../user/feedback.php">Feedback</a></li>
            <li><a href="../user/faqs.php">FAQs</a></li>
            <li><a href="#">Profile</a></li>
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
        </div>
        <div class="row bordertop pt-5">
          
            
          
        </div>
      </div>
    </footer>
    <style>
        .footer-section {
  background: #1a1a1a;
  color: #fff;
}

.footer-section a {
  color: rgba(255, 255, 255, 0.7);
}

.footer-section a:hover {
  color: #fff;
}

.footer-section p {
  color: rgba(255, 255, 255, 0.5);
}

.footer-section .bordertop {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 20px;
}

.footer-section .contact-info span.d-block {
  font-style: italic;
  color: #fff;
}

.footer-section .social a {
  font-size: 18px;
  padding: 10px;
}

.footer-section .link li {
  margin-bottom: 10px;
}

.footer-newsletter .form-group {
  position: relative;
}

.footer-newsletter .form-control {
  background: none;
  border: none;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 0;
  color: #fff;
}

.footer-newsletter .form-control::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  color: rgba(255, 255, 255, 0.2);
  font-style: italic;
}

.footer-newsletter .form-control::-moz-placeholder {
  /* Firefox 19+ */
  color: rgba(255, 255, 255, 0.2);
  font-style: italic;
}

.footer-newsletter .form-control:-ms-input-placeholder {
  /* IE 10+ */
  color: rgba(255, 255, 255, 0.2);
  font-style: italic;
}

.footer-newsletter .form-control:-moz-placeholder {
  /* Firefox 18- */
  color: rgba(255, 255, 255, 0.2);
  font-style: italic;
}

.footer-newsletter .form-control:active, .footer-newsletter .form-control:focus {
  border-bottom: 1px solid white;
}

.footer-newsletter button[type="submit"] {
  background: none;
  color: #fff;
  position: absolute;
  top: 0;
  right: 0;
}

.side-box, .sidebar-search {
  padding: 30px;
  background: #fff;
  -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
}

.side-box .heading, .sidebar-search .heading {
  font-size: 18px;
  margin-bottom: 30px;
  font-family: "Mukta Mahee", arial, sans-serif;
}

.post-list li {
  margin-bottom: 20px;
}

.post-list li a > div {
  margin-top: -10px;
}

.post-list li a .meta {
  font-size: 13px;
  color: #adb5bd;
}

.post-list li a .image {
  width: 150px;
}

.post-list li a h3 {
  font-size: 16px;
}

.post-list li:last-child {
  margin-bottom: 0;
}

.sidebar-search .form-group {
  position: relative;
  margin-bottom: 0;
}

.sidebar-search .icon-search {
  position: absolute;
  top: 50%;
  left: 15px;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.sidebar-search .search-input {
  border-color: #dee2e6;
  padding-left: 40px;
  border-radius: 0px;
}

.sidebar-search .search-input:focus, .sidebar-search .search-input:active {
  border-color: #343a40;
}

.contact-section .contact-info p {
  color: white;
  font-family: "Playfair+Display", times, serif;
  font-size: 30px;
  margin-bottom: 30px;
}

.contact-section .contact-info p .d-block {
  font-size: 14px;
  letter-spacing: .2em;
  font-family: "Mukta Mahee", arial, sans-serif;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.5);
}

.post-categories li {
  display: block;
}

.post-categories li a {
  display: block;
  position: relative;
  padding-bottom: 10px;
  margin-bottom: 10px;
  border-bottom: 1px solid #e9ecef;
}

.post-categories li a .count {
  position: absolute;
  top: 0;
  right: 0;
  color: #6c757d;
}

.custom-pagination .page-item .page-link {
  text-align: center;
  border: none;
  background: none;
  border-radius: 50% !important;
  width: 50px;
  height: 50px;
  padding: 0;
  line-height: 50px;
  margin-right: 10px;
  margin-bottom: 10px;
}

.custom-pagination .page-item.active .page-link {
  background: #dc3545;
  -webkit-box-shadow: 0 2px 7px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 2px 7px 0 rgba(0, 0, 0, 0.2);
}
    </style>
    

    <script>

        function openModal(i) {
            $('#exampleModal' + i).modal('show');
        }

        function openModalBilling(i) {
            $('#modalBilling' + i).modal('show');
        }
        function openModalBilling2(i) {
            $('#modalBilling2' + i).modal('show');
        }

        function setPayment(i) {
            downpayment = i * 0.2;
            usdollarconvert = downpayment / 50;
            this.payment = usdollarconvert;
        }
        
        function getPayment() {
            return this.payment
        }

        function setId(i) {
            this.idreservation = i;
        }
        
        function getId() {
            return this.idreservation
        }

        function setEmail(i) {
            this.email = i;
        }
        
        function getEmail() {
            return this.email
        }

        function openPostModal(i) {
            $('#modalPost' + i).modal('show');
        }

        function openProfileModal() {
            $('#profileModal').modal('show');
        }

        function openAddServiceModal(i) {
            $('#addServiceModal' + i).modal('show');
        }

        function openAddServiceModal2(i) {
            $('#addServiceModal2' + i).modal('show');
        }

        function openAddPostModal() {
            $('#modalAddPost').modal('show');
        }
        
        function getSelectedIndex(j) {
          var opts = document.getElementById("rooms").options;
          for(var i = 0; i < opts.length; i++) {
              if(opts[i].innerText == j.toString()) {  
                  document.getElementById("rooms").selectedIndex = i;        
                  break;
              }
          }
        }

        var numArray = [];
        a = "";
        b = "";

        function addToArray(i) {
            i = i.replace(/\s+/g,''); 
            currValue=0;
            currValue = document.getElementById("qtyservice").value;
            for(j=0;j<currValue;j++) {
              numArray.push(i);
            }
            event.target.disabled = true;
        }

        function setReserveId(i) {
            b += i;
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
            window.open("../app/controllers/reservation/addservice.php?reserveid=" + b + "&" + a +"loop=" + numArray.length, "_self");
        }

        function openCottagePage(i) {
            window.open("../reservation/cottagereservation.php?reserveid=" + i, "_self");
        }


    </script>

    <script>
        
    paypal.Buttons({

        createOrder: function(data, actions){
            console.log('Data :' + data);
            console.log('Action :' + actions);
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: getPayment()
                    }
                }]
            })
        },

        onApprove: function(data, actions) {
            console.log('Data :' + data)
            console.log('Action :' + actions)
            return actions.order.capture().then(function(details) {
                window.open("../app/controllers/reservation/payment.php?paymentstatus=" + details.status + "&userid=" + getId() + "&paymentbalance=" + getPayment() + "&email=" + getEmail(), "_self");
            })
        }

        }).render('#paypal-button-container');
        //document.body.style.backgroundImage = "url('../pictures/mainpage.jpg')";
    </script>

  </body>

</html>
