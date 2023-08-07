<?php


class address{
    private $address_name;
    private $address_id;


    function setAddressName(string $address_name) {
        $this->address_name = $address_name;
    }
    
    function getAddressName() : string {
        return $this->address_name;
    }


    function setAddrssId(string $address_id) {
        $this->address_id = $address_id;
    }
    
    function getAddressId() : string {
        return $this->address_id;
    }
}