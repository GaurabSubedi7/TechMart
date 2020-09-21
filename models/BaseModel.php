<?php 
    class BaseModel
    {
        public static $pdo;
        public function BaseModel()
        {
            $host='localhost';
            $user='root';
            $pass='';   
            $db='techmart';
            try
            {
                $dsn = "mysql:host=$host;dbname=$db";
                self::$pdo = new PDO($dsn,$user,$pass);
            }catch (Exception $e)
            {
                echo $e->getMessage();
                die;
            }
        }
        public function display()
        {
            echo "wassup!!!";
        }
    }
    $obj = new BaseModel;
?>