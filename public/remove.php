<?php
    if(isset($_GET['id']) && $_GET['id'] > 0) {
        $product_id = htmlspecialchars(strip_tags($_GET['id']));
 
        include($_SERVER['DOCUMENT_ROOT'].'/myshop/config/database.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart_user.php');
 
        $database = new Database();
        $db = $database->get_connection();

        $cart_user = new CartUser($db);

        $cart_user->user_id = 1;
        $cart_user->product_id = $product_id;
        $cart_user->delete();
 
        header('Location: basket.php?action=removed&id=' . $product_id);
    } else {
    	header('Location: basket.php?action=delete_unable');
    }