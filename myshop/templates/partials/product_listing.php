
        <div class='col-md-3'>
            <div class='product-id display-none'><?php echo $id; ?></div>
            <a href='product.php?id=<?php echo $id; ?>' class='product-link'>
                <div class='m-b-10px text-align-center'>
                    <img src='img_uploads/<?php echo $image; ?>' />
                </div>
                <div class='product-name m-b-10px'><?php echo $name; ?></div>
            </a>
            <div class='m-b-10px'>
                <p><?php echo "£".number_format($price, 2, '.', ','); ?></p>
            </div>
 
            <div class='m-b-10px'>
                <?php 
                    $cart_user->user_id = 1; // Default to user ID "1" at present, until other user's added, then will push through current user_id
                    $cart_user->product_id = $id;

                    if($cart_user->exists()) { ?>
                    <a href='basket.php' class='btn btn-success w-100-pct'>Update Basket</a>
                    <?php } else { ?>
                    <a href='add_cart.php?id=<?php echo $id; ?>' class='btn btn-primary w-100-pct'>Add to Basket</a>      
                <?php } ?>
            </div>
        </div>