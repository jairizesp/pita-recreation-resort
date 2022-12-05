<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\OAuth;
 use League\OAuth2\Client\Provider\Google;
 
 require_once 'vendor/autoload.php';
 require_once 'class-db.php';
//-- Declaring variables to prevent errors --//
$date = "";
$name = "";
$checkin = "";
$checkout = "";
$cottagetype = "";
$adultnum = "";
$childrennum = "";
$expenses = 0;
$roomnumber = 0;
$sampleint = 0;
$roomprice = 0;
$adulttotalprice = 0;
$childrentotalprice = 0;
$currentuseremail = "";
$error_array = array();
$servicesavailed = array();
$servicesavailedprices = array();


if (isset($_POST['reservebutton'])) {       
    if("" == trim($_POST['name'])){
        $_SESSION['inputCottage'] = $_POST['cottage'];
        $_SESSION['inputCheckin'] = $_POST['checkin'];
        $_SESSION['inputCheckout'] = $_POST['checkout'];
        $_SESSION['inputAdultnum'] = $_POST['adultnum'];
        $_SESSION['inputChildrennum'] = $_POST['childrennum'];
        $_SESSION['reserve'] = true;
        header("Location: ../login.php");
        exit();
    } 
    else {
        //-- Registration form values --//
        //cottagetype
        $name = strip_tags($_POST['name']); //Remove html tags
    
        $currentuserid = strip_tags($_POST['userid']);
        //cottagetype
        $cottagetype = strip_tags($_POST['cottage']); //Remove html tags
    
        //$looplength = $_POST['loopservice'];
    
        //$service = $_POST['service0'];
    
        //check in 
        $checkindatewhole = $_POST['checkin'];
        $checkin = strtotime($_POST['checkin']); //Remove html tags
        $checkindate=date('d',$checkin);
        $checkinmonth=date('m',$checkin);
        $checkinyear=date('Y',$checkin);
    
        //check out 
        $checkoutdatewhole = $_POST['checkout'];
        $checkout = strtotime($_POST['checkout']); //Remove html tags
        $checkoutdate=date('d',$checkout);
        $checkoutmonth=date('m',$checkout);
        $checkoutyear=date('Y',$checkout);
    
        $date1 = new DateTime($checkindatewhole);
        $date2 = new DateTime($checkoutdatewhole);
        $checkdifference = date_diff($date1, $date2);
        $diffDays = intval($checkdifference->format("%d"));
    
        $loopnumber=0;
        if(isset($_POST['loopservicenumber'])) {
            $loopnumber = $_POST['loopservicenumber'];
        }
        else{
            $loopnumber=0;
        }

        //Number of Adults
        $adultnum = strip_tags($_POST['adultnum']); //Remove html tags
        $adulttotalprice = $adultnum * 500;
    
        //Numer of Children
        $childrennum = strip_tags($_POST['childrennum']); //Remove html tags
        $childrentotalprice = $childrennum * 300;

        $sql2="SELECT * FROM rooms WHERE room_name='$cottagetype'";
        $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $roomprice += $row2['price'];
                $expenses = ($diffDays * $row2['price']) + ($adultnum * 500) + ($childrennum * 300);
            }
        }

        $sql3="SELECT * FROM user WHERE id='$currentuserid'";
        $result3 = $con->query($sql3);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                $currentuseremail = $row3['email'];
            }
        }
    
        $checkindatesample=date('Y-m-d', strtotime($checkindatewhole));
        $checkoutdatesample=date('Y-m-d', strtotime($checkoutdatewhole));
    
        $sqlquery1 = "SELECT * FROM reservation WHERE cottagetype='$cottagetype'";
        $result1 = $con->query($sqlquery1);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                
                //echo $paymentDate; // echos today! 
                $checkindateindatabase = date('Y-m-d', strtotime($row['checkin']));
                $checkoutdateindatabase = date('Y-m-d', strtotime($row['checkout']));
                    
                if (($checkindatesample >= $checkindateindatabase) && ($checkindatesample <= $checkoutdateindatabase)){
                    array_push($error_array, "Room and Date Occupied!<br>");
                }
                else if (($checkoutdatesample >= $checkindateindatabase) && ($checkoutdatesample <= $checkoutdateindatabase)){
                    array_push($error_array, "Room and Date Occupied!<br>");
                }
                else{
    
                }
            }
        }

    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        if(isset($_POST['service0'])) {
            for($i=0;$i<=$loopnumber;$i++) {
                $serviceavailed = $_POST['service'.$i];
                $sqlquery1 = "SELECT * FROM services WHERE service_name='$serviceavailed'";
                $result1 = $con->query($sqlquery1);
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $expenses += $row['price'];
                        $servicesavailedprices .= $row['price'];
                    }
                }
            }    
        }
        //Insert Data to database
        $query1 = mysqli_query($con, "INSERT INTO `reservation` (cottagetype, checkin, checkout, adult, children, approvalstatus, expenses, name, balance, payment_proof) 
        VALUES ('$cottagetype', '$checkindatewhole', '$checkoutdatewhole', '$adultnum', '$childrennum', 'Pending', '$expenses', '$name', '$expenses', 'none')");
        $lastidnum = mysqli_insert_id($con);

        if(isset($_POST['service0'])) {
            for($i=0;$i<=$loopnumber;$i++) {
                $serviceavailed = $_POST['service'.$i];
                $query2 = mysqli_query($con,"INSERT INTO `services_availed` (reservation_number, services_id) VALUES ('$lastidnum','$serviceavailed')");
            }   
        } 

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
        $mail->addAddress($currentuseremail);
        $mail->isHTML(true);
        $mail->Subject = 'Resort Reservation';
        $mail->Body = '<b>The Receipt for your Reservation. ID #'. $lastidnum . '<br>'. $cottagetype .': '. $roomprice . '<br> Adult: '. $adultnum . ' (' . $adulttotalprice . ')<br>Children: ' . $childrennum . ' (' . $childrentotalprice . ')<br> Services Availed:<br>' . 'Total: ' . $expenses;
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        header("Location: ../user/profile.php");
        exit();
    } 
}
}
//-- Start Register Button --//
