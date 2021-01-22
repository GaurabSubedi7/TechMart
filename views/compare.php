<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .logo{
    height: 200px;
    width: 200px;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body >


<nav class="nav-wrapper bla grey darken-4">
            <!-- logo -->
            <a href="/project5/TechMart" class="brand-logo hide-on-med-and-down"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
            <div class="container">         
                <ul class="right">
                    <!-- logo for mobile -->
                    <li>
                        <a href="/project5/TechMart" class="brand-logo left hide-on-large-only"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img" style="height:50px;width:150px;"></a>
                    </li>
                   <li>
                        <a href="/project5/TechMart/list_products" >Back</a>
                    </li>
                   
                    </ul>
                 
              
  <!-- Modal Trigger -->
  
    </div>
  </nav>


<div class="container ">
<?php
$category_id = $_SESSION['category_id'];
if($category_id == 1)
{
    require 'partials/laptop.php';
}
else if($category_id == 2)
{
    require 'partials/mouse.php';
}
else if($category_id == 3)
{
    require 'partials/monitor.php';
}
else{
    echo "Sorry something went wrong";
}
?>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>