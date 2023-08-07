<?php
session_start();

require_once '../includes/dbconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['rating'])){
        
        $store = $_SESSION['store_id'];
        $rating = $_POST['rating'];
        $user = $_POST['user'];
        
        $query = $con->query("SELECT * FROM store where store_id = $store");
        $result = $query->fetch_assoc();

        $user_query = $con->query("SELECT * from rating r, u_account u where r.user_id = u.user_id and u.user_name = '{$user}' and r.store_id = {$store}");
        $user_row = $user_query->fetch_assoc();


        if($user_query->num_rows <= 0){ 
            // no rating before
            $this_user = $con->query("SELECT * FROM u_account where user_name = '{$user}'")->fetch_assoc();
            $new_user_query = $con->query("INSERT INTO rating(user_id, store_id, rate) values( {$this_user['user_id']} , $store, $rating) ");



            $total_rate = $result['total_rate'];
            $num_of_rate = $result['number_of_rate'];
            $store_rate = $result['store_rate'];
            
            $new_total_rate = $rating + $total_rate;
            $new_num_of_rate = $num_of_rate + 1;
            $new_store_rate = round(($new_total_rate / $new_num_of_rate));
            
            $qry_update = $con->query("UPDATE store SET total_rate = $new_total_rate, number_of_rate = $new_num_of_rate, store_rate = $new_store_rate  WHERE store_id = $store");
            
            
        }else{
            // update exectly rating
            $old_rate = $user_row['rate'];
            $update_user_query = $con->query("UPDATE rating set rate = $rating, store_id = {$result['store_id']} where user_id = {$user_row['user_id']} and store_id = {$store}");
            
            $total_rate = $result['total_rate'];
            $store_rate = $result['store_rate'];
            $num_of_rate = $result['number_of_rate'];

            $new_total_rate = ($total_rate - $old_rate) + $rating;
            $new_store_rate = round(($new_total_rate / $num_of_rate));

            $qry_update = $con->query("UPDATE store SET total_rate = $new_total_rate, store_rate = $new_store_rate  WHERE store_id = $store");

        }
        
    }
}

?>

