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
    }   
?>