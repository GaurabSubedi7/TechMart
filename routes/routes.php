<?php
    // include './classes/Route.php';
    // setting routes in the begining because of one simple to do but complicated to explain problem
    // please leave it here!!
    // and please set the route name like this in the beginning pls ;)
    Route::set('index.php');
    Route::set('home');
    Route::set('list_products');
    Route::set('userlogin');
    Route::set('usersignup');
    Route::set('vendorlogin');
    Route::set('vendorsignup');
    Route::set('logout');
    Route::set('list_users');
    Route::set('list_vendors');
    Route::set('notfound');
    Route::set('vendor/upload');
    Route::set('list_products/cart');
    Route::set('userProfile');
    Route::set('vendorProfile');
    Route::set('vendor/updateProduct');
    Route::set('list_products/compare');

    //compare 
    Route::get('list_products/compare', function(){
        ComparisionController::compareView('compare');
    });
    Route::post('list_products/compare', function(){
        ComparisionController::compareData($_POST,'compareNow');
    });
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    /*Products */

    Route::get('list_products',function(){
        ProductController::showItem($_GET,'list_products');
    });

    Route::post('list_products',function(){
        ProductController::addCart($_GET);
    });

    Route::get('list_products',function(){
        ProductController::searchItems($_GET,'list_products');
    });

    /*cart */

    Route::get('list_products/cart',function(){
        ProductController::listCartItem('cart');
    });

    Route::get('list_products/cart',function(){
        ProductController::RemoveCartItem($_GET,'cart');
    });

    Route::get('list_products/cart',function(){
        ProductController::updateCartItem($_GET,'updatebtn');
    });

    /* user login and signup */
    
    Route::get('userlogin',function(){
        UserController::showLogin('userlogin');
    });

    Route::post('userlogin',function(){
        //$_POST sends all post data and userlogin is the button name
        UserController::postLogin($_POST,"userlogin");
    });

    Route::get('usersignup',function(){
        UserController::showLogin('usersignup');
    });

    Route::post('usersignup',function(){
        //$_POST sends all post data and usersignup is the button name
        UserController::postSignup($_POST,"usersignup");
    });

    // profiles for vendor and user
    Route::get('userProfile',function(){
        UserController::showUserProfile('userProfile');
    });

    Route::post('userProfile',function(){
        UserController::UpdateProfile($_POST,"updateUser");
    });

    Route::post('userProfile',function(){
        UserController::changeUserAvatar($_GET,"updateAvatar");
    });

    Route::get('vendorProfile',function(){
        VendorController::showVendorProfile('vendorProfile');
    });

    Route::post('vendorProfile',function(){
        VendorController::updateVendorProfile($_POST,"updateVendor");
    });

    Route::post('vendorProfile',function(){
        VendorController::changeVendorAvatar($_GET,"updateVendorAvatar");
    });

    // =====================================

    Route::get('logout',function(){
        UserController::logoutUser('logout');
    });

    /* ------------------------------------- */

    /* vendor login and signup */

    Route::get('vendorlogin',function(){
        VendorController::showLogin('vendorlogin');
    });

    Route::post('vendorlogin',function(){
        //$_POST sends all post data and vendorlogin is the button name
        VendorController::postLogin($_POST,"vendorlogin");
    });

    Route::get('vendorsignup',function(){
        VendorController::showLogin('vendorsignup');
    });

    Route::post('vendorsignup',function(){
        //$_POST sends all post data and vendorsignup is the button name
        VendorController::postSignup($_POST,"vendorsignup");
    });

    Route::get('logout',function(){
        VendorController::logoutVendor('logout');
    });

    Route::get('vendor/upload',function(){
        VendorController::ShowUpload('upload');
    });

    Route::post('vendor/upload',function(){
        VendorController::ProductPost($_POST);
    });

    Route::get('vendor/updateProduct',function(){
        VendorController::showUpdatePage('updateProduct');
    });

    Route::get('vendor/updateProduct',function(){
        VendorController::removeProduct($_GET,'deletebtn');
    });

    Route::post('vendor/updateProduct',function(){
        VendorController::updateProduct($_POST,'updatebtn');
    });
    /* ------------------------------------- */

    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });

    Route::get('list_vendors',function(){
        VendorController::showVendors('list_vendors');
    });

    Route::get('notfound', function(){
        IndexController::createView('notfound');
    });

?>