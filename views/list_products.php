<?php foreach($products as $product){ ?> 
    <form method="post" action="home.php?action=add&id=<?php echo $product['product_id']; ?>">
     <?php   echo $product['product_id'];?>
     <h3>Name:<?php echo $product['product_name']; ?></h3>
     <h3>Price:<?php echo $product['product_price']; ?></h3>
     <h3>From:<?php echo $product['vendor_name']; ?></h3>
     <input type="number" name="quantity" value="1" />
	<input type="hidden" name="hidden_name" value="<?php echo $product['product_name']; ?>" />
 
		<input type="hidden" name="hidden_price" value="<?php echo $product['product_price']; ?>" />
        <input type="submit" name="add_to_cart"  value="Add to Cart" />
        </form>
<?php } ?>