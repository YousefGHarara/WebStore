<?php
include ("model/user.php");

class repoUser {

    function getAllUser() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM u_account");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getUserByName($name) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM u_account WHERE user_name = '{$name}'");
        $arr = array();
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr += $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

}