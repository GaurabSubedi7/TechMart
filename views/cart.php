
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php include 'partials/Elinks.php'; ?>
</head>
<body class="grey darken-3">

<?php
if(empty($cartItem))
{
    echo "Empty cart";
}
else{
    $total = 0;
     foreach($cartItem as $item)
    {
        ?>
        <div class="divider"></div>
     
        <form method="post" action="?action=remove&id=<?php echo $item['product_id']; ?>">
     
        <div class="section">
     <h5><?php echo $item['product_name']?></h5>
     <p>this is description:<?php echo $item['product_description']?></p>
     <p> this is image:</p>
    <p> this is price:<?php echo $item['product_price']; $total = $item['product_price']+$total;?>   </p> 
    <img src="/public/<?php echo $item['product_image']?>" alt="" class="circle responsive-img">
    
    <input type="submit" value="remove">
        </div>
        </form>
        <?php
    }?>
     total:
    <?php
    echo $total;
    ?>
<?php }

?>
 

</body>
</html>