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

            .cart{
                top: 63px !important;
                width: 300px !important;
                height: auto !important;
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
                                <a href="" class="z-depth-0 transparent dropdown-trigger wave-effect waves-light btn" data-target="cart" onclick="load_home()"><i class="material-icons">shopping_cart</i></a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <ul class="dropdown-content cart" id="cart">
            <li id="content"></li>
        </ul>


        <!-- ------------- -->

        <div class="container">
<?php

 foreach($products as $product){ ?> 
    <form method="post" action="?action=add&id=<?php echo $product['product_id']; ?>">
     
    <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
            
        <img alt="./views/public/img/<?php echo $product['product_image']; ?>" src="./views/public/img/drone_sunset.jpg" srcset="">
          <span class="card-title"><?php echo $product['product_name']; ?></span>
          <?php
          if(empty($_SESSION['logged_user']))
          {
            ?>
             <a href="http://localhost/project5/TechMart/userlogin" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            <?php
          }else{
          
          ?>
          <button class="btn-floating halfway-fab waves-effect waves-light red" onclick="M.toast({html: 'Added to your cart'})"><i class="material-icons">add</i></button>
     <?php }?>
        </div>
        <div class="card-content">
          <p> <h3><?php echo $product['product_price']; ?></h3> </p>
          <p> <h3><?php echo $product['product_description']; ?></h3> </p>
        </div>
      </div>
    </div>
  </div>             
    
        </form>
<?php } ?>
</div>
<div id="topBar">  </div>

        <!-- ------------------ -->



        <script>
            function load_home() {
                document.getElementById("content").innerHTML='<object type="text/html" data="http://localhost/project5/TechMart/list_products/cart"></object>';
            }

            $(document).ready(function(){
                $('.collapsible').collapsible();
                $('.dropdown-trigger').dropdown();
            });
        </script>
    </body>
</html>