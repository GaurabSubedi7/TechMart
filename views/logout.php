<?php
if(!empty($_SESSION["logged_user"])){
    unset($_SESSION["logged_user"]);
    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
}

if(!empty($_SESSION["logged_vendor"])){
    unset($_SESSION["logged_vendor"]);
    header("Location: http://localhost/project5/TechMart/", TRUE, 301);
}
 
?>