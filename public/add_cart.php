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

    if(isset($_GET['d']) && !empty($_GET['d'])) {

        $discount_id = htmlspecialchars(strip_tags($_GET['d']));

    } else {

        $discount_id = 0;
    }
  
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/config/database.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart_user.php');

    $database = new Database();
    $db = $database->get_connection();

    $cart_user = new CartUser($db);
 
    $cart_user->user_id = 1; // Set for now until users section completed
    $cart_user->product_id = $product_id;
    $cart_user->quantity = $quantity;
    $cart_user->discount_id = $discount_id;
 
    if($cart_user->exists()) {

        header("Location: basket.php?action=exists");

    } else {

        if($cart_user->create()) {

            header("Location: product.php?id=$product_id&action=added");

        } else {

            header("Location: product.php?id=$product_id&action=unable_to_add");
        }
    }