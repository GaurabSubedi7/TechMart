<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Market</title>
        <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
        <?php include 'partials/Elinks.php'; ?>
        <style>
            .search-icon{
                width: 200px;
            }

            .modal{ 
              max-width: 300px;
            }

            #search {
            margin-top: -60px;
            margin-left: -300px;
            }
        </style>
    </head>
    <body>
    <!-- navbar for the market -->
        <nav class="nav-wrapper bla grey darken-4">
            <!-- logo -->
            <a href="/project5/TechMart" class="brand-logo hide-on-med-and-down"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
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
                                <form action="" method="get">

                                                                    <!-- advance search button -->

              
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-flat modal-trigger grey darken-4" href="#modal1"><i class="large material-icons white-text  ">filter_list</i>Filters</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <!-- from here -->
    <div class="input-field">
    <h4 class="grey-text text-darken-4">Categories</h4>
    <select name="categories">
      <option value="0">All</option>
      <?php 
        foreach($categoriesItem as $category) {?>
          <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
      <?php } ?>
    </select>
  </div>
  <h4 class="grey-text text-darken-4">Price Range</h4> 
  <!-- for price range -->
  <input type="number" name="min_price" value="0" id="">
  <input type="number" name="max_price" value="4000000" id="">
  <!-- price range end -->
  <input type="submit" value="search">
<!-- to here -->
                                      
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Apply</a>
  </div>
</div>
        
                                    <!-- advance search end -->

    <div class="input-field " id="searchbar">
      <input class="white-text transparent" id="search" name="searchKeyword" autocomplete="off" type="search" placeholder="Search" value="">
      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
    </div>
    </form>
    </div>
  </nav>
</li>
                    <?php
                        if(!empty($_SESSION['logged_user']))
                        {
                          $cartCount = 0;
                            foreach($cartItem as $item)
                            { 
                                $cartCount += 1; }
                          ?>
                            <li>
                                <a href="list_products/cart" class="z-depth-0 transparent wave-effect waves-light btn hide-on-med-and-down"><i class="material-icons">shopping_cart</i></a>
                            </li>
                              <li><input type="button" class="circle orange-text text-lighten-1 new grey darken-3" value="<?php echo $cartCount; ?>" style="border:none;margin-left:-35px;"></li>

                            <?php } elseif(!empty($_SESSION['logged_vendor'])){ ?>
                              <li>
                                <a href="list_products/cart" class="z-depth-0 transparent wave-effect waves-light btn hide-on-med-and-down"><i class="fas fa-bell"></i></a>
                            </li>
                              <li><input type="button" class="circle orange-text text-lighten-1 new grey darken-3" value="1" style="border:none;margin-left:-35px;"></li>

                    <?php }else{ ?>
                            <li class="hide-on-med-and-down">
                              <a href="http://localhost/project5/TechMart/userlogin" class="btn orange" type="submit">Login</a>
                            </li>
                            <li class="hide-on-med-and-down">
                              <a href="http://localhost/project5/TechMart/usersignup" class="btn transparent z-depth-0" type="submit">SignUp</a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

                              <!-- product list -->
                              <?php 
          if(isset($_GET['searchKeyword'])){
            if(!empty($filteredProducts)){ ?>
              <div class="container">
          <div class="row">
            <?php
              foreach($filteredProducts as $filteredproduct){ ?> 
                <form method="post" action="?action=add&id=<?php echo $filteredproduct['product_id']; ?>">
                  <div class="col s12 m6 l4">
                    <div class="card medium sticky-action">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="./views/public/img/<?php echo $filteredproduct['product_image'];?>" style="height:230px;width:300px;">
                      </div>
                      <div class="card-content">
                        <span class="activator grey-text text-darken-4"><i class="material-icons right">more_vert</i><h6><?php echo $filteredproduct['product_name']; ?></h6></span>
                        <p><a class="orange-text" href=""><b>Rs. <?php echo intval($filteredproduct['product_price']); ?></b></a></p> <br>
                      </div>
                          <div class="card-action">
                            <?php
                              if(empty($_SESSION['logged_user'])){
                            ?>
                              <a href="http://localhost/project5/TechMart/userlogin" class="btn" type="submit">Add To Cart</a>
                            <?php
                              }else{
                            ?>
                              <button class="btn" onclick="M.toast({html: 'Added to your cart'})">Add To Cart</button>
                            <?php }?>
                          </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><?php echo $filteredproduct['product_name']; ?></span>
                        <!-- laptop -->
                        <?php if($filteredproduct['category_id']==1){ ?>
                        <p><?php echo $filteredproduct['others']; ?></p>
                        <p id="ram_size_id">Ram : <?php echo $filteredproduct['ram']; ?></p>
                        <p id="screen_size_id">Screen Size : <?php echo $filteredproduct['screen_size']; ?></p>
                        <p id="refresh_rate_id">Refresh Rate : <?php echo $filteredproduct['refresh_rate']; ?></p>
                        <p id="resolution_id">Resolution : <?php echo $filteredproduct['resolution']; ?></p>
                        <p id="storage_id">Storage : <?php echo $filteredproduct['storage']; ?></p>
                        <p id="gpu_id">GPU : <?php echo $filteredproduct['gpu']; ?></p>
                        <p id="cpu_id">CPU : <?php echo $filteredproduct['cpu']; ?></p>
                        <p id="battery_power_id">Battery Power : <?php echo $filteredproduct['battery_power']; ?></p>
                        <p id="touchscreen_id">Touch Screen : <?php echo ($filteredproduct['touchscreen']==1)?"Yes":"No"; ?></p>
                          <!-- mouse -->
                        <?php }else if($filteredproduct['category_id']==2){ ?>
                          <p><?php echo $filteredproduct['others']; ?></p>
                          <p id="dpi_id">DPI : <?php echo $filteredproduct['dpi']; ?></p>
                        <p id="programmable_button_id">Programmable Buttons : <?php echo $filteredproduct['programmable_buttons']; ?></p>
                        <p id="wireless_id">Wireless : <?php echo ($filteredproduct['wireless']==1)?"Yes":"No"; ?></p>
                          <!-- monitor -->
                        <?php }else if($filteredproduct['category_id']==3){ ?>
                          <p><?php echo $filteredproduct['others']; ?></p>
                          <p id="screen_size_id">Screen Size : <?php echo $filteredproduct['screen_size']; ?></p>
                        <p id="refresh_rate_id">Refresh Rate : <?php echo $filteredproduct['refresh_rate']; ?></p>
                        <p id="resolution_id">Resolution : <?php echo $filteredproduct['resolution']; ?></p>
                        <p id="touchscreen_id">Touch Screen : <?php echo ($filteredproduct['touchscreen']==1)?"Yes":"No"; ?></p><br><br><br>
                          <!-- remaining others -->
                        <?php }else{ ?>
                          <p><?php echo $filteredproduct['others']; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>            
                </form>
            <?php } ?>
          </div>
        </div>
           <?php }else{
              echo '<h4 class="center section">No result found</h4>';
              echo '<div class="footer-copyright" style="margin-top:510px;margin-bottom:5px;">
              <div class="container center-align">&copy; 2020 TechMart</div>
          </div>';
            }
            ?>
        <?php }else{
          if(!empty($products)){
        ?>
        <div class="container">
          <div class="row">
            <?php
              foreach($products as $product){ ?> 
                <form method="post" action="?action=add&id=<?php echo $product['product_id']; ?>">
                  <div class="col s12 m6 l4">
                    <div class="card medium sticky-action">
                      <div class="card-image waves-effect waves-block waves-light">
                      <!-- hiddentype -->
                      <input type="hidden" name="test" id="category_id" value="<?php echo $product['category_id'];?>">
                        <img class="activator" src="./views/public/img/<?php echo $product['product_image'];?>" style="height:230px;width:300px;">
                      </div>
                      <div class="card-content">
                        <span class="activator grey-text text-darken-4" id="activator"><i class="material-icons right">more_vert</i><h6><?php echo $product['product_name']; ?></h6></span>
                        <p><a class="orange-text" href=""><b>Rs. <?php echo intval($product['product_price']); ?></b></a></p> <br>
                      </div>
                          <div class="card-action">
                            <?php
                              if(empty($_SESSION['logged_user'])){
                            ?>
                              <a href="http://localhost/project5/TechMart/userlogin" class="btn" type="submit">Add To Cart</a>
                              <button class="btn orange darken-4" onclick="M.toast({html: 'Added to your compare'})"><i class="material-icons">compare_arrows</i></button>
                            <?php
                              }else{
                            ?>
                              <button class="btn" onclick="M.toast({html: 'Added to your cart'})">Add To Cart</button>
                              <button class="btn orange darken-4" onclick="M.toast({html: 'Added to your compare'})"><i class="material-icons">compare_arrows</i></button>
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
                        <p id="touchscreen_id">Touch Screen : <?php echo ($product['touchscreen']==1)?"Yes":"No"; ?></p><br><br><br>
                          <!-- remaining others -->
                        <?php }else{ ?>
                          <p><?php echo $product['others']; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>            
                </form>
            <?php } }else{
              echo '<h4 class="center section">No products available currently</h4>';
              echo '<div class="footer-copyright" style="margin-top:510px;margin-bottom:5px;">
              <div class="container center-align">&copy; 2020 TechMart</div>
          </div>';
            }?>
          </div>
        </div>
        <div class="footer-copyright" style="margin-top:175px;margin-bottom:5px;">
            <div class="container center-align">&copy; 2020 TechMart</div>
        </div>
        <?php } ?>           
        <!-- product list -->
        <!-- ------------------ -->
        <script>
            // function load_home() {
            //     document.getElementById("content").innerHTML='<object type="text/html" data="http://localhost/project5/TechMart/list_products/cart"></object>';
            // }

           
            $(document).ready(function(){
                $('.collapsible').collapsible();
                $('.dropdown-trigger').dropdown();
            });
            //for dropdownmenu
            $(document).ready(function(){
              $('select').formSelect();
            });

            //for modal
            $(document).ready(function(){
              $('.modal').modal();
            });
            //for description            
            // $('.activator').on('click',function(){
              // var category_id = document.getElementById('category_id').value;
              // alert(document.getElementById('activator').value);
              // alert(category_id);
              // alert(document.getElementById('category_id').value);
              // if(category_id == 1){
              //     $("#ram_size_id").show();
              //     $("#screen_size_id").show();
              //     $("#refresh_rate_id").show();
              //     $("#resolution_id").show();
              //     $("#storage_id").show();
              //     $("#gpu_id").show();
              //     $("#cpu_id").show();
              //     $("#battery_power_id").show();
              //     $("#touchscreen_id").show();
              //     $("#dpi_id").hide();
              //     $("#programmable_button_id").hide();
              //     $("#wireless_id").hide();
              // }else if(category_id == 2){
              //   alert("mouse");
              //     $("#ram_size_id").hide();
              //     $("#screen_size_id").hide();
              //     $("#refresh_rate_id").hide();
              //     $("#resolution_id").hide();
              //     $("#storage_id").hide();
              //     $("#gpu_id").hide();
              //     $("#cpu_id").hide();
              //     $("#battery_power_id").hide();
              //     $("#touchscreen_id").hide();
              //     $("#dpi_id").show();
              //     $("#programmable_button_id").show();
              //     $("#wireless_id").show();
              // }else if(category_id == 3){
              //     $("#ram_size_id").hide();
              //     $("#screen_size_id").show();
              //     $("#refresh_rate_id").show();
              //     $("#resolution_id").show();
              //     $("#storage_id").hide();
              //     $("#gpu_id").hide();
              //     $("#cpu_id").hide();
              //     $("#battery_power_id").hide();
              //     $("#touchscreen_id").show();
              //     $("#dpi_id").hide();
              //     $("#programmable_button_id").hide();
              //     $("#wireless_id").hide();
              // }else{
              //   alert("nothig");
              //     $("#ram_size_id").hide();
              //     $("#screen_size_id").hide();
              //     $("#refresh_rate_id").hide();
              //     $("#resolution_id").hide();
              //     $("#storage_id").hide();
              //     $("#gpu_id").hide();
              //     $("#cpu_id").hide();
              //     $("#battery_power_id").hide();
              //     $("#touchscreen_id").hide();
              //     $("#dpi_id").hide();
              //     $("#programmable_button_id").hide();
              //     $("#wireless_id").hide();
              // }
          // });
        </script>
    </body>
</html>