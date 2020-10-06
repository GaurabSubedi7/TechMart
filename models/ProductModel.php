<?php
    class ProductModel extends BaseModel
    {
        public static function listProducts()
        {
            $st = self::$pdo->prepare("select * from products INNER JOIN vendors ON products.vendor_id = vendors.vendor_id");
            $st->execute();
            $products = $st->fetchall();
            return $products;
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
     
    }   
?>