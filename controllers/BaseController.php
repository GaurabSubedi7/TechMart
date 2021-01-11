<?php 
    class BaseController{
        public static function createView($viewName, $data = NULL, $extraData = NULL,$extraData1 = NULL){
            if ($data != Null){
                extract($data);
            }
            if ($extraData != Null){
                extract($extraData);
            }
            if ($extraData1 != Null){
                extract($extraData1);
            }
            $avatarSets = AvatarModel::getAvatar();
            $avatarData = ['avatarSets'=>$avatarSets];
            
            extract($avatarData);
            require_once './views/'.$viewName.'.php';
        }
    }
?>