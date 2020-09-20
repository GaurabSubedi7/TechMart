<?php 
    class Route{

        public static $validRoute = array();

        protected $routes = [
            'GET' => [],
            'POST' => []
        ];
        public static function uri(){
            return trim(
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
                '/'
            );
        }    
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