<?php
    class ProductModel extends BaseModel
    {
        public static function listProducts()
        {

            if(!empty($_SESSION['logged_user']))
            {
                $username = $_SESSION['logged_user'];
                $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
                $st_uid->bindParam(':username',$username);
                $st_uid->execute();
                $userId = $st_uid->fetch();
                $_SESSION['user_id']=$userId['user_id'];
                $st = self::$pdo->prepare(" select * from products where product_id != ALL(select product_id from carts where user_id =  :user_id)");
                $st->bindParam(':user_id',$_SESSION['user_id']);
                $st->execute();
                $products = $st->fetchall();
                return $products;
            
            }
            else{
                   $st = self::$pdo->prepare("select * from products INNER JOIN vendors ON products.vendor_id = vendors.vendor_id");
            $st->execute();
            $products = $st->fetchall();
            return $products;
            }

         
        }

        public static function getProduct($searchQuery)
        {
            $st =self::$pdo->prepare("SELECT * FROM products  INNER JOIN vendors ON products.vendor_id = vendors.vendor_id WHERE product_name LIKE '{$searchQuery}%' LIMIT 100"); 
            $st->execute();
            $products = $st->fetchall();
            return $products;
        }

        public static function storeCart($username,$productId)
        {
            $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
            $st_uid->bindParam(':username',$username);
            $st_uid->execute();
            $userId = $st_uid->fetch();
             $st = self::$pdo->prepare("insert into carts values(:pid,:uid)");
             $st->bindParam(':pid',$productId);
            $st->bindParam(':uid',$userId['user_id']);
             $st->execute();
        }

        public static function GetCartItem()
        {
            
            $cartStatement = self::$pdo->prepare("SELECT * FROM carts INNER JOIN products ON carts.product_id = products.product_id AND carts.user_id = :userId");
            $cartStatement->bindParam(':userId',$_SESSION['user_id']);
            $cartStatement->execute();
            $items = $cartStatement->fetchall();
            return $items;
        }
     
    }   
?>