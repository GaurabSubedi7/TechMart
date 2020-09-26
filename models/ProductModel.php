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
    }   
?>