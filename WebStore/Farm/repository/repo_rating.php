<?php
include ("model/rating.php");

class repoRating {

    function getAllCategory() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM rating");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

}