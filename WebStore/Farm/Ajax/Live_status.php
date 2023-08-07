<?php

session_start();
require_once '../includes/dbconnection.php';
$rate_num = 0;
$store_id = $_SESSION['store_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $query = $con->query("SELECT r.rate FROM u_account u, rating r where u.user_id = r.user_id and u.user_name = '{$user}' and r.store_id = {$store_id}")->fetch_assoc();
        $rate_num = !empty($query['rate'])?$query['rate']:0;
    }
}
?>


<div class="r-al-b">Overall Rating : <span><?=$rate_num?></span></div>