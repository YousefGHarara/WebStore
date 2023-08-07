<?php
require_once ("model/dbconnection.php");
include ("model/address.php");

class repoAddress {


    function getAllAddress() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM address");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }


    function getNumOfRows() : int {
        $con = DBConnection::getInstance()->getConnection();
        return $con->query("SELECT * FROM address")->num_rows;
    }

}