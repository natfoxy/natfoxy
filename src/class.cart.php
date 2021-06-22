<?php

class Cart {

    private $db_conn;
    private $db_tbl = "cart";
 
    public $id;
    public $user_id;
    public $discount_id;
 
    public function __construct($db){
        $this->db_conn = $db;
    }

    public function check_discount() {
        
        $query = "SELECT count(*) 
                  FROM $this->db_tbl
                  WHERE user_id = 1 AND discount_id = 1 
                  LIMIT 1";

        $discount_stmt = $this->db_conn->prepare($query);

        $this->discount_id = htmlspecialchars(strip_tags($this->discount_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $discount_stmt->bindParam(":discount_id", $this->discount_id);
        $discount_stmt->bindParam(":user_id", $this->user_id);

        $discount_stmt->execute();
        //$discount_stmt->debugDumpParams();
        $result = $discount_stmt->fetch();
 
        return $result;
    }

    // Add a discount code to the basket
    public function apply_discount() {

        // TO DO - check whether a code has already been applied to basket
 
        $query = "INSERT INTO $this->db_tbl
            SET discount_id =:discount_id, user_id = :user_id";
 
        $discount_stmt = $this->db_conn->prepare($query);

        $this->discount_id = htmlspecialchars(strip_tags($this->discount_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $discount_stmt->bindParam(":discount_id", $this->discount_id);
        $discount_stmt->bindParam(":user_id", $this->user_id);

        if($discount_stmt->execute()){
            return true;
        }
 
        return false;
    }

}