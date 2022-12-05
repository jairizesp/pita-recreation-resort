<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\OAuth;
    use League\OAuth2\Client\Provider\Google;
    
    require_once '../admin/reservations/vendor/autoload.php';
    require_once '../admin/reservations/class-db.php';
    require_once '../../config/connect.php';

if ($_GET['paymentstatus'] == "COMPLETED") {
    $id = $_GET['userid'];
    $payment = $_GET['paymentbalance'] * 50;
    $emailget = $_GET['email'];
    

    $sql = "SELECT * FROM reservation WHERE id=$id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $updatedbalance = $row['balance'] - $payment;
            $sql1 = mysqli_query($con, "UPDATE reservation SET balance='$updatedbalance' WHERE id=$id");

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
            
            $mail->setFrom($email, 'Blue Waters Resort');
            $mail->addAddress($emailget);
            $mail->isHTML(true);
            $mail->Subject = 'Resort Reservation';
            $mail->Body = '<b>Your payment has been received. You paid '. $payment . '<br>Your total balance is: '. $updatedbalance .'</b>';
            
            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
}