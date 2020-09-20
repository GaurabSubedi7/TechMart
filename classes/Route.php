<?php 
    class Route{
        public static $validRoute = array();
        public static function set($routes, $function){
            self::$validRoute[] = $routes;
            // print_r(self::$validRoute);
            if ($_GET['url'] == $routes){
                $function->__invoke();
            }
        }
    }
?>