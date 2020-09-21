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
        }

        public static function post($routes, $function)
        {
            $function->__invoke();
        }
    }
?>