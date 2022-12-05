<?php 
    require '../app/config/connect.php';
    require '../app/controllers/admin/reservations/edit.php';
    require '../app/controllers/admin/reservations/sendotp.php';
    require '../app/controllers/admin/reservations/addpayment.php';
    require '../app/controllers/admin/user/generatepdf.php';
    //login, register handler
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
    <title>Reservations Archived</title>

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
                <div class="sidebar-brand-text mx-2">RESORT ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            

            <!-- Divider -->
           

            <!-- Heading -->
            

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="reservations.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Reservations</span></a>
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
                    <h1 class="h3 mb-2 text-gray-800">Archived Reservations</h1>
                    <br>
<a class="btn btn-primary m-1" href='reservations.php'><i class="fas fa-arrow-left"></i> Back to Reservation in Table</a>
<h1></h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Check-in</th>
                                            <th scope="col">Check-out</th>
                                             <th scope="col">Method of Payment</th>
                                            <th scope="col">Total Payment</th>
                                            <th scope="col">Approval Status</th>
                                        <!--     <th scope="col">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM user INNER JOIN reservation ON reservation.userid = user.id WHERE approvalstatus='Rejected' OR approvalstatus='Checkout'";
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                        ?>
                                          <tr>
                                            <th scope="row"><?php echo $row['id']?></th>
                                            <td><?php echo $row['fname']?> <?php echo $row['lname']?></td>
                                            <td><?php echo $row['checkin']?></td>
                                            <td><?php echo $row['checkout']?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td><?php echo $row['Total_paid']?></td>
                                            <td><?php echo $row['approvalstatus']?></td>
                                          <!--   <td><button type="button" class="btn btn-success btn-icon-split" onclick="openApproveModal(<?php echo $row['id']?>)"><span class="text">Approve</span></button>
                                            <button type="button" class="btn btn-secondary btn-icon-split" onclick="openRejectModal(<?php echo $row['id']?>)"><span class="text">Reject</span></button>
                                            <button type="button" class="btn btn-primary btn-icon-split" onclick="openPayModal(<?php echo $row['id']?>)"><span class="text">Pay</span></button>
                                        </td> -->
                                          </tr>
                                          <!-- Edit Modal -->
                                          <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="reservations.php" method="POST">
                                                  <input type="hidden" type="text" name="id" value="<?php echo $row['id']?>">
                                                  <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                      <label>Name:</label>
                                                      <input class="form-control auth-input w-100 p-2" type="text" name="nameEdit" placeholder="First Name.." value="<?php echo $row['name']?>" disabled>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Check-in:</label>
                                                        <input class="form-control auth-input w-100 p-2" type="date" name="checkinEdit" placeholder="Email.." value="<?php echo $row['checkin']?>" >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Check-out:</label>
                                                        <input class="form-control auth-input w-100 p-2" type="date" name="checkoutEdit" placeholder="Mobile Number.." value="<?php echo $row['checkout']?>" >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Cottage Type:</label>
                                                        <input class="form-control auth-input w-100 p-2" type="text" name="cottagetypeEdit" placeholder="Mobile Number.." value="<?php echo $row['cottagetype']?>" >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Number of Adults:</label>
                                                        <input class="form-control auth-input w-100 p-2" type="text" name="adultEdit" placeholder="Mobile Number.." value="<?php echo $row['adult']?>" >
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Number of Children:</label>
                                                        <input class="form-control auth-input w-100 p-2" type="text" name="childrenEdit" placeholder="Mobile Number.." value="<?php echo $row['children']?>" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <input type="submit" name="editbutton" class="btn btn-warning" value="Save Changes">
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalDelete<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                    
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary btn-circle btn-sm" data-dismiss="modal">&times;</button>
                                                  <a href="../app/controllers/admin/reservations/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                                  
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Approve Modal -->
                                        <div class="modal fade" id="modalApprove<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Approve</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                  <a href="../app/controllers/admin/reservations/approve.php?id=<?php echo $row['id']; ?>&email=<?php echo $row['email']; ?>" class="btn btn-success">Yes</a>
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Reject Modal -->
                                        <div class="modal fade" id="modalReject<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                         <!-- Report Modal -->
                                         <div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal Report</h5>
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

    function openDeleteModal(i) {
        $('#modalDelete' + i).modal('show');
    }

    function openApproveModal(i) {
        $('#modalApprove' + i).modal('show');
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
    </script>
</body>

</html>