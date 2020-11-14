This is the profile of vendor to upload product

<form action="" method="post" enctype="multipart/form-data"><br>
name<input type="text" name="product_name" id=""><br>

price<input type="text" name="product_price" id=""><br>

description<textarea type="text" name="product_description" id=""></textarea><br>

type<input type="text" name="product_type" id=""><br>

category id<input type="text" name="category_id" id=""><br>
<input type = "hidden" name="vendor_id" value="<?php echo $vendor_id['vendor_id'] ?>">
qquantity<input type="text" name="product_quantity" id=""><br>
image location<input type="file" name="product_image" id=""><br>
<input type="submit" value="upload" name="submit">
</form>