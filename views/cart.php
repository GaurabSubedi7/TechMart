
<?php

foreach($cartItem as $item)
{
    ?>
    
    <br>this is name:<?php echo $item['product_name']?>
<br>this is description:<?php echo $item['product_description']?>
<br> this is image:<?php echo $item['product_image']?>
<br> this is price:<?php echo $item['product_price']?>    
    
    <?php
}
?>