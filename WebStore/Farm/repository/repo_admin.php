<?php
include ("model/admin.php");

class repoAdmin {

    

    function getAllAdmin() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM admins");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getAdminById($id) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM admins WHERE admin_id = {$id}");
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

    function getAdminByPermission($permission) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM admins WHERE permission_id = {$permission}");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function checkIsAdmin($admin_name, $admin_password) : array {
        $con = DBConnection::getInstance()->getConnection();
        // $pass = ;
        $query = $con->query("SELECT * FROM admins WHERE admin_name = '{$admin_name}'");

        // while($row = $query->fet){
            $arr = array();
            if($query->num_rows > 0){
                while ($row = $query->fetch_assoc()){
                    if(password_verify($admin_password, $row['admin_password'])){
                        $arr += $row;
                    }
                }
            }else {
                return array();
            }
        
        return $arr;
    }

    function updateImageAdmin(int $id, $photo) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->prepare("UPDATE admins set admin_photo = ? where admin_id = ?");
        $query->bind_param("si", $photo, $id);
        return $query->execute();
    }
    

}