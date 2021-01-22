
<div class="row">
<div class="col s3">
<form method="post" action="">

<?php 

foreach($products as $product)
{?>
<p>
 <label>
   <input type="checkbox" name='lang[]' value="<?php echo $product['product_id'];?>" /> 
        <span class="black-text text-darken-2"><?php echo $product['product_name'];?></span>
        </label>
    </p>
    <?php
}
?>

<button class="btn waves-effect waves-light" type="submit" name="compareNow">Compare
    <i class="material-icons right">compare_arrows</i>
  </button>
</form>
</div>
<div class="col s9">
<?php


if(!empty($_SESSION['compare_product1']) && !empty($_SESSION['compare_product2'])){
    
    $data1= $_SESSION['compare_product1'];
    $data2= $_SESSION['compare_product2'];
    
    
?>




<table style="width:100%" border="1" class="centered striped">
  <tr>
                        <th class="blue-text text-darken-2">Attributes</th>
                    
                        <th class="blue-text text-darken-2"><?php  echo $_SESSION['product1_name'];?></th>
                        <th class="blue-text text-darken-2"><?php echo $_SESSION['product2_name'];?></th>
                    
                    </tr>

  <tr>
                    <td>Refresh Rate</td>

                    <?php if(strcmp($data1['0']['refresh_rate'],$data2['0']['refresh_rate'])){?>
                <style>
                .item1{
                    background-color: #2e8b57;
                }
                </style>
                    <?php } else { ?>
                        <style>
                .item2{
                    background-color: #2e8b57;
                }
                </style>
                <?php } ?>

                    <td class="item1"><?php echo $data1['0']['refresh_rate'];?></td>
                    <td class="item2"><?php echo $data2['0']['refresh_rate'];?></td>
  </tr>

  <tr>
                    <td > Screen size</td>

                    <?php if($data1['0']['screen_size'] > $data2['0']['screen_size']){?>
                    <style>
                    .item11{
                        background-color: #2e8b57;
                    }
                    </style>
                        <?php } else { ?>
                            <style>
                    .item21{
                        background-color: #2e8b57;
                    }
                    </style>
                    <?php } ?>

                    <td class="item11"><?php echo $data1['0']['screen_size'];?></td>
                        <td class="item21"><?php echo $data2['0']['screen_size'];?></td>
                    </tr>
  <tr>

                    <td > Resolution </td>

                    <?php if($data1['0']['resolution'] > $data2['0']['resolution']){?>
                    <style>
                    .item12{
                        background-color: #2e8b57;
                    }
                    </style>
                        <?php } else { ?>
                            <style>
                    .item22{
                        background-color: #2e8b57;
                    }
                    </style>
                    <?php } ?>


                    <td class="item12"><?php echo $data1['0']['resolution'];?></td>
                        <td class="item22"><?php echo $data2['0']['resolution'];?></td>
  </tr>





<tr>

            <td > Touch Screen </td>

            <?php if($data1['0']['touchscreen'] == '1'){?>
            <style>
            .item17{
                background-color: #2e8b57;
            }
            </style>
                <?php } else if($data2['0']['touchscreen'] == '1') { ?>
                    <style>
            .item27{
                background-color: #2e8b57;
            }
            </style>
            <?php } ?>


            <td class="item17"><?php if($data1['0']['touchscreen']) echo "True"; else echo "False"?></td>
                <td class="item27"><?php if($data2['0']['touchscreen']) echo "True"; else echo "False"?></td>
</tr>



</table> 
<?php
} else {
?>

Please chose at only 2 product

<?php } 


?>
</div>
</div>