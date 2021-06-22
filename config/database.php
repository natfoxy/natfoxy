<?php

// Get mysql database connection
class Database{
 
    private $host = "localhost";
    private $db_name = "saddlery_store";
    private $username = "nat";
    private $password = "charlie123";
    public $db_conn;
 
    public function get_connection(){
 
        $this->dbconn = null;
 
        try{
            $this->db_conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->db_conn;
    }
 
}