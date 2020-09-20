<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::set('index.php', function(){
        IndexController::createView('home');
    });

    Route::set('list_products',function(){
        ProductController::showItem('list_products');
    });

    Route::set('login',function(){
        UserController::showLogin('login');
    });
    Route::set('signup',function(){
        UserController::showSignup('signup');
    });
?>