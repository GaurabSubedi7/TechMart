<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
    });

    Route::get('logout',function(){
        UserController::logoutUser('logout');
    });

    Route::get('userlogin',function(){
        UserController::showLogin('userlogin');
    });
    
    Route::get('login',function(){
        UserController::showLogin('login');
    });

    Route::get('signup',function(){
        UserController::showSignup('signup');
    });

    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });

    Route::post('userlogin',function(){
        UserController::postLogin($_POST,"login");//$_POST sends all post data and login is the button name
    });

    Route::post('signup',function(){
        UserController::postSignup($_POST,"signup");
    });

    // Route::get('userlogin', function(){
    //     IndexController::createView('userlogin');
    // });

    Route::get('vendorlogin', function(){
        IndexController::createView('vendorlogin');
    });

?>