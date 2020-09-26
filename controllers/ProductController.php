<?php 
    class ProductController extends BaseController
    {
        public static function showItem($route)
        {
            $products = ProductModel::listProducts();
            $data = ['products'=>$products];
            self::createView($route, $data);
        }
        public static function searchItem($search_query)
        {
            if (isset($search_query['query'])) {
                $result = ProductModel::getProduct($search_query['query']);
               // var_dump($result);
             $data = ['products'=>$result];
                self::createView('list_products', $data);
             
            }
        }
    }
?>