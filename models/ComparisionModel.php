<?php
    class ComparisionModel extends BaseModel
    {

        public static function categoryidCheck($id)
        {
            $st_uid = self::$pdo->prepare("select category_id from categories where product_id = :product_id");
                $st_uid->bindParam(':product_id',$id);
                $st_uid->execute();
                $catId = $st_uid->fetch();
                return $catId;
        }

        public static function getName($id)
        {
            $st_uid = self::$pdo->prepare("select product_name from products where product_id = :product_id");
            $st_uid->bindParam(':product_id',$id);
            $st_uid->execute();
            $catId = $st_uid->fetch();
            return $catId['product_name'];
        }

        public static function listProducts($categoryIndex)
        {

            if(!empty($_SESSION['logged_user']))
            {
                $username = $_SESSION['logged_user'];
                $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
                $st_uid->bindParam(':username',$username);
                $st_uid->execute();
                $userId = $st_uid->fetch();  
                $_SESSION['user_id']=$userId['user_id'];
                $st = self::$pdo->prepare(" select * from products where product_id != ALL(select product_id from carts where user_id =  :user_id) AND category_id = :cid");
               $st->bindParam(':cid',$categoryIndex);
                $st->bindParam(':user_id',$_SESSION['user_id']);
                $st->execute();
                $products = $st->fetchall();
                return $products;
            
            }
            else{
                   $st = self::$pdo->prepare("select * from products INNER JOIN vendors ON products.vendor_id = vendors.vendor_id AND category_id = :cid");
                   $st->bindParam(':cid',$categoryIndex);
        $st->bindParam(':cid',$categoryIndex);
                   $st->execute();
            $products = $st->fetchall();
            return $products;
            }

         
        }
//laptop, monitor, mouse
        public static function dataExtract($did, $categoryIndex)
        {
            switch($categoryIndex)
            {
                case 1:
                    $stmt = "select ram,screen_size,refresh_rate,resolution,storage,gpu,cpu,battery_power,touchscreen from descriptions where product_id = :did "; //laptop 
                break;

                case 2:
                              $stmt = "select dpi,programmable_buttons,wireless from descriptions where product_id = :did"; //mouse
          
                break;

                case 3:
                    $stmt = "select screen_size,refresh_rate,resolution,touchscreen from descriptions where product_id = :did "; //monitor
     
                break;

                default:
                $stmt = "select * from descriptions where product_id = :did";
            }
            $st_des = self::$pdo->prepare($stmt);
            $st_des->bindParam(':did',$did);
            $st_des->execute();
                $data = $st_des->fetchall();
               // var_dump($data);
                return $data;

        }

    }
    
    ?>

