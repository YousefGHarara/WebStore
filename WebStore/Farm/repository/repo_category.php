<?php
include ("model/class_category.php");

class repoCategory {


    function getAllCategory() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM category");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getCategoryById(int $id) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM category WHERE category_id = {$id}");
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

    function getCategoryByName($name) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM category WHERE category_name = '{$name}'");
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
    
    function getNumOfRows() : int {
        $con = DBConnection::getInstance()->getConnection();
        return $con->query("SELECT * FROM category")->num_rows;
    }
    
    
    function categoryLimitFromTo($from, $to) : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM category limit $from, $to");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function addCategory(category $category) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $name = $category->getCategoryName();
        $code = $category->getCategoryCode();
        $query = $con->prepare("INSERT INTO category(category_name, category_code) VALUES(?, ?)");
        $query->bind_param("ss", $name, $code);
        $added = $query->execute();
        return $added;
    }

    function removeCategory(int $id) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->prepare("DELETE FROM category WHERE category_id = {$id}");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    function updateCategory(int $id, category $category) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $name = $category->getCategoryName();
        $code = $category->getCategoryCode();
        $query = $con->prepare("UPDATE category set category_name = ?, category_code = ? WHERE category_id = ?");
        $query->bind_param("ssi", $name, $code, $id);
        return $query->execute();
    }

    function searchCategory($filter){
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM category WHERE CONCAT(category_id,category_name,category_code) LIKE '%{$filter}%'");
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr[] = $row;
            }
        }else{
            return array();
        }
        return $arr;
    }

}