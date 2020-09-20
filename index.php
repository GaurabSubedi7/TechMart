<?php 
    require_once './routes/routes.php';
    
    /* Loading all the classes in at once in the starting using __autoload().
        Classes folder contains the Route folder responsible for Routing operations.
        Controllers folder contains all the controllers we need in this fakin website.
        Models folder contains all the models this biatch needs. ;)
    */

    function __autoload($class_name){
        if (file_exists('./classes/'.$class_name.'.php')){
            require_once './classes/'.$class_name.'.php';
        }
        
        if (file_exists('./controllers/'.$class_name.'.php')){
            require_once './controllers/'.$class_name.'.php';
        }
        
        if (file_exists('./models/'.$class_name.'.php')){
            require_once './models/'.$class_name.'.php';
        }
    }
?>