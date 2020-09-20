<?php 
    class BaseController{
        public static function createView($viewName, $data = NULL){
            if ($data != Null){
                extract($data);
            }
            require_once './views/'.$viewName.'.php';
        }
    }
?>