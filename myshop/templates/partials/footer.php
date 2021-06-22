<hr>
<footer>
	<div class="container">
		<div class="row">
	        <p>&copy; Saddlery Store</p>
	    </div>
	</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
  
<!-- custom script -->
<script>
$(document).ready(function(){

    // Add to basket button listener
    $('.add-cart').on('submit', function(){
 
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        window.location.href = "add_cart.php?id=" + id + "&quantity=" + quantity;
        return false;
    });

    // Update quantity button listener
    $('.update-quantity').on('submit', function(){
 
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        window.location.href = "update_quantity.php?id=" + id + "&q=" + quantity;
        return false;
    });
    
    // Add discount button listener
    $('.apply-discount').on('submit', function(){
 
        var id = $(this).find('.product-id').text();
        var discount_code = $(this).find('.discount_code').val();
 
        window.location.href = "apply_discount.php?id=" + id + "&d=" + discount_code;
        return false;
    });
});
</script>
</body>
</html>
 