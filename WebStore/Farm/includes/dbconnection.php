<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','dbadmins');

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($con->connect_error){
echo "Connection Fail".mysqli_connect_error();
die("Failed".$con->connect_error);
}


?>