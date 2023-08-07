<?php

class user {
    private $user_name;
    private $user_id;

    function setUserName(string $user_name) {
        $this->user_name = $user_name;
    }
    
    function getUserName() : string {
        return $this->user_name;
    }

    function setUserId(string $user_id) {
        $this->user_id = $user_id;
    }
    
    function getUserId() : string {
        return $this->user_id;
    }
    


}
