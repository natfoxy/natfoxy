<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php');
    if(isset($_GET['cat']) && is_numeric($_GET['cat'])) {
        $cat_id = htmlspecialchars(strip_tags($_GET['cat']));
        $cat_data = $category->get_category($cat_id);
    }

    $page_title = $cat_data['name'];
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
                            echo "Categories";
                        }
                        ?>
                    </h1>
                </div>
                <div class="page-content">
                   <p><?php echo $cat_data['description']; ?></p> 
                </div>
            </div>
        </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->

<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/footer.php');