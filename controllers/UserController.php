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
                $checkUser_Status = UserModel::userLogin($post['name'],$post['password']);
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
        { 
            if (isset($_POST[$btnName]))
            {
                $checkinguser = UserModel::checkUser($post['username']);
                if($checkinguser==1)
                {
                    // need to redirect somewhere after signup. i tried and didnot work :(
                    //tried to use header tag from above and gave error. 
                    //if you are trying to redirect it somewhere..pls redirect it to userlogin.
                    $stat = 0;
                    $stat = UserModel::addUser($post);
                }
                else if(empty($post['username'])){
                    echo "cannot have empty username";
                }
                else
                {
                    echo "Username exists";
                }
            }
        }

        }
    
?>