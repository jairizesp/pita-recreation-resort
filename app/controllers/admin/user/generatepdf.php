
<?php
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;



$str="";
$totalbalance=0;
$totalexpenses=0;

if (isset($_POST['generatebutton'])) {
    $month = $_POST['monthreport'];
    $year = $_POST['yearreport'];
    $month_name = date("F", mktime(0, 0, 0, $month, 10));
    $dompdf = new Dompdf();

    $str='<html><head><meta charset="utf-8"><title>Reservation Report</title></head><body><div style="background-color: #BDD7EE; border: 2px solid red; padding: 10px;"><h2 align="center">Monthly Resort Reservation Report</h2><div style="font-size: 17px;"><b>Resort Name: <u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">Blue Waters</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period Covered:<u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">'.$month_name. " " . $year. '</u></b></div><div style="color: white; background-color: #1B507A; margin: 10px 10px 0px; padding: 1px 10px 1px;"><b>RESERVATION</b></div>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$year-$month-01' AND '$year-$month-31' AND approvalstatus='checkout'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<div style="margin: 0px 10px;"><h4>Customer:&nbsp;<i></i></h4>'. "<p style='background-color: white; margin-left: 15px; margin-right: 15px; padding: 5px;'>GCASH REFERENCE NUMBER:................................................................................................................". $row['payment_proof']. " " .'<br>'. "Payment:.....................................................................................................................Php &nbsp;". $row['expenses']. " " .'<br>'."Balance:......................................................................................................................Php &nbsp;".$row['balance']. " " .'</p></div>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
    $str.='<br>'. '<div style="text-align: right; margin-bottom: 10px; margin-right: 20px;"><b>' . " Total Payments: " . '</b><u>Php &nbsp;' . $totalexpenses . '</u><br>' . '<b>' . "Total Balance: ". '</b><u>Php &nbsp;' . $totalbalance . '</u></div></div></body></html>';
    
    $dompdf->loadHtml($str);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
}
else if (isset($_POST['generateyearly'])) {
    $year = $_POST['yearreports'];

    $str='<html><head><meta charset="utf-8"><title>Reservation Report</title></head><body><div style="background-color: #BDD7EE; border: 2px solid red; padding: 10px;"><h2 align="center">Annual Resort Reservation Report</h2><div style="font-size: 17px;"><b>Resort Name: <u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">Blue Waters</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period Covered:<u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">' . $year. '</u></b></div><div style="color: white; background-color: #1B507A; margin: 10px 10px 0px; padding: 1px 10px 1px;"><b>RESERVATION</b></div>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$year-01-01' AND '$year-12-31'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<div style="margin: 0px 10px;"><h4>Customer:&nbsp;<i></i></h4>'. "<p style='background-color: white; margin-left: 15px; margin-right: 15px; padding: 5px;'>GCASH REFERENCE NUMBER:................................................................................................................". $row['payment_proof']. " " .'<br>'. "Payment:.....................................................................................................................Php &nbsp;". $row['expenses']. " " .'<br>'."Balance:......................................................................................................................Php &nbsp;".$row['balance']. " " .'</p></div>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
     $str.='<br>'. '<div style="text-align: right; margin-bottom: 10px; margin-right: 20px;"><b>' . " Total Payments: " . '</b><u>Php &nbsp;' . $totalexpenses . '</u><br>' . '<b>' . "Total Balance: ". '</b><u>Php &nbsp;' . $totalbalance . '</u></div></div></body></html>';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($str);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
}

else if (isset($_POST['generateweekly'])) {
    //check in 
    $firstdate = $_POST['firstdate'];

    //check out 
    $seconddate = $_POST['seconddate'];

    $str='<html><head><meta charset="utf-8"><title>Reservation Report</title></head><body><div style="background-color: #BDD7EE; border: 2px solid red; padding: 10px;"><h2 align="center">Weekly Resort Reservation Report</h2><div style="font-size: 17px;"><b>Resort Name: <u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">Blue Waters</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period Covered:<u style="background-color: white; padding: 5px 10px 1px; margin: 5px;">'. $firstdate . " - " . $seconddate. '</u></b></div><div style="color: white; background-color: #1B507A; margin: 10px 10px 0px; padding: 1px 10px 1px;"><b>RESERVATION</b></div>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$firstdate' AND '$seconddate'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<div style="margin: 0px 10px;"><h4>Reference Number:&nbsp;<i>'.$row['payment_proof'].'</i></h4>'. "<p style='background-color: white; margin-left: 15px; margin-right: 15px; padding: 5px;'> '<br>'Payment:.....................................................................................................................Php &nbsp;". $row['expenses']. " " .'<br>'."Balance:......................................................................................................................Php &nbsp;".$row['balance']. " " .'</p></div>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
    $str.='<br>'. '<div style="text-align: right; margin-bottom: 10px; margin-right: 20px;"><b>' . " Total Payments: " . '</b><u>Php &nbsp;' . $totalexpenses . '</u><br>' . '<b>' . "Total Balance: ". '</b><u>Php &nbsp;' . $totalbalance . '</u></div></div></body></html>';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($str);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
}
else {
    $str.='No Records Found!';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($str);
}
?>