<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/config/database.php');

    $database = new Database();
    $db = $database->get_connection();

    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.product.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart_user.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.category.php');
 
    // initialize objects
    $product = new Product($db);
    $cart_user = new CartUser($db);
    $category = new Category($db);

    $all_products=$product->get_products();
    $all_categories = $category->get_categories();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title><?php echo isset($page_title) ? $page_title : "Saddlery Store"; ?></title>
 
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
        <!-- Custom CSS for saddlery store -->
        <link href="/myshop/templates/assets/css/style.css" rel="stylesheet" media="screen">
        
    </head>
    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/navbar.php'); ?>