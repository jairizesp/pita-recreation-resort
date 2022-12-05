<?php
//Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $error_array = array();
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
 
    if (isset($_GET["email"]))
    {
        $email = $_GET["email"];
 
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'wetutwetut@gmail.com';
 
            //SMTP password
            $mail->Password = 'wetwet666';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('your_email@gmail.com');
 
            //Add a recipient
            $mail->addAddress($email);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
            $check_database_query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
            $check_login_query = mysqli_num_rows($check_database_query);
            if($check_login_query > 0) {
                $query = mysqli_query($con, "UPDATE user SET otp='$verification_code' WHERE email='$email'");
                $_SESSION['email'] = $email;
                header("Location: verifyotp.php");
                exit();
            }
            // insert in users table
            else {
                array_push($error_array, "Email is Invalid");
            }
 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>