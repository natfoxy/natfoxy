<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/myshop/src/class.cart.php');
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php');

    $page_title = "Basket";
    $cart = new Cart($db);
    $discount = $cart->check_discount();
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
                        echo "Basket";
                    }
                ?>
                </h1>
            </div>
        </div>

        <?php 
            if(isset($_GET['action']) && !empty($_GET['action'])) {
                $action = htmlspecialchars(strip_tags($_GET['action']));
            } else {
                $action = "";
            }
        ?>
 
        <div class='col-md-12'>
        <?php 
        switch($action) {
            case 'removed':
                echo '<div class="alert alert-info">Product was removed from your basket.</div>';
                break;
            case 'quantity_updated':
                echo '<div class="alert alert-info">Product quantity was updated.</div>';
                break;
            case 'exists':
                echo '<div class="alert alert-info">Product already exists in your basket.</div>';
                break;
            case 'cart_emptied':
                echo '<div class="alert alert-info">Cart was emptied.</div>';
                break;
            case 'updated':
                echo '<div class="alert alert-info">Quantity was updated.</div>';
                break;
            case 'unable_to_update':
                echo '<div class="alert alert-danger">Unable to update quantity.</div>';
                break;
            case 'discount_applied':
                echo '<div class="alert alert-info">Discount was applied.</div>';
                break;
            case 'discount_invalid':
                echo '<div class="alert alert-danger">Discount code not valid.</div>';
                break;
            case 'discount_unable':
                echo '<div class="alert alert-danger">Unable to add discount code.</div>';
                break;
            case 'delete_unable':
                echo '<div class="alert alert-danger">Unable to delete product from basket.</div>';
                break;
        }
        ?>
        </div>

    <?php 

    if($cart_user_count > 0) { // initialised in navbar.php
 
        $cart_user->user_id = 1;
        $cart_stmt = $cart_user->read();
 
        $total = 0;
        $item_count = 0;
 
        while ($row = $cart_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $sub_total = $price * $quantity;
    ?>
        <div class='cart-row'>
            <div class='col-md-8'>
                <div class='product-name m-b-10px'>
                	<h4><?php echo $name; ?></h4>
                </div>

                <form class='update-quantity'>
                    <div class='product-id' style='display:none;'><?php echo $id; ?></div>
                    <div class='input-group'>
                        <input type='number' name='q' value='<?php echo $quantity; ?>' class='form-control cart-quantity' min='1' />
                        <span class='input-group-btn'>
                            <button class='btn btn-default update-quantity' type='submit'>Update</button>
                        </span>
                    </div>
                </form>

                <a href='remove.php?id=<?php echo $id; ?>' class='btn btn-default'>Delete</a> 
            </div>
 
            <div class='col-md-4'>
                <h4>£<?php echo number_format($price, 2, '.', ','); ?> each</h4>
            </div>
        </div>
        <?php
            $item_count += $quantity;
            $total += $sub_total;
            if($discount) {  // TODO - update to use the right discount code and apply correct amount as either fixed or percentage
                $grand_total = ($total*0.9);
            }
        }
        ?>
 
        <div class='col-md-8'>
            <form class="apply-discount">
                <h3>Add a Discount Code</h3>
                <div class='product-id' style='display:none;'><?php echo $id; ?></div>
                <div class='input-group'>
                    <input type="text" name="discount_code" class="discount_code" /> 
                    <button class='btn btn-default discount' type='submit'>Apply Discount</button>
                </div>
            </form>
        </div>
    <div class='col-md-4'>
        <div class='cart-row'>
            <h4 class='m-b-10px'>Total (<?php echo $item_count; ?> items)</h4>
            <h4>£<?php echo number_format($total, 2, '.', ','); ?></h4>
            <?php if(isset($discount) && !empty($discount)) { ?>
                <p>Discount code applied</p>
                <h3>£<?php echo number_format($grand_total, 2, '.', ','); ?></h3>
            <?php } ?>
            <a href='#' class='btn btn-success m-b-10px'> Proceed to Checkout </a> <!-- checkout.php - TO BE COMPLETED -->
        </div>
    </div>
    <?php } else { ?>
        <div class='col-md-12'>
            <div class='alert alert-danger'>No products found in your basket</div>
        </div>
    <?php }
 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/footer.php');