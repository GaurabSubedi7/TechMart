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
                
                <div class="col s2 right">
                <ul class="collapsible popout right">
                <li>
                <div class="collapsible-header btn-floating right" onclick="load_home()"><i class="material-icons">shopping_cart</i>Cart</div>
                <div  id ="content" class="collapsible-body right"></div></li>
                </ul>
                </div>
             
                <!-- to here -->
        </div>

  </nav>



<div class="container">
<?php
 foreach($products as $product){ ?> 
    <form method="post" action="?action=add&id=<?php echo $product['product_id']; ?>">
     
    <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
            
        <img alt="./views/public/img/<?php echo $product['product_image']; ?>" src="./views/public/img/RTX3090.jpg" srcset="">
          <span class="card-title"><?php echo $product['product_name']; ?></span>
          <button class="btn-floating halfway-fab waves-effect waves-light red" onclick="M.toast({html: 'Added to your cart'})"><i class="material-icons">add</i></button>
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

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
</body>
</html>
            

