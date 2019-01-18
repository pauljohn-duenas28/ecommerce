<?php 

$host = 'db4free.net';
$username = 'ecommerce_pj';
$password = 'O0Anm22Kr58B';
$dbname = 'ecom_pj';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}

// echo 'connected succesfully';

 ?>