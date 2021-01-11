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
        <nav class="nav-wrapper grey darken-4">
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
  <a class="waves-effect waves-light btn-flat modal-trigger grey darken-4 hide-on-med-and-down" href="#modal1"><i class="large material-icons white-text  ">filter_list</i>Filters</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <!-- from here -->
    <div class="input-field">
    <h4 class="grey-text text-darken-4">Categories</h4>
                                      <select name="categories">
                                          <?php 
                                          foreach($categoriesItem as $category)
                                            {?>
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
                        if(!empty($_SESSION['logged_user']) || !empty($_SESSION['logged_vendor']))
                        {
                          $cartCount = 0;
                            foreach($cartItem as $item)
                            { 
                                $cartCount += 1; }
                          ?>
                            <li>
                                <a href="list_products/cart" class="z-depth-0 transparent wave-effect waves-light btn"><i class="material-icons">shopping_cart</i></a>
                            </li>
                              <li><input type="button" class="circle orange-text text-lighten-1 new grey darken-3" value="<?php echo $cartCount; ?>" style="border:none;margin-left:-35px;"></li>
                    <?php }else{ ?>
                            <li class="hide-on-small-only">
                              <a href="http://localhost/project5/TechMart/userlogin" class="btn orange" type="submit">Login</a>
                            </li>
                            <li class="hide-on-small-only">
                              <a href="http://localhost/project5/TechMart/usersignup" class="btn transparent z-depth-0" type="submit">SignUp</a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>


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
                        <p><?php echo $filteredproduct['product_description']; ?> </p>
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
        ?>
        <div class="container">
          <div class="row">
            <?php
              foreach($products as $product){ ?> 
                <form method="post" action="?action=add&id=<?php echo $product['product_id']; ?>">
                  <div class="col s12 m6 l4">
                    <div class="card medium sticky-action">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="./views/public/img/<?php echo $product['product_image'];?>" style="height:230px;width:300px;">
                      </div>
                      <div class="card-content">
                        <span class="activator grey-text text-darken-4"><i class="material-icons right">more_vert</i><h6><?php echo $product['product_name']; ?></h6></span>
                        <p><a class="orange-text" href=""><b>Rs. <?php echo intval($product['product_price']); ?></b></a></p> <br>
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
                        <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><?php echo $product['product_name']; ?></span>
                        <p><?php echo $product['product_description']; ?> </p>
                      </div>
                    </div>
                  </div>            
                </form>
            <?php } ?>
          </div>
        </div>
        <div class="footer-copyright" style="margin-top:175px;margin-bottom:5px;">
            <div class="container center-align">&copy; 2020 TechMart</div>
        </div>
        <?php } ?>                       
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

        </script>
    </body>
</html>