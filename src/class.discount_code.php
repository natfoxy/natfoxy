<?php

class DiscountCode {

    // Declare DB connection and DB table
	private $db_conn;
	private $db_tbl = 'discount_codes';

    // Declare DB table fields as properties
    public $id;
    public $discount_code;
    public $amount;
    public $amount_percent;
    public $amount_decimal;

    public function __construct($db) {
    	$this->db_conn = $db;
    }

    
    // Check and return discount code
    function get_discount_code($discount_code) {

        $query = "SELECT id, discount_code, amount, amount_percent, amount_decimal 
                  FROM $this->db_tbl
                  WHERE discount_code = '$discount_code'
                 ";

        $discount_stmt->bindParam(":discount_code", $this->discount_code);

        $discount_stmt = $this->db_conn->prepare($query);
        $discount_stmt->execute();
        $result = $discount_stmt->fetch();
 
        return $result;
    }
    
}