<?php

    if(isset($_GET['id']) && !empty($_GET['id'])) {

        //$product_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $id = htmlspecialchars(strip_tags($_GET['id']));

    } else {

        $product_id = 0;
    }

    if(isset($_GET['d']) && !empty($_GET['d'])) {

        $discount = htmlspecialchars(strip_tags($_GET['d']));

    } else {

        $discount = "";
    }
 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/config/database.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart.php');
    //include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.discount_code.php'); TO BE COMPLETED

    $database = new Database();
    $db = $database->get_connection();

    if(isset($discount)) {

        $cart = new Cart($db);
        $cart->user_id = 1; // until users section completed
        $cart->id = $id;

        $cart->discount_id = 2; // until discount section completed
 
        if($cart->apply_discount()){

            header("Location: basket.php?action=discount_applied");

        } else {

            header("Location: basket.php?action=discount_unable");
        }
    }