<?php
include ("model/class_store.php");
// include ("../model/class_store.php");

class repoStore {

    function getAllStore() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getStoreById($id) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE store_id = {$id}");
        $arr[] = array();
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr += $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getIdByStoreName($name) : int {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE store_name = '{$name}'");
        $id = -1;
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $id = $row['store_id'];
            }
        }
        return $id;
    }

    function getStoreByName($name) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE store_name = '{$name}'");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getStoreByCategoryName($category_name) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE category_name = '{$category_name}'");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getStoreByAddress($address) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE store_address = '{$address}'");
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
        return $con->query("SELECT * FROM store")->num_rows;
    }

    function storeLimitFromTo($from, $to) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store limit $from, $to");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function addStore(store $store) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $category = $store->getCategoryName();
        $name = $store->getStoreName();
        $phone = $store->getStorePhone();
        $address = $store->getStoreAddress();
        $photo = $store->getStorePhoto();
        $query = $con->prepare("INSERT INTO store(category_name, store_name, store_phone, store_address, store_photo) VALUES(?, ?, ?, ?, ?)");
        $query->bind_param("sssss", $category, $name, $phone, $address, $photo);
        $added = $query->execute();
        return $added;
    }

    function removeStore(int $id) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->prepare("DELETE FROM store WHERE store_id = {$id}");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    function updateStore(int $id, store $store) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $category = $store->getCategoryName();
        $name = $store->getStoreName();
        $phone = $store->getStorePhone();
        $address = $store->getStoreAddress();
        $query = $con->prepare("UPDATE store set category_name = ?, store_name = ?, store_phone = ?, store_address = ? WHERE store_id = ?");
        $query->bind_param("ssssi", $category, $name, $phone, $address, $id);
        return $query->execute();
    }

    function updateStorePhoto(int $id, store $store) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $photo = $store->getStorePhoto();
        $query = $con->prepare("UPDATE store set store_photo = ? WHERE store_id = ?");
        $query->bind_param("si", $photo, $id);
        return $query->execute();
    }

    function searchStore($filter) : array{
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE CONCAT(store_name, category_name, store_address) LIKE '%{$filter}%'");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else{
            return array();
        }
        return $arr;
    }

    function storeLimitFromToByCategoryName($name, $from, $to) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM store WHERE category_name = '{$name}' limit $from, $to");
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