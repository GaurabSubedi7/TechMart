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
        public static function checkUser($username,$password)
        {
            $st = self::$pdo->prepare("select * from users where username=:user and password=:pass");
            $st->bindParam(":user",$username);
            $st->bindParam(":pass",$password);
            $st->execute();
            $user_Detail = $st->fetch();
            return $user_Detail;
        }

    }   
?>