<?php 
    class ComparisionController extends BaseController{


        public static function compareView($route)
        {//==============
            $products = ComparisionModel::listProducts($_SESSION['category_id']);
            $data = ['products'=>$products];
            self::createView($route, $data);
        }

        public static function compareData($value,$btnName)
        {
            if(isset($_POST[$btnName]) && empty($value['lang']['3'])){
               // var_dump($value);
           $categoryIndex = $_SESSION['category_id'];
          
            $product1 = ComparisionModel::dataExtract($value['lang']['0'], $categoryIndex);
            $product2 = ComparisionModel::dataExtract($value['lang']['1'], $categoryIndex);
           // var_dump($product2);
    
            $_SESSION['compare_product1'] = $product1;
            $_SESSION['compare_product2'] = $product2;
            $_SESSION['product1_name'] = ComparisionModel::getName($value['lang']['0']);
            $_SESSION['product2_name'] = ComparisionModel::getName($value['lang']['1']);
            header("Location: http://localhost/project5/TechMart/list_products/compare", TRUE, 301);
            }
            else{
                $_SESSION['compare_product1'] = NULL;
                $_SESSION['compare_product2'] = NULL;
            }
           
        }
       
    
       

    }
    ?>