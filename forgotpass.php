<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
    require 'app/config/connect.php';
    //login, register handler
    require 'app/controllers/auth/register.php';
    require 'app/controllers/auth/login.php';
unset($_SESSION['error']);
    if(isset($_POST['forgot'])){
        $email=$_POST['email'];
        $rand =rand(1000,10000);
        $select="SELECT * FROM user where email='$email'";
         $result2 = $con->query($select);
     if ($result2->num_rows > 0) {
        $update ="UPDATE user set code='$rand' where email='$email'";
         $result = mysqli_query($con, $update);
    if($result===TRUE){
function send_email_notif($email,$rand)
{
$mail = new  PHPMailer(true);
$mail->SMTPDebug = 1;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'ishanadzc@gmail.com';                     //SMTP username
$mail->Password   = 'mbhhwesruwydswbt';                               //SMTP password
$mail->SMTPSecure = "tls";           //Enable implicit TLS encryption
$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->Mailer = "smtp";  
//Recipients
$mail->setFrom('ishanadzc@gmail.com','BLUE WATERS HOTEL'); //SENDER EMAIL
    $mail->addAddress($email); //RECEPIENT EMAIL
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = "Password Recovery Code";
$template    ="Your Password Recover Code is:".$rand;
$mail->Body = $template;
$mail->send();
echo 'Message has been sent';
}
send_email_notif($email,$rand);
header('location:forgot_verification.php?email='.$email);
    }else{

    }

}else{
     $_SESSION['error']='Wrong code';
}

    }
?>
<html>
    <head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="ahhh/img/tablogo.png">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="app/css/login.css" />
    <title>Account Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
    </head>
    <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
    <body style="background-image: url(pictures/sample232.jpg);">
        <center><br><br><br>
        <div class="container">
            <div class="" style="width:60%;height:auto; background:rgba(255, 255, 255, 0.9);">
                <div class="card-header p-4">
                    <div class="card-body">
                            <h1 class="card-title" style="font-family:'Russo One';">FORGOT PASSWORD</h1>
                            <hr>
                        <div class="container">
                             <form method="post">
                            <div class="row">
                           <p>Please enter email address that was registered to your account.</p>
                           <div class="col-md-12">
                           <input type="text" name="email" placeholder="Enter email address" class="form-control col-md-6 text-center">
                       </div>
                       <hr class="mt-4">
                       <div class="col-md-4"></div>
                       <div class="col-md-4">
                          <button type="submit" id="register" value="Verify" name="forgot" class="btn btn-primary form-control">Forgot Password</div>
                       </div>

                       <div class="col-md-4"></div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <br><br>
    </body>
</html>
<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <?php if(isset($_SESSION['error']) && $_SESSION['error'] !='')
{
?>
<script>
  Swal.fire({
  icon: 'error',
  title: 'Email does not exist',
  text: 'Make sure the email is registered to the system'
})</script>
<?php
unset($_SESSION['error']);
} ?>
<script>
 


</script>
