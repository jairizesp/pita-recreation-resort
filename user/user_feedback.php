<?php 
    require '../app/config/connect.php';
    require '../app/controllers/post/add_post.php';
    require '../app/controllers/post/add_comment.php';
    //login, register handler


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Feedback</title>
    <link rel="icon" href="../ahhh/img/tablogo.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <link rel="stylesheet" href="../app/css/feed.css" />
    
    <link rel="stylesheet" href="../ahhh/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../ahhh/fonts/fontawesome/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    
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
    
  </head>

  <body class="bg-light" background="">
    <?php
        include "../navbar.php";
    ?>

    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../pictures/feed.jpg); border-radius: 0px; background-position: center; background-size: cover; height: 100vh; min-height: 700px;">
        <div class="container p-5">
            <br><br><br><br><br>
        <center>
        <h1 class="heading center p-2">        <?php
            $sql77 = "SELECT * FROM informations WHERE id='6'";
            $result77 = $con->query($sql77);

            if ($result77->num_rows > 0) { 

              while ($row77 = $result77->fetch_assoc()) {
                 echo $row77 ['title'];
              }
            }
            ?></h1>
        <h3 class="sub-heading center">        <?php
            $sql78 = "SELECT * FROM informations WHERE id='6'";
            $result78 = $con->query($sql78);

            if ($result78->num_rows > 0) { 

              while ($row78 = $result78->fetch_assoc()) {
                 echo $row78 ['description'];
              }
            }
            ?></h3>
        </div>
    </div>

    <div class="container" id="page-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="m-b-20 p-b-5 b-b-default f-w-600 p-3"><center>Feedbacks</center></h1><hr>
                </div>
               
                <div class="col-md-12">
                     <center>
                    <?php if (isset($_SESSION['login'])) {
                        ?>
                        <?php ?>
                        <button class="btn btn-primary" onclick="openAddPostModal()">Create Post</button><br><br> 
                        <?php
                    }
                    ?>
                     </center>
                </div>
           
            </div>
                


   <!--          <?php
                $sql = "SELECT * FROM posts WHERE approvalstatus='Approved' ORDER BY date Desc";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-6 p-3">
                    <div class="card w-100 h-100 mx-auto shadow rounded">
                        <h5 class="card-header"><?php echo $row['date']?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['user_post']?></h5>
                            <p class="card-text"><?php echo $row['description']?></p>
                            <img src = "uploads/<?php echo $row['image']?>" class ="w-100 rounded" onclick="openPostModal(<?php echo $row['id']?>)">
                        </div>
                    </div>
                </div>
                
            <?php 
                    }
                }
            ?> -->
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
            <div class="modal-body">
                <img src = "../pictures/wewewe.jpg" class ="rounded-circle mx-auto d-block w-50 border">
                <br><center><button type="button" class="button-18 w-25">Upload</button><center><br>
                <div class="input-group mb-3">
                    <label>First Name:</label>
                    <input class="form-control auth-input w-100 p-2" type="text" name="fnamereg" placeholder="First Name.." value="">
                </div>
                <div class="input-group mb-3">
                    <label>Last Name:</label>
                    <input class="form-control auth-input w-100 p-2" type="text" name="fnamereg" placeholder="First Name.." value="">
                </div>
                <div class="input-group mb-3">
                    <label>Email:</label>
                    <input class="form-control auth-input w-100 p-2" type="text" name="fnamereg" placeholder="First Name.." value="">
                </div>
                <div class="input-group mb-3">
                    <label>Contact Number:</label>
                    <input class="form-control auth-input w-100 p-2" type="text" name="fnamereg" placeholder="First Name.." value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-18" data-dismiss="modal">Close</button>
                <button type="button" class="button-18">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal for AddPost-->
    <div class="modal fade" id="modalAddPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="refnum" value="<?php echo $_GET['refnum']?>" hidden>
                    <input type="hidden" type="text" name="name" value="<?php echo $_SESSION['name']?>">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><h6>Post Description</h6></label>
                        <textarea class="form-control" name="postdescription" id="postdescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><h6>Image Upload</h6></label>
                        <br><input class="form-control" type="file" name="image" id="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="addfeedback" class="button-18 w-25" value="Post">
                </div>
                </form>
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
          <p class="col-md-6 text-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is for School Purpose Only
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            
          
        </div>
      </div>
    </footer>
    <script>

        function openModal(i) {
            $('#exampleModal' + i).modal('show');
        }

        function openPostModal(i) {
            $('#modalPost' + i).modal('show');
        }

        function openProfileModal() {
            $('#profileModal').modal('show');
        }

        function openAddPostModal() {
            $('#modalAddPost').modal('show');
        }
    </script>

  </body>
</html>
