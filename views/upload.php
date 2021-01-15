<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Product</title>
    <link rel="stylesheet" type="text/css" href="../views/public/css/style.css">
    <?php include 'partials/Elinks.php'; ?>
    <style>
        .productupload{
            background: url('../views/public/img/street.jpg');
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(9px);
            min-height: 692px;
        }

        .mycontainer{
            background: rgb(0, 0, 0, .6);
            margin-top: 5%;
            padding: 1vw 6vw 1vw 5vw;
            border-radius: 15px;
        }

        .character-count{
            color: white !important;
        }

        .textareapart span{
            color: white;
        }

        .select-dropdown{
            color: white !important;
        }
    </style>
</head>
<body class="productupload">
    <nav class="nav-wrapper grey darken-4">
        <!-- logo -->
        <a href="/project5/TechMart" class="brand-logo hide-on-med-and-down"><img src="../views/public/img/logo-techmart.png" alt="logo" class="responsive-img logo"></a>
        <div class="container">         
            <ul class="right">
                <!-- logo for mobile -->
                <li>
                    <a href="/project5/TechMart" class="brand-logo left hide-on-large-only"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img" style="height:50px;width:150px;"></a>
                </li>
                <!-- searchbar -->
                <li class="search-icon" id="search-icon">
                    <nav class="z-depth-0 grey transparent">
                        <div class="nav-wrapper">
                            <form action="/project5/TechMart/list_products" method="get">
                                <div class="input-field " id="searchbar">
                                <input type="hidden" name="categories" value="0">
                                <input type="hidden" name="min_price" value="0" id="">
                                <input type="hidden" name="max_price" value="4000000" id="">
                                    <input class="white-text transparent" id="search" name="searchKeyword" autocomplete="off" type="search" placeholder="Search" required>
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                </div>
                            </form>
                        </div>
                    </nav>
                </li>
            </ul>
        </div>
    </nav>
    <!-- product upload form -->
    <div class="container">
        <div class="row">
            <div class="col s12 m11 l11 offset-m1 offset-l1 section">
                <div class="mycontainer z-depth-4">
                    <div class="row">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col s12 m12 l12">
                                <h5 class="white-text center"><b>Upload Product</b></h5>
                            </div>
                            <input type = "hidden" name="vendor_id" value="<?php echo $vendor_id['vendor_id'] ?>">
                            <div class="col s12 m12 l12">
                                <div class="row" style="padding-top: 1vw;">
                                    <div class="input-field col s5">
                                        <i class="material-icons prefix">devices</i>
                                        <input class="white-text" type="text" name="product_name" id="product_name">
                                        <label for="product_name">Product Name</label>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                    <div class="input-field col s5 offset-m1 offset-l1">
                                        <i class="material-icons prefix">category</i>
                                        <select name="categories">
                                            <option value="" disabled selected>Select Category</option>
                                            <?php 
                                                foreach($categoriesItem as $category) {?>
                                                <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 1vw;">
                                    <div class="input-field col s5">
                                        <i class="material-icons prefix">local_offer</i>
                                        <input class="white-text" type="text" name="product_price" id="product_price">
                                        <label for="product_price">Price</label>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                    <div class="textareapart input-field col s5 offset-m1 offset-l1">
                                        <i class="material-icons prefix">description</i>
                                        <textarea name="product_description" id="textarea1" class="white-text materialize-textarea" data-length="250"></textarea>
                                        <label for="textarea1">Product Description</label>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 1vw;">
                                    <div class="file-field input-field col s5">
                                        <div class="btn z-depth-0">
                                            <span><i class="material-icons">perm_media</i></span>
                                            <input name="product_image" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate white-text" type="text">
                                        </div>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                    <div class="input-field col s5 offset-m1 offset-l1">
                                        <i class="material-icons prefix">library_add</i>
                                        <input class="white-text" type="number" name="product_quantity" id="product_quantity">
                                        <label for="product_quantity">Quantity</label>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                </div>
                                <div class="col s12 m12 l12 center" style="padding-top: 1vw;">
                                    <input type="submit" class="btn teal darken-4" onclick="M.toast({html: 'Product Added Successfully'})" name="addProduct" value="Add Product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
    $('select').formSelect();
    $('textarea#textarea1').characterCounter();
  });
</script>
</html>