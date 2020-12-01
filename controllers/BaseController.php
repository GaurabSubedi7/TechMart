<?php 
    class BaseController{
        public static function createView($viewName, $data = NULL, $cartdata = NULL){
            if ($data != Null){
                extract($data);
            }
            if ($cartdata != Null){
                extract($cartdata);
            }
            require_once './views/'.$viewName.'.php';
        }
    }
?>