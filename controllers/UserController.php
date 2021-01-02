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

        public static function logoutUser($route)
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
                $checkUser_Status = UserModel::userLogin($post['username'],$post['password']);
                //var_dump($checkUser_Status);
                if($checkUser_Status)
                {
                   // $_SESSION['logged_user'] = $checkinguser_status['username'];
                   $_SESSION['logged_user'] =  $checkUser_Status['username'];
                   $_SESSION['shopping_cart'] = array();
                    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
                    exit();
                }
                else{
                    echo "<div class='container' id='error'><div class='card-panel  red darken-4 center-align'>Invalid credential</div></div>";
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
                    $stat = 0;
                    $stat = UserModel::addUser($post);
                    $_SESSION['logged_user'] = $post['username'];
                    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
                    ob_enf_flush();
                }
                else if(empty($post['username'])){
                    echo "<div class='container' id='error'><div class='card-panel  red darken-4 center-align'>Enter a username</div></div>";
                }
                else
                {
                    echo "<div class='container' id='error'><div class='card-panel  red darken-4 center-align'>Username exists</div></div>";
              
                }
            }
        }
        public static function showUserProfile($route)
        {
            $avatar = UserModel::getUserAvatar();
            $avatarData = ['avatars'=>$avatar];
            $user = UserModel::GetUserData();
            $data = ['user'=>$user];
            
            self::createView($route, $data, $avatarData);
        }

        public static function updateProfile($post,$btnName)
        {
            if(isset($_POST[$btnName]) && $btnName == "update")
            {
                UserModel::UpdateUser($post);
            }   
        }

        public static function changeUserAvatar($post, $btnName){
            if(isset($_POST[$btnName]) && $btnName == "updateAvatar")
            {
               if($post['action']=='updateAvatar'){
                   UserModel::updateUserAvatar($post['id']);
                   header("Location: http://localhost/project5/TechMart/userProfile", TRUE, 301);
               }
            }
        }
    }
?>