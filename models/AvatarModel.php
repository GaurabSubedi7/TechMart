<?php 
    class AvatarModel extends BaseModel{
        public static function getAvatar(){
            $st = self::$pdo->prepare("select * from avatars");
            $st->execute();
            $avatarSet = $st->fetchall();
            return $avatarSet;
        }
    }
?>