<?php
require 'app/config/connect.php';

//login, register handler
require 'app/controllers/others/rate.php';
$name = "";
$ratings = "";

if (isset($_SESSION['login'])) {
  $name = $_SESSION['name'];
  $currentuser = $_SESSION['username'];
  if (isset($_SESSION['ratings'])) {
    $ratings = $_SESSION['ratings'];
  } else {
    $ratings = "";
  }
}

?>
<!doctype html>

<html lang="en">

<head>
  <title>Pita | Home</title>
  <link rel="icon" href="ahhh/img/pitalogo2.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">



  <link rel="stylesheet" href="ahhh/css/bootstrap.css">
  <link rel="stylesheet" href="ahhh/css/animate.css">
  <link rel="stylesheet" href="ahhh/css/owl.carousel.min.css">
  <link rel="stylesheet" href="ahhh/css/aos.css">
  <link rel="stylesheet" href="app/css/ratings.css">

  <link rel="stylesheet" href="ahhh/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="ahhh/fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" />
  <!--bootstrap-->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">

  <link rel="stylesheet" href="../app/css/feed.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Theme Style -->
  <link rel="stylesheet" href="ahhh/css/style.css">
</head>

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
<style>
  .bttn{
top: 50%;
left: 50%;
border: none;
color: white;
padding: 11px 40px;
text-align: center;
text-decoration: none;
font-size: 16px;
cursor: pointer;
background: transparent;
border: 1.1px solid #C50A0D;
border-radius: 3px;
font-weight: bold;

  }
  .bttn:hover{
    background-color: #C50A0D;
    color:white;
  }
.bttn1{
  background-color: #C50A0D;
  border: none;
  color: white;
  padding: 14px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
    width: 107px;
  }
  .bttn1:hover{
    background-color: #a15051;
    color:white;
  }
  .bttn2{
  background-color: #C50A0D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }
  .bttn2:hover{
    background-color: #a15051;
    color:white;
  }
  .ii{
      font-size:20px;
      font-weight: bold;
  }
</style>


  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
           <?php
 $select_bg ="SELECT * FROM img_info where image_type='Logo' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];  
         ?>
         
        <a class="navlogo" href="index.php"><img src="admin/uploads/<?php echo $imgurl; ?>" height="90px" width="auto"></a>
        <?php }?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse show" id="navbarNav" style>
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link h5 text-white bttn" href="index.php" href="index.php" id="heart">Home</a>
          </li>
          <?php
          if (isset($_SESSION['login'])) { ?>
              <li class="nav-item">
              <a class="nav-link h5 text-white" href="reservation/available_dates.php" id="heart_a">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="reservation/services.php" id="heart_b">About Us</a>
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="user/feedback.php" id="heart_c">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="user/faqs.php" id="heart_g">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="user/profile.php" id="heart_d"><i class='fa fa-user-circle ii'><?php echo $_SESSION['name']?></i></a>
            </li>
            
            <div style="padding-left: 100px;">
            <li class="nav-item">
         <a class="nav-link h5 text-white bttn1" href="app/controllers/auth/logout.php" id="">LOGOUT</a>
            </li>

       <?php   } else { ?>
 
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="reservation/services.php" id="heart_b">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5 text-white" href="user/feedback.php" id="heart_c">Feedback</a>
              </li>
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="user/faqs.php" id="heart_g">FAQs</a>
            </li>
            
        <div style="padding-left: 150px;">
            <li class="nav-item">
            <a class="nav-link h5 text-white bttn1" href="login.php" id="" >LOGIN</a>
            </li>
       
        <?php  }
          ?>

        </ul>
      </div>
      </ul>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart").removeClass("text-white");
          $("#heart").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart").removeClass("text-dark");
          $("#heart").addClass("text-white");
        }
      });
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_f").removeClass("text-white");
          $("#heart_f").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_f").removeClass("text-dark");
          $("#heart_f").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_a").removeClass("text-white");
          $("#heart_a").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_a").removeClass("text-dark");
          $("#heart_a").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_b").removeClass("text-white");
          $("#heart_b").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_b").removeClass("text-dark");
          $("#heart_b").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_c").removeClass("text-white");
          $("#heart_c").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_c").removeClass("text-dark");
          $("#heart_c").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_d").removeClass("text-white");
          $("#heart_d").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_d").removeClass("text-dark");
          $("#heart_d").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_e").removeClass("text-white");
          $("#heart_e").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_e").removeClass("text-dark");
          $("#heart_e").addClass("text-white");
        }
      });
    </script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
          nav.classList.remove('navbar-dark');
          nav.classList.add('bg-light', 'shadow', 'navbar-light');
          $("#heart_g").removeClass("text-white");
          $("#heart_g").addClass("text-dark");
        } else {
          nav.classList.remove('bg-light', 'shadow', 'navbar-light');
          nav.classList.add('navbar-dark');
          $("#heart_g").removeClass("text-dark");
          $("#heart_g").addClass("text-white");
        }
      });
    </script>
    </div>

  </nav>

  <!-- END head -->
<?php
 $select_bg ="SELECT * FROM img_info where image_type='Index Background' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];   ?>
  <section class="site-hero overlay" style="background-image: url(admin/uploads/<?php echo $imgurl ?>)">
  <?php }else{ ?>
    <section class="site-hero overlay" style="background-image: url(ahhh/img/hero_1.jpg)">
 <?php } ?>
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-11 text-center">
          <h4 class="heading">
            <?php
            $sql69 = "SELECT * FROM informations WHERE id='1'";
            $result69 = $con->query($sql69);

            if ($result69->num_rows > 0) { 

              while ($row69 = $result69->fetch_assoc()) {
                 echo $row69 ['title'];
              }
            }
        
        ?>
        </h4>
          <p class="sub-heading mb-5">          
            <?php
            $sql70 = "SELECT * FROM informations WHERE id='1'";
            $result70 = $con->query($sql70);

            if ($result70->num_rows > 0) { 

              while ($row70 = $result70->fetch_assoc()) {
                 echo $row70 ['description'];
              }
            }
        
        ?>
        </p>
              <li class="nav-item">
            <a class="nav-link h5 text-white bttn2" href="reservation/available_dates.php" id="" >BOOK NOW</a>
            </li>
        </div>
      </div>
      <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
    </div>
  </section>
  <!-- END section -->

  <section class="section visit-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <<center> <h1 class="sched" style="font-size: 70px;">Gallery</h1><hr class="w-100"></center>
        </div>
      </div>
      <div class="row">
        <style type="text/css">
          .img-gallery:hover{
            border:1px solid black;
          }
        </style>
        <?php
        $sql = "SELECT * FROM img_info where status='Active' and image_type='Gallery'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-lg-4 col-md-6 visit" data-aos="fade-right">
              <img src="admin/uploads/<?php echo $row['img_path'] ?>" alt="Image placeholder" class="img-fluid h-75 img-gallery" onclick="openPostModal(<?php echo $row['id'] ?>)">
              <h3><a><?php echo $row['name'] ?></a></h3>
              <div class="reviews-star float-left">
              </div>
            </div>
            <!-- Modal for Post-->
            <div class="modal fade" id="modalPost<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="admin/uploads/<?php echo $row['img_path'] ?>" class="w-100 rounded p-3">
                  </div>
                  <div class="modal-footer">
                   <!--  <a href="reservation/available_dates.php"><button class="btn btn-primary w-100">Reserve</button></a> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="modalRate<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="POST">
                    <input type="hidden" type="text" name="name" value="<?php echo $name ?>">
                    <input type="hidden" type="text" name="roomid" value="<?php echo $row['id'] ?>">
                    <div class="modal-body">
                      <div class="rating">
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating3" type="radio" name="rating" value="3">
                        <label for="rating3">3</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" name="ratebutton" class="btn btn-primary w-25" value="Submit">
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
  </section>
  <!-- END section -->

  <section class="section slider-section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-8">

          <h2 class="sched" data-aos="fade-up">
          <?php
            $sql71 = "SELECT * FROM informations WHERE id='2'";
            $result71 = $con->query($sql71);

            if ($result71->num_rows > 0) { 

              while ($row71 = $result71->fetch_assoc()) {
                 echo $row71 ['title'];
              }
            }
        
        ?>
          </h2>
          
          <p class="lead" data-aos="fade-up" data-aos-delay="100">
          <?php
            $sql72 = "SELECT * FROM informations WHERE id='2'";
            $result72 = $con->query($sql72);

            if ($result72->num_rows > 0) { 

              while ($row72 = $result72->fetch_assoc()) {
                 echo $row72 ['description'];
              }
            }
        
        ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            <?php              
            $select_carousel ="SELECT * FROM img_info where image_type='Carousel Image' AND status='Active' ORDER BY RAND() limit 5";
           $result = $con->query($select_carousel);
           if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        ?>
            <div class="slider-item">
              <img src="admin/uploads/<?php echo $row['img_path'] ?>" alt="Image placeholder" class="img-fluid">
            </div>
          <?php }} ?>
          </div>
          <!-- END slider -->
        </div>

        <div class="col-md-12 text-center"><a href="#" class="">View More Photos</a></div>

      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="section blog-post-entry bg-pattern">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-8">
          <h2 class="sched" data-aos="fade-up">
            <?php
            $sql73 = "SELECT * FROM informations WHERE id='3'";
            $result73 = $con->query($sql73);

            if ($result73->num_rows > 0) { 

              while ($row73 = $result73->fetch_assoc()) {
                 echo $row73 ['title'];
              }
            }
        
        ?>
        </h2>
          <p class="lead" data-aos="fade-up">
            <?php
          $sql74 = "SELECT * FROM informations WHERE id='3'";
            $result74 = $con->query($sql74);

            if ($result74->num_rows > 0) { 

              while ($row74 = $result74->fetch_assoc()) {
                 echo $row74 ['description'];
              }
            }
            ?>
          </p>
        </div>
      </div>
      <div class="row">
 <?php              
            $select_carousel ="SELECT * FROM img_info where image_type='Footer Image' AND status='Active'ORDER BY RAND() limit 3";
           $result = $con->query($select_carousel);
           if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">
          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="admin/uploads/<?php echo $row['img_path'] ?>" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <h2 class="mt-0 mb-3" align="center"><a href="#"><?php echo $row['name'] ?></a></h2>
            </div>
          </div>
        </div>
      <?php }} ?>
<!--         <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="200">
          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="ahhh/img/img_10.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <h2 class="mt-0 mb-3" align="center"><a href="#">Family Celebration and Outings</a></h2>
            </div>
          </div>
        </div> -->
<!--         <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="ahhh/img/img_11.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">

              <h2 class="mt-0 mb-3" align="center"><a href="#">Friend Hangouts and Parties</a></h2>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- FEEDBACKS -->
 
        <!-- FEEDBACKS -->

        <!-- END col -->
      </div>
    </div>

  </section>
  <footer class="section footer-section">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
               <li><a href="#" >Home </a></li>
            <li><a href="reservation/services.php">About Us</a></li>
            <li><a href="user/feedback.php">Feedback</a></li>
            <li><a href="user/faqs.php">FAQs</a></li>
            
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
        <p class="col-md-6 text-left">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved 
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>


      </div>
    </div>
  </footer>
  <script>
    function openPostModal(i) {
      $('#modalPost' + i).modal('show');
    }

    function defaultval() {
      event.preventDefault();
    }

    function openModalRate(i) {
      $('#modalRate' + i).modal('show');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
  <script src="ahhh/js/jquery-3.2.1.min.js"></script>
  <script src="ahhh/js/popper.min.js"></script>
  <script src="ahhh/js/bootstrap.min.js"></script>
  <script src="ahhh/js/owl.carousel.min.js"></script>
  <!-- <script src="js/jquery.waypoints.min.js"></script> -->
  <script src="ahhh/js/aos.js"></script>
  <script src="ahhh/js/main.js"></script>
</body>

</html>