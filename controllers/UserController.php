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
    }
?>