<?php

class Product {

    // Declare DB connection and DB table
	private $db_conn;
	private $db_tbl = 'products';

    // Declare DB table fields as properties
    public $id;
    public $name;
    public $price;
    public $image;
    public $description;
    public $date_modified;

    public function __construct($db) {
    	$this->db_conn = $db;
    }

    
    // Get all products from product db table
    function get_products() {

        $query = "SELECT id, name, description, image, price, date_added, date_modified 
                  FROM $this->db_tbl
                  ORDER BY name ASC";

        $products_stmt = $this->db_conn->prepare($query);
        $products_stmt->execute();
 
        return $products_stmt;
    }

    // Get a single product
    function get_product($id) {

        $query = "SELECT id, name, description, image, price, date_added, date_modified 
                  FROM $this->db_tbl
                  WHERE id = $id
                 ";

        $product_stmt = $this->db_conn->prepare($query);
        $product_stmt->execute();
        $result = $product_stmt->fetch();
 
        return $result;
    }

}