<?php 
	ob_start();
	session_start();
	error_reporting(0);
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smshetty_admin";
	$connect = mysqli_connect($server,$username,$password,$dbname)or die("Database connection failed!!!");
	if ($connect) {
		include 'functions.php';
		//echo "database connected";
	}
?>