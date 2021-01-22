<?php
    class VendorModel extends BaseModel
    {
        public static function listVendors()
        {
            $st = self::$pdo->prepare("select * from vendors");
            $st->execute();
            $vendors = $st->fetchall();
            return $vendors;
        }

        public static function checkVendor($vendor_name)
        {
            $st = self::$pdo->prepare("select * from vendors where vendor_name:vendor");
            $st->bindParam(":vendor",$vendor_name);
            $st->execute();
            $vendors = $st->fetchall();
            if($vendors)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }

        public static function vendorLogin($vendor_name,$password)
        {
            $st = self::$pdo->prepare("select * from vendors where vendor_name=:vendor and password=:pass");
            $st->bindParam(":vendor",$vendor_name);
            $st->bindParam(":pass",$password);
            $st->execute();
            $vendor_Detail = $st->fetch();
            if($vendor_Detail){
                 return $vendor_Detail;
            }
           
        }

        public static function addVendor($data)
        {
            $st = self::$pdo->prepare("insert into vendors (vendor_name,email,phone_number,status,password,address) values(:vendor_name,:email,:number,1,:password,:address)");
           
           $st->bindParam(":vendor_name",$data['vendor_name']);
           $st->bindParam(":email",$data['email']);
           $st->bindParam(":number",$data['phone_number']);
           $st->bindParam(":password",$data['password']);
           $st->bindParam(":address",$data['address']);
           $st->execute();
           return 1;
        }

        public static function addVendorAvatar($data){
            $vendor_id = VendorModel::GetId();
            $_SESSION['vendor_id']=$vendor_id['vendor_id'];
            $vid = $_SESSION['vendor_id'];
            $avatarId = $data['vendor_avatar_id'];  
            $st2 = self::$pdo->prepare("insert into vendor_avatars values($vid, $avatarId)");
            $st2->execute();
        }

        public static function GetId()
        {
            $st = self::$pdo->prepare("select vendor_id from vendors where vendor_name= :vendor_name");
            $st->bindParam(":vendor_name",$_SESSION["logged_vendor"]);
            $st->execute();
            $vendor_id = $st->fetch();
            return $vendor_id;
        }

        public static function getVendorData()
        {
            $st = self::$pdo->prepare("select vendor_name,email,phone_number,address from vendors where vendor_name =:vendorname");
            $st->bindParam(":vendorname",$_SESSION['logged_vendor']);
            $st->execute();
            $detail = $st->fetch();
            return $detail;
        }

        public static function getVendorAvatar()
        {
            $vendorname = $_SESSION['logged_vendor'];
                $st_uid = self::$pdo->prepare("select vendor_id from vendors where vendor_name = :vendorname");
                $st_uid->bindParam(':vendorname',$vendorname);
                $st_uid->execute();
                $vendorId = $st_uid->fetch();
                $_SESSION['vendor_id']=$vendorId['vendor_id'];
            $avatarStatement = self::$pdo->prepare("SELECT * FROM vendor_avatars INNER JOIN avatars ON vendor_avatars.avatar_id = avatars.avatar_id AND vendor_avatars.vendor_id = :vendorId");
            $avatarStatement->bindParam(':vendorId',$_SESSION['vendor_id']);
            $avatarStatement->execute();
            $avatars = $avatarStatement->fetchall();
            return $avatars;
        }

        public static function updateVendor($data)
        {
            $st = self::$pdo->prepare("update vendors set email =:email,phone_number =:number,address =:address where vendor_name =:vendor_name");
            $st->bindParam(":vendor_name",$_SESSION['logged_vendor']);
            $st->bindParam(":email",$data['email']);
            $st->bindParam(":number",$data['phone_number']);
            $st->bindParam(":address",$data['address']);
            $st->execute();
            header("Location: http://localhost/project5/TechMart/vendorProfile", TRUE, 301);
            exit();
        }

        public static function updateVendorAvatar($avatar_id){
            $vendorname = $_SESSION['logged_vendor'];
                $st_uid = self::$pdo->prepare("select vendor_id from vendors where vendor_name = :vendorname");
                $st_uid->bindParam(':vendorname',$vendorname);
                $st_uid->execute();
                $vendorId = $st_uid->fetch();
                $_SESSION['vendor_id']=$vendorId['vendor_id'];
            $st = self::$pdo->prepare("update vendor_avatars set avatar_id = :avatar_id where vendor_id = :vendor_id");
            $st->bindParam(':avatar_id',$avatar_id);
            $st->bindParam(':vendor_id',$_SESSION['vendor_id']);
            $st->execute();
        }

        public static function uploadProduct($data, $filename){
            $Istmt = self::$pdo->prepare("INSERT INTO products (product_name,product_price,product_quantity,product_image,category_id,vendor_id) VALUES(:product_name,:product_price,:product_quantity,:product_image,:category_id,:vendor_id)");
           $Istmt->bindParam(":product_name",$data['product_name']);
           $Istmt->bindParam(":product_price",$data['product_price']);
           $Istmt->bindParam(":product_quantity",$data['product_quantity']);
           $Istmt->bindParam(":product_image",$filename);
           $Istmt->bindParam(":category_id",$data['categories']);
           $Istmt->bindParam(":vendor_id",$data['vendor_id']);
           $Istmt->execute();
        }

        public static function addDescription($data){
            $stPid = self::$pdo->prepare("SELECT product_id FROM products WHERE product_name = :product_name");
            $stPid->bindParam(":product_name",$data['product_name']);
            $stPid->execute();
            $pid = $stPid->fetchall();
            $product_id = $pid[0]['product_id'];

            switch($data['categories']){
                case 1:
                    //laptop 
                    $stmt = self::$pdo->prepare("insert into descriptions (product_id,ram,screen_size,refresh_rate,resolution,storage,gpu,cpu,battery_power,touchscreen,others) values(:pid,:ram,:screen_size,:refresh_rate,:resolution,:storage,:gpu,:cpu,:battery_power,:touchscreen,:others)");
                    $stmt->bindParam(":pid",$product_id);
                    $stmt->bindParam(":others",$data['other']);                    
                    $stmt->bindParam(":ram",$data['ram_size']);                    
                    $stmt->bindParam(":screen_size",$data['screen_size']);                    
                    $stmt->bindParam(":refresh_rate",$data['refresh_rate']);                    
                    $stmt->bindParam(":resolution",$data['resolution']);                    
                    $stmt->bindParam(":storage",$data['storage']);                    
                    $stmt->bindParam(":gpu",$data['gpu']);                    
                    $stmt->bindParam(":cpu",$data['cpu']);                    
                    $stmt->bindParam(":battery_power",$data['battery_power']);                    
                    $stmt->bindParam(":touchscreen",$data['touchscreen']);                    
                break;

                case 2:
                    //mouse
                    $stmt = self::$pdo->prepare("insert into descriptions (product_id,dpi,programmable_buttons,wireless,others) values(:pid,:dpi,:buttons,:wireless,:others)"); 
                    $stmt->bindParam(":pid",$product_id);
                    $stmt->bindParam(":others",$data['other']);
                    $stmt->bindParam(":dpi",$data['dpi']);
                    $stmt->bindParam(":buttons",$data['programmable_button']);
                    $stmt->bindParam(":wireless",$data['wireless']);
                break;
                
                case 3:
                    //monitor
                    $stmt = self::$pdo->prepare("insert into descriptions (product_id,screen_size,refresh_rate,resolution,touchscreen,others) values(:pid,:screen_size,:refresh_rate,:resolution,:touchscreen,:others)");
                    $stmt->bindParam(":pid",$product_id);
                    $stmt->bindParam(":others",$data['other']);
                    $stmt->bindParam(":screen_size",$data['screen_size']);                    
                    $stmt->bindParam(":refresh_rate",$data['refresh_rate']);                    
                    $stmt->bindParam(":resolution",$data['resolution']);
                    $stmt->bindParam(":touchscreen",$data['touchscreen']);
                break;

                default:
                    $stmt = self::$pdo->prepare("insert into descriptions (product_id,others) values(:pid,:others)");
                    $stmt->bindParam(":pid",$product_id);
                    $stmt->bindParam(":others",$data['other']);
            }
            $stmt->execute();
        }

        public static function GetCategories()
        {
            $st = self::$pdo->prepare("select * from categories ORDER BY category_name");
            $st->execute();
            
            $Categoriesdata = $st->fetchall();
            return $Categoriesdata;
        }

        public static function listVendorProducts(){
            $st = self::$pdo->prepare("select * from products p INNER JOIN descriptions d ON p.product_id = d.product_id where p.vendor_id = :vendor_id");
            $st->bindParam(':vendor_id',$_SESSION['vendor_id']);
            $st->execute();
            $products = $st->fetchall();
            return $products;
        }

        public static function removeMyProduct($product_id){
            // remove description first
            $removeDes = self::$pdo->prepare("delete from descriptions where product_id = :pid");
            $removeDes->bindParam(":pid",$product_id);
            $removeDes->execute();
            // now turn for product
            $removeProduct = self::$pdo->prepare("delete from products where product_id = :product_id");
            $removeProduct->bindParam(":product_id",$product_id);
            $removeProduct->execute();
        }

        public static function updateMyProduct($data, $filename){
            $st = self::$pdo->prepare("update products set product_name =:name,product_price =:price,product_quantity =:qty, product_image = :img where product_id =:pid");
            $st->bindParam(':name',$data['product_name']);
            $st->bindParam(':price',$data['product_price']);
            $st->bindParam(':qty',$data['product_quantity']);
            $st->bindParam(':img',$filename);
            $st->bindParam(':pid',$data['product_id']);
            $st->execute();
        }
    }   
?>