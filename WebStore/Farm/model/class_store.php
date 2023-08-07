<?php

class store {
    private $store_id;
    private $store_name;
    private $category_name;
    private $store_photo;
    private $store_phone;
    private $store_address;
    private $total_rate;
    private $number_of_rate;
    private $store_rate;


    function setStoreId(string $store_id) {
        $this->store_id = $store_id;
    }
    
    function getStoreId() : string {
        return $this->store_id;
    }

    function setStoreName(string $store_name) {
        $this->store_name = $store_name;
    }
    
    function getStoreName() : string {
        return $this->store_name;
    }

    function setCategoryName(string $category_name) {
        $this->category_name = $category_name;
    }
    
    function getCategoryName() : string {
        return $this->category_name;
    }

    function setStorePhoto(string $store_photo) {
        $this->store_photo = $store_photo;
    }
    
    function getStorePhoto() : string {
        return $this->store_photo;
    }

    function setStorePhone(string $store_phone) {
        $this->store_phone = $store_phone;
    }
    
    function getStorePhone() : string {
        return $this->store_phone;
    }

    function setStoreAddress(string $store_address) {
        $this->store_address = $store_address;
    }
    
    function getStoreAddress() : string {
        return $this->store_address;
    }

    function setTotalRate(string $total_rate) {
        $this->total_rate = $total_rate;
    }
    
    function getStoreTotalRate() : string {
        return $this->total_rate;
    }

    function setNumberOfRate(string $number_of_rate) {
        $this->number_of_rate = $number_of_rate;
    }
    
    function getNumberOfRate() : string {
        return $this->number_of_rate;
    }

    function setStoreRate(string $store_rate) {
        $this->store_rate = $store_rate;
    }
    
    function getStoreRate() : string {
        return $this->store_rate;
    }

}