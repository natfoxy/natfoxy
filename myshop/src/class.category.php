<?php

class Category {

    // Declare DB connection and DB table
	private $db_conn;
	private $db_tbl = 'categories';

    // Declare DB table fields as properties
    public $id;
    public $name;
    public $description;
    public $date_added;
    public $date_modified;

    public function __construct($db) {
    	$this->db_conn = $db;
    }

    // Get all products from product db table
    function get_categories() {

        $query = "SELECT id, name, description, date_added, date_modified 
                  FROM $this->db_tbl
                  ORDER BY name ASC";

        $cats_stmt = $this->db_conn->prepare($query);
        $cats_stmt->execute();
 
        return $cats_stmt;
    }

    // Get a single category from categories db table
    function get_category($cat_id) {

        $query = "SELECT id, name, description, date_added, date_modified 
                  FROM $this->db_tbl
                  WHERE id = $cat_id
                 ";

        $cats_stmt = $this->db_conn->prepare($query);
        $cats_stmt->execute();
        $result = $cats_stmt->fetch();
 
        return $result;
    }

}