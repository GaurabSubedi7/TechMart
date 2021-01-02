
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="../views/public/css/style.css">
        <?php include 'partials/Elinks.php'; ?>
        <style>
            .cartimg{
                margin-top: 15px;
                height:140px;
                width: 200px;
                border-radius: 5px;
            }

            /* .badge{
            position: relative;
            top: 20px;
            right: 27px;
            border-radius: 20px;
            }    */

            .search-icon{
                width: 200px;
            }

            .modal {
                max-height: 500px; 
                overflow: visible;
            }
        </style>
    </head>
    <body>
            <!-- navbar for the cart -->
        <nav class="nav-wrapper grey darken-4">
            <!-- logo -->
            <a href="/project5/TechMart" class="brand-logo hide-on-med-and-down"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
            <div class="container">         
                <ul class="right">
                    <!-- logo for mobile -->
                    <li>
                        <a href="/project5/TechMart" class="brand-logo left hide-on-large-only"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img" style="height:50px;width:150px;"></a>
                    </li>
                    <!-- searchbar -->
                    <li class="search-icon" id="search-icon">
                        <nav class="z-depth-0 grey transparent">
                            <div class="nav-wrapper">
                                <form action="/project5/TechMart/list_products" method="get">
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
                        {
                            $cartCount = 0;
                            foreach($cartItem as $item)
                            {
                                $cartCount += 1; }
                            ?>
                            <li>
                                <a href="/project5/TechMart/list_products/cart" class="z-depth-0 transparent wave-effect waves-light btn hide-on-small-only"><i class="material-icons">shopping_cart</i></a>
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
        $total = 0;
        if(empty($cartItem)){   
            ?>
            <div class="container center">
                <h3 class="grey-text text-darken-3" style="margin-top:150px;"><b>Your Cart</b></h3>
                <p class="grey-text flow-text text-darken-2">Your cart is currently empty.</p>
                <a href="/project5/TechMart/list_products" class="btn waves-effect"><b>Continue Shopping</b><i class="material-icons right">arrow_right_alt</i></a>
            </div>
            <div class="footer-copyright" style="margin-top:281px;margin-bottom:5px;">
                <div class="container center-align">&copy; 2020 TechMart</div>
            </div>
            <?php
        }else{
            ?>
            <h3 class="grey-text text-darken-3 center"><b>Your Cart</b></h3>
            <div class="row hide-on-med-and-down">
                <div class="col m3 l4 center"><h6><b>Product</b></h6></div>
                <div class="col m3 l3 center"><h6><b>Price</b></h6></div>
                <div class="col m3 l2 center"><h6><b>Quantity</b></h6></div>
                <div class="col m3 l2 right"><h6><b>Total</b></h6></div>
            </div>
            <form method="post" id="thisform">
            <?php
            foreach($cartItem as $item)
            {
               ?>
                    <div class="row section">
                        <!-- product name -->
                        <div class="col s12 m6 l2">
                            <img class="cartimg" src="../views/public/img/<?php echo $item['product_image'];?>" alt="" class="responsive-img">
                        </div>
                        <div class="col s12 m6 l2 offset-l1">
                            <h6 class="grey-text text-darken-3"><b><?php echo $item['product_name']?></b></h6>
                            <p class="grey-text text-darken-3"><?php echo $item['product_description']?></p>
                            <input class="btn red" name="remove" type="button" value="Remove" style="margin-top:5px;" onclick="submitForm('remove',<?php echo $item['product_id']; ?>)">
                        </div>
                        <!-- ======== -->
                        <!-- price -->
                        <div class="col s12 m6 l2">
                            <h6 class="orange-text" style="margin-top:30px;"><b>NRs. <?php echo intval($item['product_price']); $eachtotal = $item['product_price'];?></b></h6>
                        </div>
                        <!-- ======= -->
                        <!-- quantity -->
                        <div class="col s12 m6 l2">
                            <input type="number" value="<?php echo $item['item_quantity']; $eachtotal = $item['item_quantity']*$eachtotal;?>" id="quantity" name="quantity" class="center">
                            <input class="btn orange lighten-1" type="submit" name="updatebtn" value="Update" style="margin-top:5px;" onclick="submitForm('update',<?php echo $item['product_id']; ?>)">
                        </div>
                        <!-- ========= -->
                        <!-- total for each item -->                   
                        <div class="col s12 m6 l2 right">
                            <h6 class="orange-text" style="margin-top:30px;"><b>NRs. <?php echo intval($eachtotal); $total = $eachtotal+$total;?></b></h6>
                        </div>
                    </div>
               <div class="divider black"></div>
            <?php } ?>
                <div style="margin-left:20px;">
                <p class="flow-text">Subtotal : NRs. <?php echo $total; ?></p>
                <a href="/project5/TechMart/list_products" class="btn waves-effect grey darken-3"><b>Continue Shopping</b></a>
                <a href="#" data-target="checkoutWindow" class="btn waves-effect modal-trigger"><b>Checkout</b></a>
            </div>
            <div class="footer-copyright" style="margin-top:110px;margin-bottom:10px;">
                <div class="container center-align">&copy; 2020 TechMart</div>
            </div>
            <?php } ?>
        </form>
        
        <!-- checkout window -->
        <div id="checkoutWindow" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><b>SUMMARY</b></h4>
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>Subtotal</h5>
                    </div>
                    <div class="col s4 m4 l4 push-l1">
                        <h5><?php echo 'NRs. '.$total; ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5>Delivery Charge</h5>
                    </div>
                    <div class="col s4 m4 l4 push-l1">
                        <h5>NRs. 60</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h5><b>TOTAL</b></h5>
                    </div>
                    <div class="col s4 m4 l4 push-l1">
                        <h5><b><?php $total=$total+60;echo 'NRs. '.$total; ?></b></h5>
                    </div>
                </div>
                <h5>Payment method</h5>
                <form action="#">
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio">
                            <span><i class="fas fa-money-bill-wave"> Cash on delivery</i></span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio">
                            <span><i class="fas fa-credit-card"> Credit Card</i></span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in"/>
                            <span>By checking this, you accept all our <a href="#">Terms and Conditions</a>.</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in"/>
                            <span>Receive email from TechMart about new products and offers in future.</span>
                        </label>
                    </p>
                </form>
            </div>
            <div class="modal-footer grey darken-4">
                <a href="#!" class="modal-close waves-effect waves-dark btn orange darken-3">Place Order</a>
            </div>
        </div>
        
        
        <script>
            function submitForm(action, id){
                var form = document.getElementById('thisform');
            form.action = "?action=" + action + "&id=" + id;
            form.submit();
        }
        
        //for checkout modal
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
</body>
</html>