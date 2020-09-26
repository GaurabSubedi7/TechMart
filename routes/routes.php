<?php
    // require_once './classes/Route.php';
    // require_once './controllers/controller.php';
    
    Route::get('index.php', function(){
        IndexController::createView('home');
    });

    Route::get('list_products',function(){
        ProductController::showItem('list_products');
    });

    Route::post('list_products',function(){
        ProductController::searchItem($_POST);
    });
    
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

    Route::get('list_users',function(){
        UserController::showUsers('list_users');
    });

    Route::get('vendorlogin', function(){
        IndexController::createView('vendorlogin');
    });

?>