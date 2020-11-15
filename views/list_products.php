<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <?php include 'partials/Elinks.php'; ?>
</head>
<body>

<nav>
        <div class="row">
            <div class="nav-wrapper col s10">
            <form>
                <div class="input-field">
                <input id="search" type="search" name="search" >
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
            </form>
            </div>

                <!-- for loading all the stuff from cart to content div -->
                <?php
          if(!empty($_SESSION['logged_user']))
          {?>
                <div class="col s2 right">
                <ul class="collapsible popout right">
                <li>
                <div class="collapsible-header btn-floating right" onclick="load_home()"><i class="material-icons">shopping_cart</i>Cart</div>
                <div  id ="content" class="collapsible-body right"></div>
                </li>
                </ul>
                </div>
          <?php } ?>
                <!-- to here -->
        </div>

  </nav>
wait for a sec to remove from cart it works noicely though


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
             <a href="http://localhost/project5/TechMart/userlogin" class="btn-floating halfway-fab waves-effect waves-light red">0</a>
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


<script>

function load_home() {
     document.getElementById("content").innerHTML='<object type="text/html" data="http://localhost/project5/TechMart/list_products/cart" ></object>';
}


  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
</body>
</html>
            

