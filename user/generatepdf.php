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

    $str='<center><h1>Blue Waters Reservation Report for '.$month_name. " " . $year. '</center></h1><br>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$year-$month-01' AND '$year-$month-31'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<h3>'.$row['name'].'</h3>'. " ". $row['cottagetype']. " " .'<br>'. "Expenses: ". $row['expenses']. " " .'<br>'."Balance: ".$row['balance']. " " .'<br>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
    $str.='<br>'. '<b>' . " Total Expenses: " . '</b>' . $totalexpenses . '<br>' . '<b>' . "Total Balance: ". '</b>' . $totalbalance;
    $dompdf = new Dompdf();
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

    $str='<center><h1>Blue Waters Reservation Report for '. " " . $year. '</center></h1><br>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$year-01-01' AND '$year-12-31'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<h3>'.$row['name'].'</h3>'. " ". $row['cottagetype']. " " .'<br>'. "Expenses: ". $row['expenses']. " " .'<br>'."Balance: ".$row['balance']. " " .'<br>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
    $str.='<br>'. '<b>' . " Total Expenses: " . '</b>' . $totalexpenses . '<br>' . '<b>' . "Total Balance: ". '</b>' . $totalbalance;
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

    $str='<center><h1>Blue Waters Reservation Report for '. $firstdate . " - " . $seconddate. '</center></h1><br>';
    $sql = "SELECT * FROM reservation WHERE `checkout` BETWEEN '$firstdate' AND '$seconddate'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $str.='<h3>'.$row['name'].'</h3>'. " ". $row['cottagetype']. " " .'<br>'. "Expenses: ". $row['expenses']. " " .'<br>'."Balance: ".$row['balance']. " " .'<br>';
            $totalbalance+=$row['balance'];
            $totalexpenses+=$row['expenses'];
        }
    }
    else {
        $str.='<h1>'."Error!".'</h1>';
    }
    $str.='<br>'. '<b>' . " Total Expenses: " . '</b>' . $totalexpenses . '<br>' . '<b>' . "Total Balance: ". '</b>' . $totalbalance;
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