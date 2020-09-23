<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
    });

    /* ---------------- User login ----------------- */
    
    Route::get('userlogin',function(){
        UserController::showLogin('userlogin');
    });
    
    Route::post('userlogin',function(){
        UserController::postLogin($_POST,"userlogin");//$_POST sends all post data and login is the button name
    });
    
    /* ------------------------------------------------ */
    
    
    /* ---------------- User signup ----------------- */
    
    Route::get('usersignup',function(){
        UserController::showSignup('usersignup');
    });
    
    Route::post('usersignup',function(){
        UserController::postSignup($_POST,"usersignup");
    });
    
    /* ------------------------------------------------ */

    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });

    Route::get('vendorlogin', function(){
        IndexController::createView('vendorlogin');
    });

?>