<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
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

    Route::get('logout',function(){
        UserController::logoutUser('logout');
    });

    /* ----------------------------- */

    /* vendor login and signup */

    Route::get('vendorlogin',function(){
        VendorController::showLogin('vendorlogin');
    });

    Route::post('vendorlogin',function(){
        //$_POST sends all post data and userlogin is the button name
        VendorController::postLogin($_POST,"vendorlogin");
    });

    Route::get('vendorsignup',function(){
        VendorController::showLogin('vendorsignup');
    });

    Route::post('vendorsignup',function(){
        //$_POST sends all post data and usersignup is the button name
        VendorController::postSignup($_POST,"vendorsignup");
    });

    Route::get('logout',function(){
        UserController::logoutVendor('logout');
    });

    /* ----------------------------- */

    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });

    Route::get('list_vendors',function(){   
        VendorController::showVendors('list_vendors');
    });

?>