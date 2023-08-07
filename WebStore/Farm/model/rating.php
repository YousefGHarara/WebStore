<?php


class rating {
    private $rating_id;
    private $user_id;
    private $store_id;
    private $rate;


    function setRatingId(string $rating_id) {
        $this->rating_id = $rating_id;
    }
    
    function getRatingId() : string {
        return $this->rating_id;
    }

    function setUserId(string $user_id) {
        $this->user_id = $user_id;
    }
    
    function getUserId() : string {
        return $this->user_id;
    }

    function setStoreId(string $store_id) {
        $this->store_id = $store_id;
    }
    
    function getStoreId() : string {
        return $this->store_id;
    }

    function setRate(string $rate) {
        $this->rate = $rate;
    }
    
    function getRate() : string {
        return $this->rate;
    }

}