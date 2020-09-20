<?php 
    class ProductController extends BaseController
    {
        public static function showItem($route)
        {
            $products = ProductModel::listProducts();
            $data = ['products'=>$products];
            self::createView($route, $data);
        }
    }
?>