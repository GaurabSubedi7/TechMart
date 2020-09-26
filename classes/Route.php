<?php 
    class Route{

        public static $validRoute = array();
        
        public static function get($routes, $function){
            self::$validRoute[] = $routes;
            // print_r(self::$validRoute);
            //echo $_SERVER['REQUEST_METHOD'];
            if ($_GET['url'] == $routes){
                $function->__invoke();
            }
            // fak dis
            // if(!$found){
            //     $invalidRoute = ['invalidroute'=>$_GET['url']];
            //     $_GET['url'] = 'notfound';
            //     IndexController::createView($_GET['url'],$invalidRoute);
            // }
            
        }

        public static function post($routes, $function)
        {
            $function->__invoke();
        }
    }
?>