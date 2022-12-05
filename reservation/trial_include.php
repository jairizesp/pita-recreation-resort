<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/reserve.php';
    $name ="";
    $currentuser="";
    $inputcottage="";
    $inputcheckin="";
    $inputcheckout="";
    $inputadultnum="";
    $inputchildrennum="";

    if(isset($_SESSION['login'])){

      if(isset($_SESSION['inputCottage'])){
        $inputcottage=$_SESSION['inputCottage'];
      }else{
        $inputcottage="";
      }

      if(isset($_SESSION['inputCheckin'])){
        $inputcheckin=$_SESSION['inputCheckin'];
      }else{
        $inputcheckin="";
      }

      if(isset($_SESSION['inputCheckout'])){
        $inputcheckout=$_SESSION['inputCheckout'];
      }else{
        $inputcheckout="";
      }
      
      if(isset($_SESSION['inputAdultnum'])){
        $inputadultnum=$_SESSION['inputAdultnum'];
      }else{
        $inputadultnum="";
      }

      if(isset($_SESSION['inputChildrennum'])){
        $inputchildrennum=$_SESSION['inputChildrennum'];
      }else{
        $inputchildrennum="";
      }

      $name = $_SESSION['name'];
      $currentuser = $_SESSION['username'];
    }
    else{
      if(isset($_GET['roomname'])){
        $inputcottage =$_GET['roomname'];
      }else{
        $inputcottage="";
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
    <title>Reservation</title>
    <link rel="icon" href="../ahhh/img/tablogo.png">
   
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
    <body onload="getSelectedIndex('<?php echo $inputcottage ?>'); getSelectedIndexAdult(<?php echo $inputadultnum ?>); getSelectedIndexChildren(<?php echo $inputchildrennum ?>)">
    <?php
        include "../navbar.php";
    ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/reserve.jpg); border-radius: 0px; background-position: center; background-size: cover; height: 100vh; min-height: 700px;">
        <div class="container p-5">
        <center>
        <br><br><br><br><br>
        <h1 class="heading center p-2">            
          <?php
            $sql75 = "SELECT * FROM informations WHERE id='4'";
            $result75 = $con->query($sql75);

            if ($result75->num_rows > 0) { 

              while ($row75 = $result75->fetch_assoc()) {
                 echo $row75 ['title'];
              }
            }
            ?>
            </h1>
        <h3 class="sub-heading center">          <?php
            $sql76 = "SELECT * FROM informations WHERE id='4'";
            $result76 = $con->query($sql76);

            if ($result76->num_rows > 0) { 

              while ($row76 = $result76->fetch_assoc()) {
                 echo $row76 ['title'];
              }
            }
            ?></h3>
        </div>
       
    </div>
    <center>
    <div class="row align-items-center p-5 w-75">
                <div class="col-100 mx-auto">
                    <div class="card shadow border">
                    <form action="" method="POST">
                        <input type="text" name="name" value="<?php echo $name?>">
                        <input  type="text" name="userid" value="<?php echo $currentuser?>">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="row w-100 p-2">
                                <div class="col-sm">
                                    <select class="form-select form-select-lg w-100 h-100 p-2" name="cottage" aria-label=".form-select-lg example" id="rooms">
                                      <option disabled selected value="Hotel-Room">Hotel Rooms</option>
                                        <?php
                                          $sql2 = "SELECT * FROM rooms";
                                          $result2 = $con->query($sql2);

                                          if ($result2->num_rows > 0) {
                                              while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row2['room_name']?>"><?php echo $row2['room_name']?></option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        <script>
                                          function getSelectedIndex(j) {
                                            var opts = document.getElementById("rooms").options;
                                            for(var i = 0; i < opts.length; i++) {
                                                if(opts[i].innerText == j.toString()) {  
                                                    document.getElementById("rooms").selectedIndex = i;        
                                                    break;
                                                }
                                            }
                                          }
                                          
                                        </script>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-primary dropdown-toggle w-100 h-100 p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Services Availed
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php 
                                            if(isset($_GET['loop'])) {
                                                $looplength = $_GET['loop']; 
                                                ?>
                                                <input type="hidden" type="text" name="loopservice" value="<?php echo $looplength?>">
                                                <?php
                                                for($x=0;$x<$looplength;$x++){
                                                    $inputs = $_GET['id'.$x];        
                                        ?>
                                            <a class="dropdown-item" href="#"><?php echo $inputs ?></a>
                                            <input type="hidden" type="text" name="loopservicenumber" value="<?php echo $x?>">
                                            <input type="hidden" type="text" name="service<?php echo $x?>" value="<?php echo $inputs?>">
                                        <?php 
                                                }
                                            }
                                            else{
                                            ?> 
                                            <a class="dropdown-item" href="#">None</a>
                                            <?php
                                            }
                                        ?> 
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 p-2">
                                <div class="col-sm">
                                    <input class="form-control form-select-lg w-100 h-100 p-2" type="date" id="checkin" name="checkin" placeholder="Check-in" value="<?php echo $inputcheckin?>">
                                </div>
                                <div class="col-sm">
                                    <input class="form-control form-select-lg w-100 h-100 p-2" type="date" id="checkout" name="checkout"  placeholder="Check-out" value="<?php echo $inputcheckout?>">
                                </div>
                            </div>
                            <div class="row w-100 p-2">
                                <div class="col-sm">
                                    <select class="form-select form-select-lg" name="adultnum" id="adultnumber" aria-label=".form-select-lg example">
                                        <option disabled selected>Number of Adults</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="5">6</option>
                                        <script>
                                          function getSelectedIndexAdult(j) {
                                            var opts = document.getElementById("adultnumber").options;
                                            for(var i = 0; i < opts.length; i++) {
                                                if(opts[i].innerText == j.toString()) {  
                                                    document.getElementById("adultnumber").selectedIndex = i;        
                                                    break;
                                                }
                                            }
                                          }
                                          
                                        </script>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <select class="form-select form-select-lg" name="childrennum" id="childrennumber" aria-label=".form-select-lg example">
                                        <option disabled selected>Number of Children</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <script>
                                          function getSelectedIndexChildren(j) {
                                            var opts = document.getElementById("childrennumber").options;
                                            for(var i = 0; i < opts.length; i++) {
                                                if(opts[i].innerText == j.toString()) {  
                                                    document.getElementById("childrennumber").selectedIndex = i;        
                                                    break;
                                                }
                                            }
                                          }
                                          
                                        </script>
                                    </select>
                                </div>
                                
                                <div class="col-sm">
                                    <input type="submit" name="reservebutton" class="button-18 w-100 h-100 p-2" value="Reserve">
                                </div>
                            </div>
                            <div class="row w-100 p-2">
                                <?php if (in_array("Room and Date Occupied!<br>", $error_array)) echo "Room and Date Occupied!<br>";?>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
    <section class="section visit-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Single Room</b></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/single.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">
                    
                    
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
           <img src="../pictures/single2.png" alt="Image placeholder" class="img-fluid">
            <div class="reviews-star float-left">
              
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/single3.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3"  >
            <img src="../pictures/single4.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          
            
            <p class="contenter" >Rooms feature en suite bathrooms and either a king size bed or two twin beds, making them ideal for two adults or two adults and one child (12 years old and younger). Interconnecting rooms are also available for families and couples travelling together, providing ample space and independence as well as the convenience of proximity.</p>
        </div>

      </div>

      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Double Room</b></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/double.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">
                    
                    
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
           <img src="../pictures/double2.png" alt="Image placeholder" class="img-fluid">
            <div class="reviews-star float-left">
              
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/double3.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3"  >
            <img src="../pictures/double4.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          
            <p class="contenter">Rooms feature a spacious bedroom with a large double bed, contemporary white furnishings and a plush en-suite bathroom. Separate living rooms add to the overall feeling of luxury, space and comfort, with comfortable furniture and ample space to sleep a three adult or two children (12 years old and younger).</p>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Deluxe Room</b></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/deluxe.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">
                    
                    
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
           <img src="../pictures/deluxe2.png" alt="Image placeholder" class="img-fluid">
            <div class="reviews-star float-left">
              
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/deluxe3.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3"  >
            <img src="../pictures/deluxe4.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          
            <p class="contenter">Rooms have an abundance of space, they easily sleep two adults and two children, making them perfect for families. They’re also ideal for couples and honeymooners in search of seclusion as well as romance, combining the best of classic beachfront living with the comforts of modern luxury.</p>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Regular Suite</b></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/regular.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">
                    
                    
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
           <img src="../pictures/regular2.png" alt="Image placeholder" class="img-fluid">
            <div class="reviews-star float-left">
              
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/regular3.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3"  >
            <img src="../pictures/regular4.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          
            <p class="contenter">With their prime positions on the top floors of our palatial suites, the sprawling 2,690 sq ft 3-bedroom Regular Suite boast expansive balconies with panoramic ocean views and space to sleep up to 10 guests. All bedrooms feature plush en-suite bathrooms, while the substantial living spaces and well-equipped kitchen facilities provide luxury and convenience for multi-generational families.</p>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Pelican Suite</b></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/pent.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">
                    
                    
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
           <img src="../pictures/pent2.png" alt="Image placeholder" class="img-fluid">
            <div class="reviews-star float-left">
              
            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3">
            <img src="../pictures/pent3.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3"  >
            <img src="../pictures/pent4.png" alt="Image placeholder" class="img-fluid">
            
            <div class="reviews-star float-left">

            </div>
            
          </div>
          
            <p class="contenter">This flexible property consists of two neighbouring three-bed villas, which can be booked individually as a three-bedroom villa with shared pool, or combined as a six-bedroom villa with its own exclusive pool. Ample space makes Pelican House ideal for co-vacationing families and couples looking to share the best of the Caribbean lifestyle together to sleep up to 12 guests.</p>
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>



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
    <?php include'testing_page.php' ?>
    
    
    <script>
    const date = new Date();

    const renderCalendar = () => {
    date.setDate(1);

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    document.querySelector(".date p").innerHTML = new Date().toDateString();

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        const j = new Date(date.getFullYear(), date.getMonth(), i);
        if (
        i === new Date().getDate() &&
        date.getMonth() === new Date().getMonth()
        ) {
        days += `<div class="today" onclick="setDate('${j.toDateString()}'); showReservations('${j}')">${i}</div>`;
        } else {
        days += `<div id="${date.getMonth() + 1 + "-" + i}" onclick="setDate('${j.toDateString()}'); openModalReservations(${(date.getMonth() + 1)})">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }
    };

    document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
    });

    document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
    });

    function setDate(j) {
        var arr1 = j.split(' ');
        monthindex = arr1[1].toLowerCase();
        var months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
        monthindex = months.indexOf(monthindex);
        console.log('day: ', arr1[0]);
        console.log('month: ', monthindex + 1);
        console.log('date: ', arr1[2]);
        console.log('year: ', arr1[3]);
        this.wholedate = j;
        this.chosendate = arr1[2];
        this.chosenmonth = "0" + (monthindex + 1);
        this.chosenyear = arr1[3];
    }
    
    function getDateChosen() {
        return this.chosendate
    }
    function getMonthChosen() {
        return this.chosenmonth
    }
    function getYearChosen() {
        return this.chosenyear
    }

    function getWholeDate() {
        return this.wholedate
    }

    function getFullDate() {
        var today = new Date();
        today =  getYearChosen() + '-' + getMonthChosen() + '-' + getDateChosen();
        return today
    }

    function openModalReservations(i) {
        datemodal = document.getElementById('headerModal');
        datemodal.innerHTML = "<h3s>Reservations for " + getWholeDate() + "</h3>";
        $('#reservationModal').modal('show');
    }

    renderCalendar();
    </script>

    <script>

    function openModal() {
        $('#confirmModal').modal('show');
    }

    function inputDate() {
        document.getElementById('checkin').value = getFullDate();
        $('#reservationModal').modal('hide');
    }

    
    </script>
    
    
</body>
</html>