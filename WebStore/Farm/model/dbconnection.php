<?php

class DBConnection {
    private $DB_HOST = "localhost";
    private $DB_USER = "root";
    private $DB_PASS = "";
    private $DB_NAME = "dbadmins";
    private static $instance = null;

    private function __construct()
    {
        
    }
    
    public static function getInstance(){
        if(DBConnection::$instance == null){
            DBConnection::$instance = new DBConnection;
        }
        return DBConnection::$instance;
    }

    public function getConnection() {
        return new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
    }

}