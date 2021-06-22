<?php

class CartUser{

    private $db_conn;
    private $db_tbl = "cart_user";
 
    public $id;
    public $product_id;
    public $quantity;
    public $user_id;
    public $date_added;
    public $date_modified;
 
    public function __construct($db){
        $this->db_conn = $db;
    }

    // Check if a cart item exists for the current user
    public function exists() {
 
        $query = "SELECT count(*) FROM $this->db_tbl WHERE product_id=:product_id AND user_id=:user_id";
 
        $cart_user_stmt = $this->db_conn->prepare($query);
 
        // Make sure the data being handled is sanitised - special chars converted and tags stripped out
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id    = htmlspecialchars(strip_tags($this->user_id));
 
        // Bind product_id and user_id variables - bound as a ref and evaluated only at execution
        $cart_user_stmt->bindParam(":product_id", $this->product_id);
        $cart_user_stmt->bindParam(":user_id", $this->user_id);
 
        // Execute the prepared query
        $cart_user_stmt->execute();
 
        // Gets an array of rows indexed by results set column number
        $rows = $cart_user_stmt->fetch(PDO::FETCH_NUM);
 
        // Return true, denoting it exists, if number of rows is greater than 0
        if($rows[0] > 0){
            return true;
        }
        
        // Return false if $rows[0] is not greater than 0
        return false;
    }

    // Count the number of items in the cart for current user
    public function count() {
 
        $query = "SELECT count(*) FROM $this->db_tbl WHERE user_id=:user_id";
 
        $cart_count_stmt = $this->db_conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $cart_count_stmt->bindParam(":user_id", $this->user_id);
        $cart_count_stmt->execute();
 
        $rows = $cart_count_stmt->fetch(PDO::FETCH_NUM);
 
        return $rows[0];
    }

    // Show cart_user items in cart
    public function read() {
 
        $query = "
            SELECT p.id, p.name, p.price, c.quantity, c.quantity * p.price AS subtotal 
            FROM $this->db_tbl c
            LEFT JOIN products p ON c.product_id = p.id 
            WHERE c.user_id=:user_id";
 
        $cart_read_stmt = $this->db_conn->prepare($query);
 
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $cart_read_stmt->bindParam(":user_id", $this->user_id, PDO::PARAM_INT);
        $cart_read_stmt->execute();
 
        return $cart_read_stmt;
    }

    // Create a cart_user record when add to cart selected
    function create() {
 
        $this->date_added = date('Y-m-d H:i:s');
        $this->date_modified = date('Y-m-d H:i:s');
 
        $query = "INSERT INTO $this->db_tbl  SET product_id = :product_id, quantity = :quantity, user_id = :user_id, date_added = :date_added, date_modified = :date_modified";
 
        $add_cart_stmt = $this->db_conn->prepare($query);
 
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $add_cart_stmt->bindParam(":product_id", $this->product_id);
        $add_cart_stmt->bindParam(":quantity", $this->quantity);
        $add_cart_stmt->bindParam(":user_id", $this->user_id);
        $add_cart_stmt->bindParam(":date_added", $this->date_added);
        $add_cart_stmt->bindParam(":date_modified", $this->date_modified);
 
        if($add_cart_stmt->execute()) {
            return true;
        }
 
        return false;
    }

    // Update an existing cart_user record quantity
    public function update() {
 
        $query = "UPDATE $this->db_tbl
            SET quantity=:quantity
            WHERE product_id=:product_id AND user_id=:user_id";
 
        $update_stmt = $this->db_conn->prepare($query);

        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $update_stmt->bindParam(":quantity", $this->quantity);
        $update_stmt->bindParam(":product_id", $this->product_id);
        $update_stmt->bindParam(":user_id", $this->user_id);

        if($update_stmt->execute()){
            return true;
        }
 
        return false;
    }


    // Remove product from basket
    public function delete(){
 
        $query = "DELETE FROM $this->db_tbl WHERE product_id=:product_id AND user_id=:user_id";
        $delete_stmt = $this->db_conn->prepare($query);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
 
        $delete_stmt->bindParam(":product_id", $this->product_id);
        $delete_stmt->bindParam(":user_id", $this->user_id);
 
        if($delete_stmt->execute()){
            return true;
        }
        return false;
    }

}