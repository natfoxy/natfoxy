<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php');
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $product_id = htmlspecialchars(strip_tags($_GET['id']));
        $product_data = $product->get_product($product_id);
    }

    $page_title = $product_data['name'];
?>
    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
 
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                <?php 
                    if(isset($page_title)) { 
                        echo $page_title;
                    } else { 
                        echo "";
                    }
                ?>
                </h1>
                <div class="col-md-12 m-t-50px">
                    <div class="col-md-4">
                    <div class="product-id display-none"><?php echo $product_data['id']; ?></div>
                    <a href="product.php?id=<?php echo $product_data['id']; ?>" class="product-link">
                        <div class="m-b-10px text-align-center">
                            <img src="img_uploads/<?php echo $product_data['image']; ?>" />
                        </div>
                    </a>
                    </div>
                    <div class="col-md-8">
                    <div class="m-b-20px">
                        <p><?php echo $product_data['description']; ?></p>
                    </div>
                    <div class="m-b-20px">
                        <p><?php echo "<strong>£".number_format($product_data['price'], 2, '.', ',')."</strong>"; ?></p>
                    </div>
 
                    <div class='m-b-10px'>
                    <?php 
                        $cart_user->user_id = 1;
                        $cart_user->product_id = $product_data['id'];

                        if($cart_user->exists()) { ?>
                        <a href='basket.php' class='btn btn-success w-100-pct'>Update Basket</a>
                    <?php } else { ?>
                        <a href='add_cart.php?id=<?php echo $product_data['id']; ?>' class='btn btn-primary w-50-pct'>Add to Basket</a>      
                    <?php } ?>
                    </div>
                </div>
                </div>
            </div>
        </div>