<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update product</title>
    <link rel="stylesheet" type="text/css" href="../views/public/css/style.css">
    <?php include 'partials/Elinks.php'; ?>
    <style>
        .modal{
            width: 600px !important;
        }
    </style>
</head>
<body>
<nav class="nav-wrapper grey darken-4">
            <!-- logo -->
            <a href="/project5/TechMart" class="brand-logo hide-on-med-and-down"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
            <div class="container">         
                <ul class="right">
                    <!-- logo for mobile -->
                    <li>
                        <a href="/project5/TechMart" class="brand-logo left hide-on-large-only"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img" style="height:50px;width:150px;"></a>
                    </li>
                    <!-- searchbar -->
                    <li class="search-icon" id="search-icon">
                        <nav class="z-depth-0 grey transparent">
                            <div class="nav-wrapper">
                                <form action="/project5/TechMart/list_products" method="get">
                                <input type="hidden" name="categories" value="0">
                                <input type="hidden" name="min_price" value="0" id="">
                                <input type="hidden" name="max_price" value="4000000" id="">
                                    <div class="input-field " id="searchbar">
                                        <input class="white-text transparent" id="search" name="searchKeyword" autocomplete="off" type="search" placeholder="Search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </li>
                </ul>
            </div>
        </nav>
        <p class="flow-text center">Your Products</p>
        <?php if(!empty($products)){ ?>
            <div class="container">
          <div class="row">
          <form method="post" id="thisform">
            <?php
              foreach($products as $product){ ?> 
                  <div class="col s12 m6 l4">
                    <div class="card medium sticky-action">
                      <div class="card-image waves-effect waves-block waves-light">
                      <!-- hiddentype -->
                      <input type="hidden" name="test" id="category_id" value="<?php echo $product['category_id'];?>">
                        <img class="activator" src="../views/public/img/<?php echo $product['product_image'];?>" style="height:230px;width:300px;">
                      </div>
                      <div class="card-content">
                        <span class="activator grey-text text-darken-4" id="activator"><i class="material-icons right">more_vert</i><h6><?php echo $product['product_name']; ?></h6></span>
                        <p><a class="orange-text" href=""><b>Rs. <?php echo intval($product['product_price']); ?></b></a></p> <br>
                      </div>
                          <div class="card-action">
                            <?php
                              if(!empty($_SESSION['logged_vendor'])){
                            ?>
                              <a href="#editWindow" class="btn modal-trigger" onclick="edit(<?php echo $product['product_id']; ?>,'<?php echo $product['product_name']; ?>',<?php echo intval($product['product_price']); ?>,<?php echo $product['product_quantity']; ?>)"><i class="material-icons left">edit</i><b>Edit</b></a>
                              <button class="btn orange darken-4" name="deletebtn" onclick="submitForm('delete',<?php echo $product['product_id']; ?>)"><i class="material-icons">delete</i></button>
                            <?php }?>
                          </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><?php echo $product['product_name']; ?></span>
                        <!-- laptop -->
                        <?php if($product['category_id']==1){ ?>
                        <p><?php echo $product['others']; ?></p>
                        <p id="ram_size_id">Ram : <?php echo $product['ram']; ?></p>
                        <p id="screen_size_id">Screen Size : <?php echo $product['screen_size']; ?></p>
                        <p id="refresh_rate_id">Refresh Rate : <?php echo $product['refresh_rate']; ?></p>
                        <p id="resolution_id">Resolution : <?php echo $product['resolution']; ?></p>
                        <p id="storage_id">Storage : <?php echo $product['storage']; ?></p>
                        <p id="gpu_id">GPU : <?php echo $product['gpu']; ?></p>
                        <p id="cpu_id">CPU : <?php echo $product['cpu']; ?></p>
                        <p id="battery_power_id">Battery Power : <?php echo $product['battery_power']; ?></p>
                        <p id="touchscreen_id">Touch Screen : <?php echo ($product['touchscreen']==1)?"Yes":"No"; ?></p>
                          <!-- mouse -->
                        <?php }else if($product['category_id']==2){ ?>
                          <p><?php echo $product['others']; ?></p>
                          <p id="dpi_id">DPI : <?php echo $product['dpi']; ?></p>
                        <p id="programmable_button_id">Programmable Buttons : <?php echo $product['programmable_buttons']; ?></p>
                        <p id="wireless_id">Wireless : <?php echo ($product['wireless']==1)?"Yes":"No"; ?></p>
                          <!-- monitor -->
                        <?php }else if($product['category_id']==3){ ?>
                          <p><?php echo $product['others']; ?></p>
                          <p id="screen_size_id">Screen Size : <?php echo $product['screen_size']; ?></p>
                        <p id="refresh_rate_id">Refresh Rate : <?php echo $product['refresh_rate']; ?></p>
                        <p id="resolution_id">Resolution : <?php echo $product['resolution']; ?></p>
                        <p id="touchscreen_id">Touch Screen : <?php echo ($product['touchscreen']==1)?"Yes":"No"; ?></p>
                        <br><br><br>
                          <!-- remaining others -->
                        <?php }else{ ?>
                          <p><?php echo $product['others']; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                
            <?php } }else{
                echo '<h4 class="center section">No products available currently</h4>';
                echo '<div class="footer-copyright" style="margin-top:510px;margin-bottom:5px;">
                <div class="container center-align">&copy; 2020 TechMart</div>
                </div>';
            }?>
            </form>
            <!-- edit window -->
            <form action="" method="post" id="editForm">
            <div id="editWindow" class="modal modal-fixed-footer">
                      <div class="modal-content">
                          <h4 style="padding-bottom:1vw;">Edit Product</h4>
                          <input type="hidden" name="product_id" id="pid" value="1">
                          <div class="input-field" id="product_name">
                              <input type="text" name="product_name" id="pname" value="2">
                              <label for="product_name">Product Name</label>
                          </div>
                          <div class="input-field" id="product_price">
                              <input type="text" name="product_price" id="pprice" value="4">
                              <label for="product_price">Product Price</label>
                          </div>
                          <div class="input-field" id="product_quantity">
                              <input type="number" name="product_quantity" id="pquantity" value="5">
                              <label for="product_quantity">Product Quantity</label>
                          </div>
                          <div class="file-field input-field">
                              <div class="btn z-depth-0 grey darken-3">
                                  <span><i class="material-icons">perm_media</i></span>
                                  <input name="product_image" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                  <input class="file-path validate white-text" type="text" placeholder="Select Image">
                              </div>
                              <span class="red-text text-accent-4" id="username_msg"></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                      <input type="submit" href="#!" class="white-text orange darken-3 modal-close waves-effect waves-dark btn" name="updatebtn" value="Update" onclick="submitForm('update',<?php echo $item['product_id']; ?>)">
                      </div>
                  </div>
                            <!-- edit ends here -->
            </form>
          </div>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
            });

            function submitForm(action, id){
                var form = document.getElementById('thisform');
                form.action = "?action=" + action + "&id=" + id;
                form.submit();
            }

            function edit(id, name, price, qty){
                document.getElementById('pid').value = id;
                document.getElementById('pname').value = name;
                document.getElementById('pprice').value = price;
                document.getElementById('pquantity').value = qty;
            }
        </script>
</body>
</html>