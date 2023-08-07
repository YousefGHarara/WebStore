<?php
// require_once "includes/dbconnection.php";
// include("includes/includeAllClass.php");
$_SESSION['user'] = $_SERVER['REMOTE_ADDR'];
// $_SESSION['user'] = "::2";
$objUser = new repoUser;
// $user_qry = $con->query("select * from u_account where user_name = '{$_SESSION['user']}'");
$user_qry = $objUser->getUserByName($_SESSION['user']);

// if no any rows
// if($user_qry->num_rows <= 0){
//     $new_user_qry = $con->query("insert into u_account(user_name) values('{$_SESSION['user']}')");
//     $user_qry_fetch = $con->query("select * from u_account where user_name = '{$_SESSION['user']}'")->fetch_assoc();
//     $new_rating_qry = $con->query("insert into rating(user_id) values({$user_qry_fetch['user_id']})");
// }
if(empty($user_qry)){
    $new_user_qry = $con->query("insert into u_account(user_name) values('{$_SESSION['user']}')");
    $user_qry_fetch = $con->query("select * from u_account where user_name = '{$_SESSION['user']}'")->fetch_assoc();
    $new_rating_qry = $con->query("insert into rating(user_id) values({$user_qry_fetch['user_id']})");
}

?>