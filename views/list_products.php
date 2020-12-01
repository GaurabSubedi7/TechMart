<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Market</title>
        <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
        <?php include 'partials/Elinks.php'; ?>
        <style>
            .badge{
            position: relative;
            top: 20px;
            right: 27px;
            border-radius: 20px;
            }   

            .search-icon{
                width: 200px;
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
                                    <div class="input-field " id="searchbar">
                                        <input class="white-text transparent" id="search" name="searchKeyword" autocomplete="off" type="search" placeholder="Search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </li>
                    <?php
                        if(!empty($_SESSION['logged_user']))
                        {?>
                            <li>
                                <a href="list_products/cart" class="z-depth-0 transparent wave-effect waves-light btn"><i class="material-icons">shopping_cart</i></a>
                            </li>
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
        <div id="topBar">  </div>

        <!-- ------------------ -->



        <script>
            // function load_home() {
            //     document.getElementById("content").innerHTML='<object type="text/html" data="http://localhost/project5/TechMart/list_products/cart"></object>';
            // }

            $(document).ready(function(){
                $('.collapsible').collapsible();
                $('.dropdown-trigger').dropdown();
            });
        </script>
    </body>
</html>