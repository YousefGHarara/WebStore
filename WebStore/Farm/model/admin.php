<?php

class admin {
    private $admin_name;
    private $admin_password;
    private $admin_email;
    private $admin_photo;
    private $permision_id;

    function __construct(string $admin_name = "yosuef", string $admin_password = "123", string $admin_email,
    string $admin_photo = "anime4.jpeg", int $permision_id)
    {
        $this->admin_name = $admin_name;
        $this->admin_password = $admin_password;
        $this->admin_email = $admin_email;
        $this->admin_photo = $admin_photo;
        $this->permision_id = $permision_id;
    }

    function setAdminName(string $admin_name) {
        $this->admin_name = $admin_name;
    }

    function getAdminName() : string {
        return $this->admin_name;
    }

    
    function setAdminPassword(string $admin_password) {
        $this->admin_password = $admin_password;
    }

    function getAdminPassword() : string {
        return $this->admin_password;
    }

    
    function setAdminPhoto(string $admin_photo) {
        $this->admin_photo = $admin_photo;
    }

    function getAdminPhoto() : string {
        return $this->admin_photo;
    }

    
    function setPermisionId(int $permision_id) {
        $this->permision_id = $permision_id;
    }

    function getPermisionId() : int {
        return $this->permision_id;
    }

    
    function setAdminEmail(int $admin_email) {
        $this->admin_email = $admin_email;
    }

    function getAdminEmail() : int {
        return $this->admin_email;
    }
    

    
    
}