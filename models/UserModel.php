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
    }   
?>