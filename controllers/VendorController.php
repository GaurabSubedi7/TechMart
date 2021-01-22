<?php 
    class VendorController extends BaseController{
        public static function showLogin($route)
        {
            self::createView($route);
        }

        public static function showSignup($route)
        {
            self::createView($route);
        }

        public static function logoutVendor($route)
        {
            self::createView($route);
        }

        public static function showVendors($route)
        {
            $vendors = VendorModel::listVendors();
            $data = ['vendors'=>$vendors];
            self::createView($route, $data);
        }
      
        public static function ShowUpload($route)
        {
            $vendor_id = VendorModel::GetId();
            $data = ['vendor_id'=>$vendor_id];
            $categoriesItem = VendorModel::GetCategories();
            $categoriesData = ['categoriesItem'=>$categoriesItem];
            self::createView($route ,$data, $categoriesData);
        }

        public static function showUpdatePage($route){
            $vendor_id = VendorModel::GetId();
            $data = ['vendor_id'=>$vendor_id];
            $categoriesItem = VendorModel::GetCategories();
            $categoriesData = ['categoriesItem'=>$categoriesItem];
            self::createView($route ,$data, $categoriesData);
        }

        public static function postLogin($post,$btnName)
        {
            if (isset($_POST[$btnName])){
                $checkVendor_Status = VendorModel::vendorLogin($post['vendor_name'],$post['password']);
                //var_dump($checkUser_Status);
                if($checkVendor_Status)
                {
                   // $_SESSION['logged_user'] = $checkinguser_status['username'];
                   $_SESSION['logged_vendor'] =  $checkVendor_Status['vendor_name'];
                 //  $_SESSION['logged_user'] = $_SESSION['logged_vendor'];
                 $avatar = VendorModel::getVendorAvatar();
                    $avatarData = ['avatars'=>$avatar];
                    extract($avatarData);
                    $_SESSION['vendor_avatar'] = $avatars[0]['avatar_image'];
                    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
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
                $checkingvendor = VendorModel::checkVendor($post['vendor_name']);
                if($checkingvendor==1)
                {
                    $stat = 0;
                    $stat = VendorModel::addVendor($post);
                    $_SESSION['logged_vendor'] = $post['vendor_name'];
                    VendorModel::addVendorAvatar($post);
                    $avatar = VendorModel::getVendorAvatar();
                    $avatarData = ['avatars'=>$avatar];
                    extract($avatarData);
                    $_SESSION['vendor_avatar'] = $avatars[0]['avatar_image'];
                    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
                    ob_enf_flush();
                }
                else if(empty($post['vendor_name'])){
                    echo "cannot have empty vendor name";
                }
                else
                {
                    echo "Vendor name exists";
                }
            }
        }
        public static function ProductPost($data)
        {
            if(isset($data['addProduct'])){
                $target_dir = "/xampp/htdocs/project5/TechMart/views/public/img/";
                $file_name = $_FILES['product_image']['name'];
                $pic = VendorController::random_string(10).$file_name;
                $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($data["addProduct"])) {
                    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
                    if($check !== false) {
                        if(move_uploaded_file($_FILES['product_image']['tmp_name'],$target_dir.$pic)){
                            $uploadOk = 1;
                            VendorModel::uploadProduct($data, $pic);
                            VendorModel::addDescription($data);
                        }else{echo "notsuccess";}
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

            }
        }

        public static function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
         
            for ($i = 0; $i < $length; $i++) {  
                $key .= $keys[array_rand($keys)];
            }
         
            return $key;
         }

        public static function showVendorProfile($route)
        {
            $avatar = VendorModel::getVendorAvatar();
            $avatarData = ['avatars'=>$avatar];
            $vendor = VendorModel::getVendorData();
            $data = ['vendor'=>$vendor];
            
            self::createView($route, $data, $avatarData);
        }

        public static function updateVendorProfile($post,$btnName)
        {
            if(isset($_POST[$btnName]) && $btnName == "updateVendor")
            {
                VendorModel::updateVendor($post);
            }   
        }

        public static function changeVendorAvatar($post, $btnName){
            if(isset($_POST[$btnName]) && $btnName == "updateVendorAvatar")
            {
               if($post['action']=='updateVendorAvatar'){
                   VendorModel::updateVendorAvatar($post['id']);
                   $avatar = VendorModel::getVendorAvatar();
                    $avatarData = ['avatars'=>$avatar];
                    extract($avatarData);
                    $_SESSION['vendor_avatar'] = $avatars[0]['avatar_image'];
                   header("Location: http://localhost/project5/TechMart/vendorProfile", TRUE, 301);
               }
            }
        }
    }
?>