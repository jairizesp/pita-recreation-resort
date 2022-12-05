<?php
ob_start(); //Turns on output buffering
session_start();
date_default_timezone_set('Asia/Manila');

$con = mysqli_connect("localhost", "root", "", "reservationsystem1"); //Connection variable

if (!$con) {
	// echo "Failed to yawa: " . mysqli_connect_errno();
	die('Connection Error');
}




