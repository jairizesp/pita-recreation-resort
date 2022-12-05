<?php 
    require '../app/config/connect.php';
    //login, register handler
    require '../app/controllers/reservation/cottage_reserve.php';
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
        <h1 class="heading center p-2">Timeless Luxury with a <br>Caribbean Soul</h1>
        <h3 class="sub-heading center">Book Now!</h3>
        </div>
    </div>
    <center>
    <section class="section visit-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading"><b>Cottage Reservation</b></h2>
            <hr>
          </div>
        </div>
      </div>
    </section>
    <div class="row align-items-center p-5 w-75">
                <div class="col-100 mx-auto">
                    <div class="card shadow border">
                    <form action="" method="POST">
                      <?php
                        $reservationid1 = $_GET['reserveid'];
                      ?>
                        <input type="hidden" type="text" name="reservationid" value="<?php echo $reservationid1 ?>">
                        <input type="hidden" type="text" name="name" value="<?php echo $name?>">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="row w-100 p-2">
                                <div class="col-sm">
                                    <select class="form-select form-select-lg w-100 p-2" name="cottage" aria-label=".form-select-lg example" id="rooms">
                                      <option disabled selected value="Hotel-Room">Cottage Type</option>
                                        <?php
                                          $sql2 = "SELECT * FROM cottages";
                                          $result2 = $con->query($sql2);

                                          if ($result2->num_rows > 0) {
                                              while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row2['cottage_name']?>"><?php echo $row2['cottage_name']?></option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                  <select class="form-select form-select-lg w-100 p-2" name="cottagenum" aria-label=".form-select-lg example" id="rooms">
                                    <option disabled selected value="Hotel-Room">Cottage Number</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select>
                                </div>
                                <div class="col">
                                  <input type="submit" name="reservebutton" class="button-18 w-100 h-100 p-2" value="Reserve">
                                </div>
                            </div> 
                            <div class="row w-100 p-2">
                                <?php if (in_array("Cottage type and Cottage Number is Occupied!<br>", $error_array)) echo "Cottage type and Cottage Number is Occupied!<br>";?>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    <br>
    <br>
    <br>
    <br>

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