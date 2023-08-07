<?php


class permission {
    private $permission_id;
    private $permission_type;


    function setPermissionId(string $permission_id) {
        $this->permission_id = $permission_id;
    }
    
    function getPermissionId() : string {
        return $this->permission_id;
    }


    function setPermissionType(string $permission_type) {
        $this->permission_type = $permission_type;
    }
    
    function getPermissionType() : string {
        return $this->permission_type;
    }

}