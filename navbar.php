  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />

  
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
border-radius: 8px;
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
    font-weight: bold;
  }
  .bttn1:hover{
    background-color: #a15051;
    color:white;
  }
    .ii{
      font-size:20px;
  }

</style>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('bttn');
            }
        });
    });
</script>



<!-- Navbar  -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
      <div class="container">
        <?php
 $select_bg ="SELECT * FROM img_info where image_type='Logo' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];  
         ?>
        <a class="navlogo" href="../index.php"><img src="../admin/uploads/<?php echo $imgurl; ?>" height="90px" width="auto"></a>
        <?php }?>
         <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link h5 text-white" href="../index.php" id="heart">Home</a>
            </li>
            <?php
              if(isset($_SESSION['login'])){ ?>
    <?php if($_SERVER['PHP_SELF']==='/resorts/reservation/available_dates.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/book.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/details_reservation.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/confirmation.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/reservation_status.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/view_reservation.php' ){ ?>
<li class="nav-item">
              <a class="nav-link h5 text-white" href="../reservation/available_dates.php" id="heart_a"> <i style="color:lightblue;"class='fas fa-angle-right'></i>Reservation<i style="color:lightblue;"class='fas fa-angle-left'></i> </a>

            </li>
   <?php }else{ ?>
              <li class="nav-item">
              <a class="nav-link h5 text-white" href="../reservation/available_dates.php" id="heart_a">Reservation</a>
            </li>
          <?php } ?>

 <?php if($_SERVER['PHP_SELF']==='/resorts/reservation/services.php'){ ?>
 <li class="nav-item">
                <a class="nav-link h5 text-white" href="../reservation/services.php" id="heart_b">About Us</a>
              </li>
 <?php }else{ ?>
 <li class="nav-item">
                <a class="nav-link h5 text-white" href="../reservation/services.php" id="heart_b">About Us</a>
              </li>
<?php } ?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <?php if($_SERVER['PHP_SELF']==='/resorts/user/feedback.php'){ ?>
                           <li class="nav-item">
                <a class="nav-link h5 text-white" href="../user/feedback.php" id="heart_c">Feedback</a>
</li>
<?php }else{ ?>
<li class="nav-item">
                <a class="nav-link h5 text-white" href="../user/feedback.php" id="heart_c">Feedback</a>
</li>
<?php } ?> 
              <?php if($_SERVER['PHP_SELF']==='/resorts/user/faqs.php'){ ?>
                            <li class="nav-item">
               <a class="nav-link h5 text-white" href="../user/faqs.php" id="heart_g"><i>FAQs</i></a></li>
              <?php }else{ ?>
   <li class="nav-item">
                <a class="nav-link h5 text-white" href="../user/faqs.php" id="heart_g">FAQs</a></li>
              <?php } ?>  





               <?php if($_SERVER['PHP_SELF']==='/resorts/user/profile.php'){ ?>
              <li class="nav-item">
                <a class="nav-link h5 text-white bttn1" href="../user/profile.php" id="heart_d"><i class='fa fa-user-circle ii'><?php echo $_SESSION['name']?></i></a>
              </li>
            <?php }else{ ?>
<li class="nav-item">
                <a class="nav-link h5 text-white bi" href="../user/profile.php" id="heart_d"><i class='fa fa-user-circle ii'><?php echo $_SESSION['name']?></i></a>
              </li>
            <?php } ?>


      <div style="padding-left: 100px;">
            <li class="nav-item">
              <a class="nav-link h5 text-white bttn1" href="../app/controllers/auth/logout.php" id="">LOGOUT</a>
            </li>
      </div>

 
            <?php  }else{ ?>
           <?php if($_SERVER['PHP_SELF']==='/resorts/reservation/available_dates.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/book.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/details_reservation.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/confirmation.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/reservation_status.php' || $_SERVER['PHP_SELF']==='/resorts/reservation/view_reservation.php' ){ ?>


            </li>
   <?php }else{ ?>
          
          <?php } ?>

 <?php if($_SERVER['PHP_SELF']==='/resorts/reservation/services.php'){ ?>
 <li class="nav-item">
                <a class="nav-link h5 text-white" href="../reservation/services.php" id="heart_b">About Us</a>
              </li>
 <?php }else{ ?>
 <li class="nav-item">
                <a class="nav-link h5 text-white" href="../reservation/services.php" id="heart_b">About Us</a>
              </li>
<?php } ?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <?php if($_SERVER['PHP_SELF']==='/resorts/user/feedback.php'){ ?>
                           <li class="nav-item">
                <a class="nav-link h5 text-white" href="../user/feedback.php" id="heart_c">Feedback</a>
</li>
<?php }else{ ?>
<li class="nav-item">
                <a class="nav-link h5 text-white" href="../user/feedback.php" id="heart_c">Feedback</a>
</li>
<?php } ?>

             <?php if($_SERVER['PHP_SELF']==='/resorts/user/faqs.php'){ ?>
                            <li class="nav-item">
             <a class="nav-link h5 text-white" href="../user/faqs.php" id="heart_g"><i>FAQs</i></a></li>
              <?php }else{ ?>
   <li class="nav-item">
            <a class="nav-link h5 text-white" href="../user/faqs.php" id="heart_g">FAQs</a></li>
            
        <div style="padding-left: 150px;">
            <li class="nav-item">
                          <li class="nav-item">
              <?php } ?>
                      <a class="nav-link h5 text-white bttn1"href="../login.php" id="">LOGIN</a></li>
            <?php  } ?>
                    </ul>
            </li>
            
     
        </div>
      </div>
    </nav>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
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
     <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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

      window.addEventListener('scroll', function () {
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
    