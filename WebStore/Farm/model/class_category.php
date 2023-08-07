<?php


class category {
    private $category_id;
    private $category_name;
    private $category_code;


    function setCategoryId(string $category_id) {
        $this->category_id = $category_id;
    }
    
    function getCategoryId() : string {
        return $this->category_id;
    }

    function setCategoryName(string $category_name) {
        $this->category_name = $category_name;
    }
    
    function getCategoryName() : string {
        return $this->category_name;
    }

    function setCategoryCode(string $category_code) {
        $this->category_code = $category_code;
    }
    
    function getCategoryCode() : string {
        return $this->category_code;
    }

}