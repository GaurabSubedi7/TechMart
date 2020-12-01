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

        public static function storeCart($username,$productId)
        {
            $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
            $st_uid->bindParam(':username',$username);
            $st_uid->execute();
            $userId = $st_uid->fetch();
             $st = self::$pdo->prepare("insert into carts (product_id, user_id) values(:pid,:uid)");
             $st->bindParam(':pid',$productId);
            $st->bindParam(':uid',$userId['user_id']);
             $st->execute();
             header("Location: http://localhost/project5/TechMart/list_products", TRUE, 301);
        }

        public static function GetCartItem()
        {
            
            $cartStatement = self::$pdo->prepare("SELECT * FROM carts INNER JOIN products ON carts.product_id = products.product_id AND carts.user_id = :userId");
            $cartStatement->bindParam(':userId',$_SESSION['user_id']);
            $cartStatement->execute();
            $items = $cartStatement->fetchall();
            return $items;
        }

        public static function removeItem($id)
        {
            $removeStatement = self::$pdo->prepare("delete from carts where product_id = :pid AND user_id = :userId");
            $removeStatement->bindParam(':userId',$_SESSION['user_id']);
            $removeStatement->bindParam(':pid',$id);
            $removeStatement->execute();
        }

        public static function updateItem($id, $qty)
        {
            $removeStatement = self::$pdo->prepare("update carts set item_quantity = :qty where product_id = :pid AND user_id = :userId");
            $removeStatement->bindParam(':userId',$_SESSION['user_id']);
            $removeStatement->bindParam(':pid',$id);
            $removeStatement->bindParam(':qty',$qty);
            $removeStatement->execute();
        }
        
        public static function searchProducts($searchQuery){
            if(!empty($_SESSION['logged_user']))
            {
                $username = $_SESSION['logged_user'];
                $st_uid = self::$pdo->prepare("select user_id from users where username = :username");
                $st_uid->bindParam(':username',$username);
                $st_uid->execute();
                $userId = $st_uid->fetch();
                $_SESSION['user_id']=$userId['user_id'];
                $st = self::$pdo->prepare("select * from products where product_id != ALL(select product_id from carts where user_id = :user_id) and product_name like '%$searchQuery%'");
                $st->bindParam(':user_id',$_SESSION['user_id']);
                // $st->bindParam(':searchQuery',$searchQuery);
                $st->execute();
                $products = $st->fetchall();
                return $products;
            
            }
            else{
                $st = self::$pdo->prepare("select * from products INNER JOIN vendors ON products.vendor_id = vendors.vendor_id where product_name like '%$searchQuery%'");
                // $st->bindParam(':searchQuery',$searchQuery);
                $st->execute();
                $products = $st->fetchall();
                return $products;
            }
        }
    }   
?>