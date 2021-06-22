<?php
    $page_title = 'All Products';

    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php');
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
                        echo "All Products";
                    }
                    ?>
                </h1>
            </div>
        </div>
<?php
    while($product = $all_products->fetch(PDO::FETCH_ASSOC)) {
        extract($product);

        include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/product_listing.php');  
    }
?>
        </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/footer.php');
