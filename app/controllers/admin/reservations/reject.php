<?php

//Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\OAuth;
    use League\OAuth2\Client\Provider\Google;
    $error_array = array();
 
    //Load Composer's autoloader
    require_once 'vendor/autoload.php';
    require_once 'class-db.php';
    require_once '../../../config/connect.php';

if (isset($_GET['id'])) {
    $emailget = $_GET['email'];
    $id = $_GET['id'];
    $query = mysqli_query($con, "UPDATE reservation SET approvalstatus='Rejected' WHERE id='$id'");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
     
    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
     
    $mail->SMTPAuth = true;
    $mail->AuthType = 'XOAUTH2';
     
    $email = 'wetutwetut@gmail.com'; // the email used to register google app
    $clientId = '439110869158-56bhomcm5vp0o0k2vhl6h450mmia7hna.apps.googleusercontent.com';
    $clientSecret = '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';
     
    $db = new DB();
    $refreshToken = $db->get_refersh_token();
     
    //Create a new OAuth2 provider instance
    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );
     
    //Pass the OAuth provider instance to PHPMailer
    $mail->setOAuth(
        new OAuth(
            [
                'provider' => $provider,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'refreshToken' => $refreshToken,
                'userName' => $email,
            ]
        )
    );
     
    $mail->setFrom($email, 'Reservation System');
    $mail->addAddress($emailget);
    $mail->isHTML(true);
    $mail->Subject = 'Resort Reservation';
    $mail->Body = '<b>Your reservation has been Rejected! Sorry for the inconvenience.</b>';
     
    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>