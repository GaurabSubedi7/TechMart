<?php 
    class ProductController extends BaseController
    {
        public static function showItem($data,$route)
        {
            if(!isset($data['searchKeyword'])){
                // for cart count
                $cartItem = ProductModel::GetCartItem();
                $cartdata = ['cartItem'=>$cartItem];

                $categoriesItem = ProductModel::GetCategories();
                $categoriesData = ['categoriesItem'=>$categoriesItem];
                //==============
                $products = ProductModel::listProducts();
                $data = ['products'=>$products];
                self::createView($route, $data, $cartdata,$categoriesData);
            }
        }

        public static function addCart($dataGet)
        {
            //var_dump($dataGet);

            if(array_key_exists('action',$dataGet) && $dataGet['action']=='add' )
            {
               $_SESSION['shopping_cart'][] = $dataGet['id'];
               ProductModel::storeCart($_SESSION['logged_user'],$dataGet['id']);
            }
            
        }

        public static function listCartItem($route)
        {
            if(!empty($_SESSION['logged_user']))
            {
                $cartItem = ProductModel::GetCartItem();
                $data = ['cartItem'=>$cartItem];
                self::createView($route, $data);
            }   
            else{
                //redirect to login page for being hero madafaka
            } 
        }

        public static function showProduct($route)
        {
            self::createView($route);
        }

        public static function RemoveCartItem($data, $route)
        {
          if(isset($data['action'])){
            if($data['action']=='remove' && !empty($data['id']) && !empty($_SESSION['logged_user']))
            {
                ProductModel::removeItem($data['id']);
                header("Location: http://localhost/project5/TechMart/list_products/cart", TRUE, 301);
            }
          }
        }

        public static function updateCartItem($data, $btnname)
        {
          if(isset($data['action']) && isset($_POST[$btnname])){
                if($data['action']=='update' && !empty($data['id']) && !empty($_SESSION['logged_user']))
                {
                    ProductModel::updateItem($data['id'],$_POST['quantity']);
                    header("Location: http://localhost/project5/TechMart/list_products/cart", TRUE, 301);
                }
            }
        }

        public static function searchItems($get,$route){
            if(isset($get['searchKeyword'])){
                // for cart count
                $cartItem = ProductModel::GetCartItem();
                $cartdata = ['cartItem'=>$cartItem];

                $categoriesItem = ProductModel::GetCategories();
                $categoriesData = ['categoriesItem'=>$categoriesItem];
                //==============
                $products = ProductModel::searchProducts($get['searchKeyword'],$get['categories'],$get['max_price'],$get['min_price']);
                $data = ['filteredProducts'=>$products];
                self::createView($route, $data, $cartdata,$categoriesData);
            }
        }
        public static function showUserAvatar($route)
        {
            if(!empty($_SESSION['logged_user']))
            {
                $cartItem = ProductModel::GetCartItem();
                $data = ['cartItem'=>$cartItem];
                self::createView($route, $data);
            }
        }
    }
?>