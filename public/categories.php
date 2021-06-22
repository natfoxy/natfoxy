<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/header.php'); 
    
    $page_title = "Categories";
?>

    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
 
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php 
                        if(isset($page_title)) { 
                            echo $page_title;
                        } else { 
                            echo "Categories";
                        }
                        ?>
                    </h1>
                </div>
                <div class="page-content">

                </div>
            </div>
        </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->

<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/myshop/templates/partials/footer.php');