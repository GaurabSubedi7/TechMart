<script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
<input type="text" name="search" id="search" autocomplete="off" placeholder="search product name here....">
<a href="cart">cart</a>
<div id="output"></div>
<table style="width:100%">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Vendor Name</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php
 foreach($products as $product){ ?> 
    <form method="post" action="?action=add&id=<?php echo $product['product_id']; ?>">
     
     <tr>
        <td><h3><?php   echo $product['product_id'];?></h3> </td>
        <td> <h3><?php echo $product['product_name']; ?></h3> </td>
        <td>  <h3><?php echo $product['product_price']; ?></h3> </td>
        <td><h3><?php echo $product['vendor_id']; ?></h3> </td>
        <td><input type="number" name="quantity" value="1" /> </td>
        <input type="hidden" name="hidden_name" value="<?php echo $product['product_name']; ?>" />
    
        <input type="hidden" name="hidden_price" value="<?php echo $product['product_price']; ?>" />
        <td> <input type="submit" value=""></td>
    </tr>
        </form>
<?php } ?>
</table>
