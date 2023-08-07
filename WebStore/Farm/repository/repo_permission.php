<?php
include ("model/permission.php");

class repoPermission {

    function getAllPermission() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM permission");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getPermissionById($id) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM permission WHERE permission_id = {$id}");
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