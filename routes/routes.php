<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
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
    

    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
    });

    Route::post('list_products',function(){
        ProductController::searchItem($_POST);
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