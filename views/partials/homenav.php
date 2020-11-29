<nav class="navwrapper homenav grey transparent">
    <div class="container">
        <a href="/project5/TechMart" class="brand-logo"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
        <a href="" class="sidenav-trigger" data-target="mobile-menu">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down" id="homenavlist">
            <?php
                $_SESSION['logged_member'] = NULL;
                if(!empty($_SESSION['logged_user'])){
                    $_SESSION['logged_member'] = $_SESSION['logged_user'];
                }
                if(!empty($_SESSION['logged_vendor'])){
                    $_SESSION['logged_member'] = $_SESSION['logged_vendor'];
                }
                if(empty($_SESSION['logged_member']))
                {
            ?>
                <li><a href="#" class="homenavlist waves-effect waves-light active">About</a></li>
                <li><a href="#" class="homenavlist waves-effect waves-light dropdown-trigger" data-target="dropme1">Shop With Us<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="#" class="homenavlist waves-effect waves-light dropdown-trigger" data-target="dropme2">Sell With Us<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php
            }else{
                if(!empty($_SESSION["logged_user"])){?>
                    <li><a href="#" class="homenavlist waves-effect waves-light active"> <?php echo $_SESSION['logged_user'];?></a></li>
                    <?php
                    
                }
                
                if(!empty($_SESSION["logged_vendor"])){?>
                    <li><a href="vendor/upload" class="homenavlist waves-effect waves-light active"> <?php echo $_SESSION['logged_vendor'];?></a></li>
            <?php  }
            ?>
            <li><a href="logout" class="homenavlist waves-effect waves-light active">logout</a></li>
                
            <?php }   ?>
            <li><a href="list_products" class="homenavlist waves-effect waves-light">Visit Store</a></li>
        </ul>
     
 

        <!-- dropdown menu -->
        <ul class="dropdown-content accessing" id="dropme1">
            <li><a href="userlogin" class="waves-effect waves-light">Sign In</a></li>
            <li><a href="usersignup" class="waves-effect waves-light">Sign Up</a></li>
        </ul>

        <ul class="dropdown-content accessing" id="dropme2">
            <li><a href="vendorlogin" class="waves-effect waves-light">Sign In</a></li>
            <li><a href="vendorsignup" class="waves-effect waves-light">Sign Up</a></li>
        </ul>

        <ul class="dropdown-content" id="d1">
            <li><a href="userlogin" class="waves-effect waves-light">Sign In</a></li>
            <li><a href="usersignup" class="waves-effect waves-light">Sign Up</a></li>
        </ul>

        <ul class="dropdown-content" id="d2">
            <li><a href="vendorlogin" class="waves-effect waves-light">Sign In</a></li>
            <li><a href="vendorsignup" class="waves-effect waves-light">Sign Up</a></li>
        </ul>
     
        <!-- hamburger menu -->
        <ul class="sidenav grey lighten-1" id="mobile-menu">
                <li><a href="#" class="waves-effect waves-light">About</a></li>
                <li><a href="#" class="waves-effect waves-light dropdown-trigger" data-target="d1">Shop With Us<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="#" class="waves-effect waves-light dropdown-trigger" data-target="d2">Sell With Us<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>