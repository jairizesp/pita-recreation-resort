<?php 

    require 'app/config/connect.php';
    //login, register handler
    require 'app/controllers/auth/register.php';
    require 'app/controllers/auth/login.php';
unset($_SESSION['error']);
if(isset($_POST['newpass'])){
    $email=$_POST['email'];
    $pass=md5($_POST['newpass']);
    $select="UPDATE user SET password='$pass' where email='$email'";
    $result2 = $con->query($select);
    if($result2===TRUE){
    header('location:login.php?return=changed');
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
                            <h1 class="card-title" style="font-family:'Russo One';">CREATE NEW PASSWORD</h1>
                            <hr>
                        <div class="container">
                             <form method="post">
                            <div class="row">
                           <p>Enter your new password to proceed.</p>
                             <div id="usernameStatus"></div>
                           <div class="col-md-12">
                            <input type="text" name="email" placeholder="Enter code" class="form-control col-md-3 text-center"value='<?php echo $_GET['email']?>' hidden>
                           <input type="password" name="newpass"id='pswrd_1' placeholder="Create new password" class="form-control col-md-4 text-center"onkeyup="matching()" >
                            <input type="password"id='pswrd_2' onkeyup="matching()" placeholder="Repeat new password" class="form-control col-md-4 text-center mt-3">
                       </div>
                       <hr class="mt-4">
                       <div class="col-md-4"></div>
                       <div class="col-md-4">
                          <input type="button" id="register" value="Verify" name="register" class="btn btn-success form-control"/>
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
  title: 'Wrong verification code',
  text: 'Check your email for the verification code'
})</script>
<?php
unset($_SESSION['error']);
} ?>

<script type="text/javascript">
   $(document).ready(function() {
$('form #register').click(function(e) {
let $form = $(this).closest('form');
  let timerInterval;
Swal.fire({
  title: 'Are you sure?',
  text: "You want to proceed?",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Verify'
}).then((result) => {
  if (result.isConfirmed) {
   $form.submit();
  }
})

});
});
 const x = document.querySelector("#pswrd_1");
  const y = document.querySelector("#pswrd_2");
     let msg2;

function active(){
 if(x.value.length >= 6){
     y.removeAttribute("disabled", "");
  }else{
    pswrd_2.setAttribute("disabled", "");
  }

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
</script>
