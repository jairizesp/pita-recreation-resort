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

    <title>Pita | Feedback</title>
    <link rel="icon" href="../ahhh/img/pitalogo2.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <link rel="stylesheet" href="../app/css/feed.css" />
    
    <link rel="stylesheet" href="../ahhh/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../ahhh/fonts/fontawesome/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
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
 $select_bg ="SELECT * FROM img_info where image_type='Feedback Background' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];  
         ?>
    <div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(../admin/uploads/<?php echo $imgurl ?>); border-radius: 0px; background-position: center; background-size: cover; height: 100vh; min-height: 700px;">
    <?php } ?>
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
                <div class="col">
                    <h1 class="m-b-20 p-b-5 b-b-default f-w-600 p-3"><center>Feedbacks</center></h1><hr>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php if (isset($_SESSION['login'])) {
                        ?>

                    <!--     <button class="btn btn-primary" onclick="openAddPostModal()">Create Post</button><br><br>  -->
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row p-3">
            <?php
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
                
            <!-- Modal for Post-->
            <div class="modal fade" id="modalPost<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title"><?php echo $row['user_post']?></h5>
                            <p class="card-text"><?php echo $row['description']?></p>
                            <img src = "uploads/<?php echo $row['image']?>" class ="w-100 rounded">
                        </div>
                        <form action="feedback.php" method="POST">
                        <div class="modal-footer">
                                    <?php if (isset($_SESSION['login'])) {
                                    ?>
                                    <input type="hidden" type="text" name="name" value="<?php echo $_SESSION['name']?>">
                                    <input type="hidden" type="text" name="postid" value="<?php echo $row['id']?>">

                                    <input class="form-control auth-input w-100 p-2" type="text" name="commentComment" placeholder="Add Comment.." id="comment" maxlength="280" value="">
                                    <input type="submit" name="addComment" class="btn btn-primary" value="Comment">
                                    <?php
                                }
                                ?>
                              
                        </div>
                        </form>
                        <div class="modal-body">
                            <?php
                                $rowid = $row['id'];
                                $sql1 = "SELECT * FROM comments WHERE approval_status='Approved' and post_id=$rowid";
                                $result1 = $con->query($sql1);

                                if ($result1->num_rows > 0) {
                                    while ($row1 = $result1->fetch_assoc()) {
                            ?>
                                <div class="card w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h5><?php echo $row1['name']?></h5>
                                            </div>
                                            <div class="col-3">
                                                <p class="fs-6"><?php echo $row1['date']?></p>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="column">
                                                <p><?php echo $row1['comment']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                    }
                }
            ?>
            </div>
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
                    <form action="profile.php" method="POST" enctype="multipart/form-data">
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
                    <input type="submit" name="addpostbutton" class="button-18 w-25" value="Post">
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
              <li><a href="../index.php" >Home </a></li>
                 <li><a href="../reservation/available_dates.php">Reservation</a></li>
            <li><a href="../reservation/services.php">About Us</a></li>
            <li><a href="#">Feedback</a></li>
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
