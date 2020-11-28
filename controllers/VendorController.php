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
            self::createView($route ,$data);
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
                  //  $_SESSION['logged_user'] = $_SESSION['logged_vendor'];
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
            
       //  var_dump($data);
                    
        }
    }
?>