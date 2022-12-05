<?php 
    require 'app/config/connect.php';
    //login, register handler
    require 'app/controllers/auth/login.php';
    
    session_start();
?>
<html>
    <head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="ahhh/img/pitalogo2.png">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="app/css/login.css" />
    <title>USER</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <?php
 
 $select_bg ="SELECT * FROM img_info where image_type='Login Background' AND status='Active'";
           $result = $con->query($select_bg);
           if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgurl=$row['img_path'];  
         ?>
    <body style="background-image: url(admin/uploads/<?php echo $imgurl; ?>)">
    <?php }else{ ?>
               <body style="background-image: url(pictures/sample232.jpg);">
   <?php } ?>

        <center><br><br><br>
        <div class="container-fluid" id="page-content">
            <div class="card text-center w-25 shadow-lg">
                <div class="card-header p-4">
                    <div class="card-body">
                       
 <?php

          if(isset($_GET['return']) && $_GET['return']=='success'){ 
     echo'<div class="alert alert-success alert-dismissible col-sm-12">
    <a type="button" class="close" href="login.php">&times;</a>
    <strong>Account </strong>  created successfully.
  </div>';
}elseif (isset($_GET['return']) && $_GET['return']=='changed') {
    echo'<div class="alert alert-success alert-dismissible col-sm-12">
    <a type="button" class="close" href="login.php">&times;</a>
    <strong>Password </strong>was successfully changed.
  </div>';
}
  unset($_SESSION['success']);
           ?>
                    </div>
            
                    <div class="tab-content" id="myTabContent">
                        <!-- Login Tab-->   
                        <div class="tab-pane fade active show" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <h1 class="card-title">LOGIN</h1><br>
                            <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="email" id="emaillogin" name="emaillogin" placeholder="Email.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="password" id="passwordlogin" name="passwordlogin" placeholder="Password.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <a href="forgotpass.php" class="mr-2">Forgot Password?</a> |
                                <a href="register.php" class="ml-2">Dont have account?</a>
                            </div>
                            <div class="input-group mb-3">
                                <?php if (in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>";?>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" name="loginbutton" class="btn btn-success w-100" value="Login">
                            </div>
                             <div class="input-group mb-3">
                                <a href='index.php' class="btn w-100 btn-danger">Back to homepage</a>
                            </div>
                            </form>
                        </div>

                        <!-- Register Tab--> 
                    <!--     <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <h1 class="card-title">REGISTER</h1><br>
                            <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="text" name="fnamereg" placeholder="First Name.." value="" required>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="text" name="lnamereg" placeholder="Last Name.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="text" name="mobnumreg" placeholder="Mobile Number.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="email" name="emailreg" placeholder="Email.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control auth-input w-100 p-2" type="password" name="passwordreg" placeholder="Password.." value="">
                            </div>
                            <div class="input-group mb-3">
                                <?php if (in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>";?>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" name="registerbutton" class="button-18 w-100" value="Register">
                            </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>    
        </div>
        <br><br>
    </body>
</html>