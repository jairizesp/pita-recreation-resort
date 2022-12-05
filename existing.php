<?php
    require 'app/config/connect.php';
if(!empty(isset($_POST['email'])) && isset($_POST['email'])){
   $usernameInput= $_POST['email'];
   checkUsername($con, $usernameInput);
  
}
function checkUsername($con, $usernameInput){
  $query = "SELECT email FROM user WHERE email='$usernameInput'";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
    echo "<span style='color:red'>This email is already associated with a registered account</span>";
  }else{
    if(filter_var($usernameInput, FILTER_VALIDATE_EMAIL)){
       echo "<span style='color:green'>This email is available</span>";
     }else{
       echo "<span style='color:red'>Invalid Email address</span>";
     }
   
  }
}

?>