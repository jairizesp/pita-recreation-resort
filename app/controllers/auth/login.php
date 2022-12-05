<?php
$error_array = array();

if (isset($_POST['loginbutton'])) {
    $email = filter_var($_POST['emaillogin'], FILTER_SANITIZE_EMAIL); //sanitize email
    $password = md5($_POST['passwordlogin']); //Get password

    $check_database_query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $row = mysqli_fetch_array($check_database_query);
    $check_login_query = mysqli_num_rows($check_database_query);
    if ($email == 'admin@gmail.com') {
        if($check_login_query == 1) {
            $username = $row['id'];
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("Location: admin/dashboard.php");
            exit(); 
        }
 
        else {
            array_push($error_array, "Email or password was incorrect<br>");
        } 
    }

    if ($email == 'frontdesk@gmail.com') {
        if($check_login_query == 1) {
            $username = $row['id'];
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("Location: frontdesk/reservations.php");
            exit(); 
        }
        else {
            array_push($error_array, "Email or password was incorrect<br>");
        } 
    }

    else if($check_login_query == 1 && $row['status'] =='Verified') {
        $username = $row['id'];
        $_SESSION["login"] = true;
        $_SESSION["name"] = $row['fname']." ".$row["lname"];
        $_SESSION["username"] = $username;
        $_SESSION["login_time_stamp"] = time(); 
        if($_SESSION['reserve']==true) {
            header("Location: reservation/available_dates.php");
            exit();
        }
        else {
            header("Location: index.php");
            exit();
        }
    }else if($check_login_query == 1 && $row['status'] =='Pending'){
        header("location:verification.php?id=".$row['email']);
    }
    else {
        array_push($error_array, "Email or password was incorrect<br>");
    } //End login query
}