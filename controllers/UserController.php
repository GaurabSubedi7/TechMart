<?php 
    class UserController extends BaseController
    {
        public static function showLogin($route)
        {
            self::createView($route);
        }

        public static function showSignup($route)
        {
            self::createView($route);
        }

        public static function showUsers($route)
        {
            $users = UserModel::listUsers();
            $data = ['users'=>$users];
            self::createView($route, $data);
        }

        public static function postLogin($post,$btnName)
        {
            if (isset($_POST[$btnName])){
            $checkUser_Status = UserModel::checkUser($post['name'],$post['password']);
            //var_dump($checkUser_Status);
            if($checkUser_Status)
            {
                header("Location: http://localhost/TechMart/list_products", TRUE, 301);
                exit();
            }
            else{
                echo "Invalid credential";
            }
        }

    }

        public static function postSignup($post,$btnName)
        { if (isset($_POST[$btnName]))
            {
            $stat = 0;
            $stat = UserModel::addUser($post);
           
            }
        }

        }
    
?>