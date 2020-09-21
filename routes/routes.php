<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
    });

    Route::get('login',function(){
        UserController::showLogin('login');
    });

    Route::post('login',function(){
        UserController::postLogin($_POST);
    });

    Route::get('signup',function(){
        UserController::showSignup('signup');
    });

    Route::post('signup',function(){
        UserController::postSignup($_POST);
    });


    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });
?>