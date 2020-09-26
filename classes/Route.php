<?php 
    class Route{

        public static $validRoute = array();

        public static function set($routes){
            self::$validRoute[] = $routes;
        }

        public static function get($routes, $function){
            // print_r(self::$validRoute);
            //echo $_SERVER['REQUEST_METHOD'];
            // if ($_GET['url'] == $routes){
            //     $function->__invoke();
            // }
            $checker = 0;
            foreach(self::$validRoute as $route){
                if ($_GET['url'] == $route){
                    $checker = 1;
                    // $function->__invoke();
                }
            }
            
            if($checker == 1){
                if($_GET['url'] == $routes){
                    $function->__invoke();
                }
            }
            
            if($checker == 0){
                $invalidRoute = ["invalidRoute"=>$_GET['url']];
                $_GET['url'] = "notfound";
                IndexController::createView($_GET['url'], $invalidRoute);
            }
        }

        public static function post($routes, $function)
        {
            $function->__invoke();
        }
    }
?>