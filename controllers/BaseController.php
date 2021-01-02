<?php 
    class BaseController{
        public static function createView($viewName, $data = NULL, $extraData = NULL){
            if ($data != Null){
                extract($data);
            }
            if ($extraData != Null){
                extract($extraData);
            }
            $avatarSets = AvatarModel::getAvatar();
            $avatarData = ['avatarSets'=>$avatarSets];
            
            extract($avatarData);
            require_once './views/'.$viewName.'.php';
        }
    }
?>