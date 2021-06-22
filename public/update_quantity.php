<?php
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        $product_id = htmlspecialchars(strip_tags($_GET['id']));

    } else {

        $product_id = 0;
    }

    if(isset($_GET['q']) && !empty($_GET['q'])) {

        $quantity = htmlspecialchars(strip_tags($_GET['q']));

    } else {

        $quantity = 1;
    }
 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/config/database.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart_user.php');

    $database = new Database();
    $db = $database->get_connection();

    $cart_user = new CartUser($db);
    $cart_user->user_id = 1; // until users section completed
    $cart_user->product_id = $product_id;
    $cart_user->quantity = $quantity;
 
    if($cart_user->update()){

        header("Location: basket.php?action=updated");

    } else {

        header("Location: basket.php?action=unable_to_update");
    }