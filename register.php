<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
    require 'app/config/connect.php';
    //login, register handler
    require 'app/controllers/auth/register.php';
    require 'app/controllers/auth/login.php';

    if(isset($_POST['email'])){

$fname =$_POST['fname'];
$lname=$_POST['lname'];
$mobilenum=$_POST['mobilenum'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$code = rand(1000,10000);
$name = $fname. ' '.$lname;
 $remark = 'Good Day, '.$name.'<br> You have created an account to our website PITA Recreation Resort<br>
 In Order to verify your account here is your Verification code: <b>'.$code.'</b>';
$sql_user ="INSERT INTO user set fname='$fname',lname='$lname',mobilenum='$mobilenum',email='$email',password='$password',code='$code',status='Pending'";
    $result = mysqli_query($con, $sql_user);
    if($result===TRUE){
function send_email_notif($email,$remark)
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
$mail->setFrom('PitaRecreationResort@gmail.com','PITA RECREATION RESORT'); //SENDER EMAIL
    $mail->addAddress($email); //RECEPIENT EMAIL
//Content
$mail->isHTML(true);                                  //Set email format to HTML ishanadzc
$mail->Subject = "VERIFICATION CODE";
$template    =$remark;
$mail->Body = $template;
$mail->send();
echo 'Message has been sent';
}
send_email_notif($email,$remark);
header('location:verification.php?id='.$email);
    }else{

    }

$con->close;
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
    <title>Account Registration</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
    </head>
    <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
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
        <div class="container">
            <div class="" style="width:60%;height:auto; background:rgba(255, 255, 255, 0.9);">
                <div class="card-header p-4">
                    <div class="card-body">
                       
                                      <h1 class="card-title">CREATE YOUR ACCOUNT</h1>
                            <hr>
                        <div class="container">
                             <form method="post">
                            <div id="usernameStatus"></div>
                            <div id="passwordstatus"></div>
                             <div class="error-text" style="color:blue"></div>
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="fname" placeholder="First name" class="form-control m-1">
                                <input type="text" name="mobilenum" placeholder="Mobile number" class="form-control m-1">
                                 <input type="password" name="password" placeholder="Create password" class="form-control m-1" onkeyup="active()"  id="pswrd_1">
                                </div>
                                <div class="col-md-6">
                                      <input type="text" name="lname" placeholder="Last name" class="form-control m-1">
                                      <input type="email" name="email" id='email' placeholder="Email" class="form-control m-1">
                                      <input type="password" placeholder="Confirm password" class="form-control m-1" onkeyup="matching()"  id="pswrd_2">

                                </div>
                               
                                <hr class="mt-2">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                 <input type="button" id="register" value="CREATE ACCOUNT" name="register" class="btn btn-primary form-control" disabled />
                             </div>
                             <div class="col-md-4">
                                 <a href="login.php" class="btn btn-warning form-control">CANCEL</a>
                             </div>
                             <div class="col-md-2"></div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <!-- The Modal -->
<div class="modal fade" id="terms">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms and Conditions</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
    <!-- TYPE SAMPLE TERMS AND CONDITIONS HERE -->
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        <br><br>
    </body>
</html>
<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
let user_status =document.querySelector('#usernameStatus');
var button = document.getElementById("#register");
     const x = document.querySelector("#pswrd_1");
  const y = document.querySelector("#pswrd_2");


     let msg2;
/*  const errorText = document.querySelector(".error-text");*/
    function usernameAvailability(usernameInput){
        $.ajax({
         method:"POST",
         url: "existing.php",
         data:{email:usernameInput},
         success: function(data){
           $('#usernameStatus').html(data);
         }
       });
 }
    $(document).on('input','#email',function(e){
    let usernameInput = $('#email').val();
    let msg;
    if(usernameInput.length==0){
      msg="<span style='color:red'>Enter Email</span>";
      document.getElementById("register").disabled = true;

    }else if((/^$|\s+/).test(usernameInput))
    {
     msg="<span style='color:red'>Email can't contain spaces</span>";
     document.getElementById("register").disabled = true;
    }
    else if(usernameInput.length!=0 && (usernameInput.length <5 || usernameInput.length >100)){
      //msg="<span style='color:red'>Email must be between 5-20</span>";
    }else{
      usernameAvailability(usernameInput);
    }
    $('#usernameStatus').html(msg);
});

function active(){
    msg2;
 if(x.value.length >= 8){
     y.removeAttribute("disabled", "");
     msg2='';
       document.getElementById("register").disabled = false;
  }else{
    pswrd_2.setAttribute("disabled", "");
    msg2="<span style='color:red'>Password atleast 8 characters</span>";
     document.getElementById("register").disabled = true;
  }
 $('#passwordstatus').html(msg2);
}

function matching(){
 if(x.value == y.value){
     /*errorText.style.display = "block";
          errorText.classList.add("matched");
          errorText.textContent = "Nice! Confirm Password Matched";*/
          msg2="<span style='color:green'>Password match</span>";
  
  }else if(y.value =='' && x.value!=''){
    /*errorText.style.display = "block";
          errorText.classList.add("matched");
          errorText.textContent = "Re-type your Password";
          return false;*/
  }
  else{
         msg2="<span style='color:red'>Password not match</span>";
  }
    $('#usernameStatus').html(msg2);
}
$(document).ready(function() {
$('form #register').click(function(e) {
let $form = $(this).closest('form');

Swal.fire({
  title: 'Are you sure you want to proceed?',
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
  title: 'Terms and conditions',
  input: 'checkbox',
  inputValue: 0,
  inputPlaceholder:
    'I agree with the terms and conditions ',
    text: "General Terms By accessing and placing an order with , you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below. These terms apply to the entire website and any email or other type of communication between you and .Under no circumstances shall team be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data or profit, arising out of the use, or the inability to use, the materials on this site, even if team or an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to change prices and revise the resources usage policy in any moment. ",
  confirmButtonText:
    'Continue <i class="fa fa-arrow-right"></i>',
  inputValidator: (result) => {
    return !result && 'You need to agree with T&C'
  }
}).then((accept)=>{
if (accept.isConfirmed) {
    Swal.fire(
      'Submitted!',
      'Your OTP has been sent to your email.',
      'success'
    )
    $form.submit();
}
});
  }else{
    Swal.fire(
      '',
      'Okay take your time.',
      'info'
    )
  }
})
});
});
</script>