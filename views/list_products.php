<table style="width:100%">
<tr>
<th>Id</th>
<th>Name</th>
<th>Price</th>
<th>Vendor Name</th>
<th>Quantity</th>
<th>Action</th>

</tr>
<?php foreach($products as $product){ ?> 
    <!-- <form method="post" action="home.php?action=add&id=<?php echo $product['product_id']; ?>"> -->
     
     <tr>
     <td><?php   echo $product['product_id'];?> </td>
     <td> <h3><?php echo $product['product_name']; ?></h3> </d>
     <td>  <h3><?php echo $product['product_price']; ?></h3> <t/d>
     <td><h3><?php echo $product['vendor_name']; ?></h3> </d>
     <td><input type="number" name="quantity" value="1" /> </td>
	<input type="hidden" name="hidden_name" value="<?php echo $product['product_name']; ?>" />
 
		<input type="hidden" name="hidden_price" value="<?php echo $product['product_price']; ?>" />
        <td> <input type="submit" name="DeleteItem"  value="Delete Item" /> </td>
        <td> <input type="submit" name="EditItem"  value="Edit Item" /> </td>
        </tr>
        <!-- </form> -->
<?php } ?>
</table>