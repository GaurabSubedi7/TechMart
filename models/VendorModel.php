<?php
    class VendorModel extends BaseModel
    {
        public static function listVendors()
        {
            $st = self::$pdo->prepare("select * from vendors");
            $st->execute();
            $vendors = $st->fetchall();
            return $vendors;
        }

        public static function checkVendor($vendor_name)
        {
            $st = self::$pdo->prepare("select * from vendors where vendor_name:vendor");
            $st->bindParam(":vendor",$vendor_name);
            $st->execute();
            $vendors = $st->fetchall();
            if($vendors)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }

        public static function vendorLogin($vendor_name,$password)
        {
            $st = self::$pdo->prepare("select * from vendors where vendor_name=:vendor and password=:pass");
            $st->bindParam(":vendor",$vendor_name);
            $st->bindParam(":pass",$password);
            $st->execute();
            $vendor_Detail = $st->fetch();
            if($vendor_Detail){
                 return $vendor_Detail;
            }
           
        }

        public static function addVendor($data)
        {
            $st = self::$pdo->prepare("insert into vendors (vendor_name,email,phone_number,status,password,address) values(:vendor_name,:email,:number,1,:password,:address)");
           
           $st->bindParam(":vendor_name",$data['vendor_name']);
           $st->bindParam(":email",$data['email']);
           $st->bindParam(":number",$data['phone_number']);
           $st->bindParam(":password",$data['password']);
           $st->bindParam(":address",$data['address']);
           $st->execute();
           return 1;
        }

    }   
?>