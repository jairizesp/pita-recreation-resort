<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
    require '../app/config/connect.php';
/*    require '../app/controllers/admin/reservations/edit.php';*/
/*    require '../app/controllers/admin/reservations/sendotp.php';*/
    require '../app/controllers/admin/reservations/addpayment.php';
    require '../app/controllers/admin/user/generatepdf.php';
    //login, register handler
    date_default_timezone_set("Asia/Manila");
   $currentDate = date("Y-m-d");
   require'../app/controllers/admin/user/walkinresf.php';   


    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../ahhh/img/tablogo.png">
    <title>Reservations - Walk in</title>

    <!-- Custom fonts for this template -->
    <link href="boost/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="boost/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="boost/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Blue Waters</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="reservations.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Reservations</span>

   <?php
                       $pending ="SELECT * FROM reservation where approvalstatus='Pending'";
       $query2  = mysqli_query($con,$pending);
               $rowcount = mysqli_num_rows($query2);
        $available =$rowcount;
    if(mysqli_num_rows($query2)>0){ ?> 
                    <span style="text-align:right; margin-left:10px;color:#d9534f;background:#d62d20; font-size:13px; padding-left:5px;padding-right:5px;border-radius:5px;color:white;"> <?php echo $available ?> </span>
            <?php    }else{?>

            <?php } ?>
</a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            
            <!-- Nav Item - Tables -->
            
            <li class="nav-item">
                <a class="nav-link" href="rooms.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Rooms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cottage.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Cottage</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="posts.php">
                    <i class="fas fa-fw fa-camera-retro"></i>
                    <span>Posts</span></a>
            </li>
                        <hr class="sidebar-divider">

            <!-- Heading -->
            
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="informations.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Informations</span></a>
            </li>
                        <hr class="sidebar-divider">
            <!-- Heading -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Accounts</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="boost/img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="boost/img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="boost/img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Frontdesk</span>
                                <img class="img-profile rounded-circle"
                                    src="boost/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Walk in Guests
                    
                    <br>

<button onclick="#" class="btn btn-success" data-toggle='modal' data-target='#walkin'><i class="fas fa-plus"></i>Add</button>
                    <a href="reservations.php" class="btn btn-primary" >Reservations</a> <a href="archivedwalkin.php" class="btn btn-info" >Archived</a> </h1><br><br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Check-in</th>
                                            <th scope="col">Check-out</th>
                                            <th scope="col">Balance</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                            <!-- <th scope="col">type</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM reservation where payment_proof='' AND approvalstatus='Approved'";
                                            $result = $con->query($sql);
                                            $idd= 0;
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                        $idd++;
                                                    
                                        ?>
                                          <tr>
                                            <th scope="row"><?php echo $idd ?></th>
                                            <td><?php echo $row['name_guest'] ?></td>
                                            <td><?php echo $row['checkin']?></td>
                                            <td><?php echo $row['checkout']?></td>
                                            <td><?php echo $row['balance'] ?></td>
                                            <td><?php echo $row['approvalstatus']?></td>
                                            <td>
<?php if($currentDate < $row['checkout']){?>
<a type="button" class="btn btn-sm btn-secondary btn-icon-split" disabled><span class="text"data-toggle="modal" data-target="#checkout<?php echo $row['id']?>">Checkout</span></a>
<?php }else{?>
     <a type="button" class="btn btn-sm btn-primary btn-icon-split"><span class="text" data-toggle="modal" data-target="#checkout<?php echo $row['id']?>">Checkout</span></a>
<?php } ?>
                                                                                
<a type="button" class="btn btn-sm btn-info btn-icon-split"data-toggle="modal" data-target="#view<?php echo $row['id']?>"><span class="text">View</span></a>
<a type="button" class="btn btn-sm btn-success btn-icon-split"data-toggle="modal" data-target="#add<?php echo $row['id']?>"><span class="text">Add Room</span></a>
                                                
                                            </td>
                                          </tr>
                                         
<!-- The Modal -->
<div class="modal fade" id="checkout<?php echo $row['id']?>">
  <div class="modal-dialog">
    <form method="post">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
  <?php if($currentDate < $row['checkout']){ ?>
  <p style="text-align:center;font-size:25px;">ARE YOU SURE YOU WANT TO PROCEED EARLY CHECKOUT ?</p>
  <?php }elseif($currentDate = $row['checkout']){ ?>
<p style="text-align:center;font-size:25px;">ARE YOU SURE YOU WANT TO CHECKOUT ?</p>
 <?php } ?>
   <label>Method of Payment: </label>
<select class="form-control" name="mop">
  <option value="CASH">CASH</option>
    <option value="GCASH">GCASH</option>
    <input type="text" name="remaining" value="<?php echo $row['balance']?>"hidden >
     <input type="text" name="res_id" value="<?php echo $row['id']?>" hidden>

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name='checkoutwalk' class="btn btn-success btn-sm">Yes, Please Continue</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </div>
</form>
  </div>
</div>


<!-- The view -->
<div class="modal fade" id="view<?php echo $row['id']?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
          <div class="col-md-6">
      <label>Selected Rooms:</label>
      <br>
  <?php
  $guestid=$row['id'];
  $disproom="SELECT * FROM rooms where id in (SELECT roomid from rooms_walkin where id='$guestid')";
  $selected_room = $con->query($disproom);
if ($selected_room->num_rows > 0) {
  while($room =$selected_room->fetch_assoc()){
 ?>
 <span class="btn btn-info btn-sm"><?php echo $room['room_name']; ?></span>
<?php }}else{ ?>
<span class="btn btn-danger btn-sm">NO ROOM SELECTED</span>
<?php } ?>
  </div>
  <div class="col-md-6">
      <label>Selected Cottages:</label>
   <br>
  <?php
  $guestid=$row['id'];
  $dispcot="SELECT * FROM cottages where id in (SELECT cottageid from rooms_walkin where id='$guestid')";
  $selected_cottage = $con->query($dispcot);
if ($selected_cottage->num_rows > 0) {
  while($cottage =$selected_cottage->fetch_assoc()){
 ?>
 <span class="btn btn-info btn-sm"><?php echo $cottage['cottage_name']; ?></span>
<?php }}else{ ?>
<span class="btn btn-danger btn-sm">NO COTTAGE SELECTED</span>
<?php } ?>
  </div> 
       </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- The add -->
<div class="modal fade" id="add<?php echo $row['id']?>">
  <div class="modal-dialog modal-lg">
    <form method="post">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
        <input type="text" name="checkin" value="<?php echo $row['checkin'] ?>" hidden>
        <input type="text" name="checkout" value="<?php echo $row['checkout'] ?>" hidden>
        <input type="text" name="guestid" value="<?php echo $row['id'] ?>" hidden>
        <input type="text" name="balance" value="<?php echo $row['balance'] ?>"hidden>
          <div class="col-md-6">
      <label>Add Room:</label>
<select class="form-control" name="roomid">
  <option value="">SELECT ROOM</option>
  <?php
  $room_avail="SELECT * FROM rooms where status='Available'";
  $result2 = $con->query($room_avail);
if ($result2->num_rows > 0) {
  while($row =$result2->fetch_assoc()){
   ?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['room_name'] ?></option>
<?php }} ?>

</select>
  </div>
   <div class="col-md-6">
      <label>Add Cottage:</label>
<select class="form-control" name="cottageid">
  <option value="">SELECT COTTAGE</option>
  <?php
  $cottage="SELECT * FROM cottages where status='Available'";
  $result3 = $con->query($cottage);
if ($result3->num_rows > 0) {
  while($row =$result3->fetch_assoc()){
   ?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['cottage_name'] ?></option>
<?php }} ?>

</select>
  </div>

       </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm" name="add_rc">Add</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>


                                      

                                        
                                         <!-- Report Modal -->
                                         <div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal Monthly Reports</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <select class="form-control form-select-lg w-100 p-2" name="monthreport" id="monthreport" aria-label=".form-select-lg example">
                                                                <option disabled selected>Select Month</option>
                                                                <option value="01">January</option>
                                                                <option value="02">February</option>
                                                                <option value="03">March</option>
                                                                <option value="04">April</option>
                                                                <option value="05">May</option>
                                                                <option value="06">June</option>
                                                                <option value="07">July</option>
                                                                <option value="08">August</option>
                                                                <option value="09">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Year" name="yearreport" id="yearreport">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" name="generatebutton" class="btn-primary btn w-25" value="Generate">
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                         <!-- Report Modal -->
                                         <div class="modal fade" id="modalYearly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal Yearly Report</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Year" name="yearreports" id="yearreports">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="generateyearly" class="btn-primary btn w-25" value="Generate">
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                         <!-- Report Modal -->
                                         <div class="modal fade" id="modalWeekly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal Weekly Report</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="row w-100 p-2">
                                                        <div class="col-sm">
                                                            <input class="form-control form-select-lg w-100 h-100 p-2" type="date" id="firstdate" name="firstdate" placeholder="Check-in" >
                                                        </div>
                                                        <div class="col-sm">
                                                            <input class="form-control form-select-lg w-100 h-100 p-2" type="date" id="seconddate" name="seconddate"  placeholder="Check-out">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" name="generateweekly" class="btn-primary btn w-25" value="Generate">
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                          <!-- Reject Modal -->
                                          <div class="modal fade" id="modaArchive<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Reject</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                  <a href="../app/controllers/admin/reservations/reject.php?id=<?php echo $row['id']; ?>&email= <?php echo $row['email']; ?>" class="btn btn-secondary">Yes</a>
                                                  <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Payment Modal -->
                                        <div class="modal fade" id="modalPay<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Walk-in Payment</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <form action="" method="POST">
                                                  <input type="hidden" type="text" name="id" value="<?php echo $row['id']?>">
                                                  <div class="modal-body">
                                                    <h5>Total Expenses: </h5>
                                                    <?php echo $row['expenses']; ?>
                                                    <h5>Balance: </h5>
                                                    <?php echo $row['balance']; ?>
                                                    <div class="input-group mb-2">
                                                      <label><h5>Cash:</h5></label>
                                                      <input class="form-control auth-input w-100" type="text" id="cashPayment" name="cashPayment" onchange="doMath(<?php echo $row['balance']; ?> - this.value)" placeholder="...">
                                                    </div>
                                                    <div class="input-group mb-2">
                                                      <label><h5>Change:</h5></label>
                                                      <input class="form-control auth-input w-100" name="change" id="change" type="text" placeholder="..." disabled>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <input type="submit" name="paybutton" class="btn btn-primary" value="Pay">
                                                  </div>
                                                  </form>
                                                </div> 
                                            </div>
                                        </div>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<!-- The Modal -->
<div class="modal fade" id="walkin">
  <div class="modal-dialog">
    <form method="post">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="text-white">Walk in</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
 <label>Contact Person's Name:</label>
      <input type="text" class="form-control" name='name' required>
<div class="container">
    <div class="row">
        <div class="col-md-6">
      <label>Adults:</label>
      <input type="text" class="form-control" name='adult' required>
  </div>
  <div class="col-md-6">
      <label>Kids:</label>
      <input type="text" class="form-control" name='kids'>
  </div>
  <div class="col-md-6">
      <label>From Date:</label>
      <input type="text" class="form-control" value="<?php echo $currentDate ?>" readonly>
  </div>
  <div class="col-md-6">
      <label>To Date:</label>
      <input type="date" class="form-control" name='to_date' value="<?php echo $currentDate ?>">
  </div>
  <label>type of reservation:</label>
  <input type="text" class="form-control" name='type' value="Walk in" readonly>
</div>
</div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name='walkinguest' class="btn btn-success btn-sm">Yes, Please Continue</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </div>
</form>
  </div>
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../app/controllers/auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="boost/vendor/jquery/jquery.min.js"></script>
    <script src="boost/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="boost/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="boost/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="boost/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="boost/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="boost/js/demo/datatables-demo.js"></script>
    <script>
      function tableSearch() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

    function openModal(i) {
        $('#exampleModal' + i).modal('show');
    }

    function openModalReport() {
        $('#modalReport').modal('show');
    }

    function openWeekly() {
        $('#modalWeekly').modal('show');
    }

    function openYearly() {
        $('#modalYearly').modal('show');
    }

    function openDeleteModal(i) {
        $('#modalDelete' + i).modal('show');
    }

    function openApproveModal(i) {
        $('#modalApprove' + i).modal('show');
    }

    function openProofModal(i) {
        $('#modalProof' + i).modal('show');
    }

    function openRejectModal(i) {
        $('#modalReject' + i).modal('show');
    }

    function openPayModal(i) {
        $('#modalPay' + i).modal('show');
    }

    function openArchiveModal(i) {
        $('#modaArchive' + i).modal('show');
    }



    function openAccounts() {
        window.open("../admin/account.php", "_self");
    }

    function openArchive() {
        window.open("../admin/reservationarchive.php", "_self");
    }

    function openReservations() {
        window.open("../admin/reservations.php", "_self");
    }

    function openPosts() {
        window.open("../admin/posts.php", "_self");
    }

    function openDashboard() {
        window.open("../admin/dashboard.php", "_self");
    }

    function doMath(i) { 
      cashchange = document.getElementById("change");
      cashchange.value = i;
    }

$(function(){
$("#from_date").datepicker({
  beforeShowDay: function(date){
    var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [ holidays.indexOf(datestring) == -1 ]
},
showAnim:'drop',
numberOfMonth:1,
minDate:new Date(),
dateFormat:'yy-mm-dd',
onClose:function(selectedDate){
    $('#from_date').datepicker("option","minDate",selectedDate);
}
});
});
    </script>
</body>
  <script src="includes/script/jquery-ui.js"></script>
</html>