<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php');
    
    $page_title = "Saddlery Store";
?>
 
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
 
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php echo isset($page_title) ? $page_title : "Saddlery Store"; ?></h1>
                </div>
                <div class="page-content">
                    <p>Welcome to the Saddlery Store. We sell saddles.</p>
                    <p>More items coming soon!</p>
                    <h2><a href="products.php">View Products</a> | <a href="categories.php">View Categories</a></h2>
                </div>
            </div>
        </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->

<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/footer.php');