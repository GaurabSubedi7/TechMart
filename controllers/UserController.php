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

        public static function postLogin($post)
        {
            $checkUser_Status = UserModel::checkUser($post['name'],$post['password']);
            //var_dump($checkUser_Status);
            if($checkUser_Status)
            {
                echo "User found";
            }
            else{
                echo "Invalid credential";
            }

        }
    }
?>