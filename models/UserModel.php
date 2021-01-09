<?php
    class UserModel extends BaseModel
    {
        public static function listUsers()
        {
            $st = self::$pdo->prepare("select * from users");
            $st->execute();
            $users = $st->fetchall();
            return $users;
        }

        public static function checkUser($username)
        {
            $st = self::$pdo->prepare("select * from users where username:user");
            $st->bindParam(":user",$username);
            $st->execute();
            $users = $st->fetchall();
            if($users)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }

        public static function userLogin($username,$password)
        {
            $st = self::$pdo->prepare("select * from users where username=:user and password=:pass");
            $st->bindParam(":user",$username);
            $st->bindParam(":pass",$password);
            $st->execute();
            $user_Detail = $st->fetch();
            if($user_Detail){
                 return $user_Detail;
            }
           
        }

        public static function addUser($data)
        {
            $st = self::$pdo->prepare("insert into users (first_name,last_name,username,email,phone_number,status,password,address) values(:first_name,:last_name,:username,:email,:number,1,:password,:address)");
           $st->bindParam(":first_name",$data['first_name']);
           $st->bindParam(":last_name",$data['last_name']);
           $st->bindParam(":username",$data['username']);
           $st->bindParam(":email",$data['email']);
           $st->bindParam(":number",$data['phone_number']);
           $st->bindParam(":password",$data['password']);
           $st->bindParam(":address",$data['address']);
           $st->execute();
           return 1;
        }

        public static function addAvatar($data){
            $username = $_SESSION['logged_user'];
            $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
            $st_uid->bindParam(':username',$username);
            $st_uid->execute();
            $userId = $st_uid->fetch();
            $_SESSION['user_id']=$userId['user_id'];
            $uid = $_SESSION['user_id'];
            $avatarId = $data['user_avatar_id'];
            $st2 = self::$pdo->prepare("insert into user_avatars values($uid, $avatarId)");
            $st2->execute();
        }

        public static function GetUserData()
        {
            $st = self::$pdo->prepare("select first_name,last_name,username,email,phone_number,address from users where username =:username");
            $st->bindParam(":username",$_SESSION['logged_user']);
            //var_dump($_SESSION['logged_user']);
            $st->execute();
            $detail = $st->fetch();
            return $detail;
        }

        public static function UpdateUser($data)
        {
            $st = self::$pdo->prepare("update users set first_name = :first_name,last_name =:last_name,email =:email,phone_number =:number,address =:address where username =:username");
            $st->bindParam(":first_name",$data['first_name']);
            $st->bindParam(":last_name",$data['last_name']);
            $st->bindParam(":username",$_SESSION['logged_user']);
            $st->bindParam(":email",$data['email']);
            $st->bindParam(":number",$data['phone_number']);
            $st->bindParam(":address",$data['address']);
            $st->execute();
            header("Location: http://localhost/project5/TechMart/userProfile", TRUE, 301);
            exit();
        }

        public static function getUserAvatar()
        {
            $username = $_SESSION['logged_user'];
                $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
                $st_uid->bindParam(':username',$username);
                $st_uid->execute();
                $userId = $st_uid->fetch();
                $_SESSION['user_id']=$userId['user_id'];
            $avatarStatement = self::$pdo->prepare("SELECT * FROM user_avatars INNER JOIN avatars ON user_avatars.avatar_id = avatars.avatar_id AND user_avatars.user_id = :userId");
            $avatarStatement->bindParam(':userId',$_SESSION['user_id']);
            $avatarStatement->execute();
            $avatars = $avatarStatement->fetchall();
            return $avatars;
        }

        public static function updateUserAvatar($avatar_id){
            $username = $_SESSION['logged_user'];
                $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
                $st_uid->bindParam(':username',$username);
                $st_uid->execute();
                $userId = $st_uid->fetch();
                $_SESSION['user_id']=$userId['user_id'];
            $st = self::$pdo->prepare("update user_avatars set avatar_id = :avatar_id where user_id = :user_id");
            $st->bindParam(':avatar_id',$avatar_id);
            $st->bindParam(':user_id',$_SESSION['user_id']);
            $st->execute();
        }
    }   
?>