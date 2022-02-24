<?php 

session_start();
//to connect to server giving server name username and password
define('SITEURL', 'http://localhost/food/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food');



$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
//to select the folder in server 
$sql_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>