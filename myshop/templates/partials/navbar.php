<?php 
    if(!isset($page_title)) { $page_title = "Saddlery Store"; } 
?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Saddlery Store</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<?php echo strpos($page_title, "Products") !== false ? " class='active'" : ""; ?>>
            <a href="products.php">Products</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strpos($page_title, "Categories") !== false ? "class='active'" : "Categories"; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php foreach($all_categories as $cat) { ?>
            <li><a href="category.php?cat=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
            <?php } ?>
          </ul>
        </li>       
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li<?php echo $page_title == "Basket" ? " class='active'" : ""; ?>>
            <a href="basket.php">
            <?php
                $cart_user->user_id = 1; // Default to user with ID "1" for now, until users functionality added
                $cart_user_count = $cart_user->count();
            ?>
            Basket <span class="badge" id="comparison-count"><?php echo $cart_user_count; ?></span>
            </a>
        </li>
      </ul>
    </div>
</div>
</nav>