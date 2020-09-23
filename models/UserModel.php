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

    }   
?>