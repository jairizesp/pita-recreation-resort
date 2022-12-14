<?php 
    require '../app/config/connect.php';
    require '../app/controllers/admin/informations/add_information.php';
    //login, register handler
    require '../app/controllers/admin/rooms/edit_room.php';
        session_start();
    
    if(!isset($_SESSION["login"])){
    header('Location: /login.php');
    }

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
    <title>Image Settings</title>

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
                <div class="sidebar-brand-text mx-2">Resort Admin   <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
  

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            
           <!-- Nav Item - Tables -->
            <li class="nav-item">
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
<!--             <li class="nav-item ">
                <a class="nav-link" href="../admin/ChatApp/chat.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Chat</span></a>
            </li> -->
            <li class="nav-item ">
                <a class="nav-link" href="rooms.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Rooms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cottage.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Cottage</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rate.php">
                    <i class="fas fa-fw fa-question"></i>
                    <span>Rates</span></a>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="posts.php">
                    <i class="fas fa-fw fa-camera-retro"></i>
                    <span>Feedback</span></a>
            </li>
                        <hr class="sidebar-divider">

            <!-- Heading -->
            
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="informations.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Text Settings</span></a>
            </li>

    <!-- Nav Item - Tables -->
             <li class="nav-item active">
                <a class="nav-link" href="info_image.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Image Settings</span></a>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="faqs.php">
                    <i class="fas fa-fw fa-question"></i>
                    <span>FAQ's</span></a>
            </li>


                        <hr class="sidebar-divider">
            <!-- Heading -->

            <!-- Nav Item - Tables -->
            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

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
                         
                                <!-- Counter - Alerts -->
                             
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
                       
                                <!-- Counter - Messages -->
                       
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
                                        <div class="small text-gray-500">Emily Fowler ?? 58m</div>
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
                                        <div class="small text-gray-500">Jae Chun ?? 1d</div>
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
                                        <div class="small text-gray-500">Morgan Alvarez ?? 2d</div>
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
                                        <div class="small text-gray-500">Chicken the Dog ?? 2w</div>
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
                    <h1 class="h3 mb-2 text-gray-800">WEBSITE'S IMAGES<button type="button" class="btn btn-success" onclick="openAddServiceModal()" style="float: right;">Add Informations</button> </h1>
                    <br>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name </th>
                                            <th scope="col">Image Type</th>
                                            <th scope="col">Image Filename</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM img_info";
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                          <th scope="row"><?php echo $row['id']?></th>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['image_type']?></td>
                                             <td><?php echo $row['img_path']?></td>
                                            <td>
                                            
                                            <button type="button" class="btn btn-warning btn-icon-split" onclick="openModalEdit(<?php echo $row['id']?>)"><span class="text">Edit</span></button>
                                            <button type="button" class="btn btn-danger btn-icon-split" onclick="openModalDelete(<?php echo $row['id']?>)"><span class="text">Delete</span></button>
                                        </td>
                                          </tr>

                                            <div class="modal fade" id="openModalDelete<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary btn-circle btn-sm" data-dismiss="modal">&times;</button>
                                                  <a href="../app/controllers/admin/rooms/delete_img.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                                  
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
      <!-- EDIT-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                     <input class="form-control auth-input w-100 p-2" type="text" id="roomname" name="imgid"value="<?php echo $row['id']?>" hidden>
                                    <label for="exampleFormControlTextarea1"><h6>Image Name</h6></label>
                                    <input class="form-control auth-input w-100 p-2" type="text" id="roomname" name="imgname" placeholder="Title.." value="<?php echo $row['name']?>">
                                </div>
                                 <label>Image Type:</label>
                                        <select class="form-control" name="img_type">
                                             <option value="<?php echo $row['image_type']?>"><?php echo $row['image_type']?></option>
                                       <option value="Index Background">Index Background</option>
                                         <option value="Services Background">Services Background</option>
                                         <option value="Gallery">Gallery</option>
                                          <option value="Footer Image">Footer Image</option>
                                          <option value="Carousel Image">Carousel Image</option>
                                           <option value="Services Background">Services Background</option>
                                            <option value="Feedback Background">Feedback Background</option>
                                            <option value="Profile Background">Profile Background</option>
                                            <option value="Login Background">Login Background</option>
                                            <option value="Logo">Logo</option>
                                                    </select>
                                                     <label>Image Status:</label>
                                        <select class="form-control" name="img_status">
                                             <option value="<?php echo $row['status']?>"><?php echo $row['status']?></option>
                                    <option value="Active">Active Image</option>
                                         <option value="Inactive">Inactive Image</option>
                                                    </select>
                                                    <br>
                                <div class="form-group">
                                <label for="exampleFormControlTextarea1"><h6>Upload Image</h6></label>
                                     <input class="form-control " type="file" name="image" id="image">
                                </div>
                             </div>
                                <div class="modal-footer">
                                <input type="submit" name="edit_imginfo" class="btn btn-success" value="Save">
                            </form>
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


        
                    <!-- Add-->
                    <div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"><h6>Image Name</h6></label>
                                    <input class="form-control auth-input w-100 p-2" type="text" id="roomname" name="imgname" placeholder="Title.." value="">
                                </div>
                                 <label>Image Type:</label>
                                        <select class="form-control" name="img_type">
                                    <option value="Index Background">Index Background</option>
                                         <option value="Services Background">Services Background</option>
                                         <option value="Gallery">Gallery</option>
                                          <option value="Footer Image">Footer Image</option>
                                          <option value="Carousel Image">Carousel Image</option>
                                           <option value="Services Background">Services Background</option>
                                            <option value="Feedback Background">Feedback Background</option>
                                            <option value="Profile Background">Profile Background</option>
                                            <option value="Login Background">Login Background</option>
                                            <option value="Logo">Logo</option>
                                                    </select>
                                                    <br>
                                                     <label>Image Status:</label>
                                        <select class="form-control" name="img_status">
                                    <option value="Active">Active Image</option>
                                         <option value="Services Background">Inactive Image</option>
                                                    </select>
                                <div class="form-group">
                                <label for="exampleFormControlTextarea1"><h6>Upload Image</h6></label>
                                     <input class="form-control " type="file" name="image" id="image">
                                </div>
                             </div>
                            <div class="modal-footer">
                                <input type="submit" name="add_imginfo" class="btn btn-success" value="Add">
                            </div>
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
                        <span aria-hidden="true">??</span>
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

    function openModalEdit(i) {
        $('#ModalEdit' + i).modal('show');
    }
        function openModalDelete(i) {
        $('#openModalDelete' + i).modal('show');
    }

    function openGcashEdit(i) {
        $('#gcashEdit' + i).modal('show');
    }

    function openGcashQR(i) {
        $('#gcashQR' + i).modal('show');
    }

    openGcashQR
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
    function openViewPostModal(i) {
        $('#modalPost' + i).modal('show');
    }

    function openAccounts() {
        window.open("../admin/account.php", "_self");
    }

    function openReservations() {
        window.open("../admin/reservations.php", "_self");
    }

    function openAddServiceModal() {
        $('#modalAddService').modal('show');
      }

      function openAddServiceModal2() {
        $('#modalAddService2').modal('show');
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