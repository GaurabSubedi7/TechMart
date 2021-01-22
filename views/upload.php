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
            background: url('../views/public/img/grasshill.jpg');
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

        .modal{
            width: 500px !important;
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
                    <div class="row grey-text text-darken-2">
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
                                    <div class="input-field col s5 offset-m1 offset-l1">
                                        <i class="material-icons prefix">library_add</i>
                                        <input class="white-text" type="number" name="product_quantity" id="product_quantity">
                                        <label for="product_quantity">Quantity</label>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 1vw;">
                                    <div class="file-field input-field col s5">
                                        <div class="btn z-depth-0 grey darken-3">
                                            <span><i class="material-icons">perm_media</i></span>
                                            <input name="product_image" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate white-text" type="text" placeholder="Select Image">
                                        </div>
                                        <span class="red-text text-accent-4" id="username_msg"></span>
                                    </div>
                                    <!-- description modal button -->
                                    <div class="col s5 offset-m1 offset-l1 center addDescription" style="padding-top: 2vw;">
                                        <a class="waves-effect waves-dark btn grey darken-3 modal-trigger" href="#descriptionWindow" id="addDescription">Add Description</a>
                                    </div>
                                    <div class="input-field col s5">
                                        <label>
                                        <input class="white-text" type="hidden" name="test" id="test" value="">
                                        </label>
                                    </div>
                                </div>
                                <div class="col s12 m12 l12 center" style="padding-top: 1vw;">
                                    <input type="submit" class="btn orange darken-4" onclick="M.toast({html: 'Product Added Successfully'})" name="addProduct" value="Add Product">
                                </div>
                            </div>

                            <!-- Description window modal -->
                            <div id="descriptionWindow" class="modal">
                                <div class="modal-content">
                                    <h4 style="padding-bottom:1vw;">Description</h4>
                                    <div class="input-field" id="ram_size_id">
                                       <input type="text" name="ram_size" id="ram_size">
                                       <label for="ram_size">Ram Size</label>
                                    </div>
                                    <div class="input-field" id="screen_size_id">
                                       <input type="text" name="screen_size" id="screen_size">
                                       <label for="screen_size">Screen Size</label>
                                    </div>
                                    <div class="input-field" id="refresh_rate_id">
                                       <input type="text" name="refresh_rate" id="refresh_rate">
                                       <label for="refresh_rate">Refresh Rate</label>
                                    </div>
                                    <div class="input-field" id="resolution_id">
                                       <input type="text" name="resolution" id="resolution">
                                       <label for="resolution">Resolution</label>
                                    </div>
                                    <div class="input-field" id="storage_id">
                                       <input type="text" name="storage" id="storage">
                                       <label for="storage">Storage</label>
                                    </div>
                                    <div class="input-field" id="gpu_id">
                                       <input type="text" name="gpu" id="gpu">
                                       <label for="gpu">GPU</label>
                                    </div>
                                    <div class="input-field" id="cpu_id">
                                       <input type="text" name="cpu" id="cpu">
                                       <label for="cpu">CPU</label>
                                    </div>
                                    <div class="input-field" id="dpi_id">
                                       <input type="text" name="dpi" id="dpi">
                                       <label for="dpi">DPI</label>
                                    </div>
                                    <div class="input-field" id="programmable_button_id">
                                       <input type="text" name="programmable_button" id="programmable_button">
                                       <label for="programmable_button">Programmable Button</label>
                                    </div>
                                    <div class="input-field" id="battery_power_id">
                                       <input type="text" name="battery_power" id="battery_power">
                                       <label for="battery_power">Battery Power</label>
                                    </div>
                                    <div id="wireless_id">
                                       <span>Wireless?</span><br>
                                       <label>
                                            <input class="with-gap" type="radio" name="wireless" value="true">
                                            <span>Yes</span>
                                       </label><br>
                                       <label>
                                            <input class="with-gap" type="radio" name="wireless" value="false">
                                            <span>No</span>
                                       </label>
                                    </div>
                                    <div id="touchscreen_id">
                                       <span>TouchScreen?</span><br>
                                       <label>
                                            <input class="with-gap" type="radio" name="touchscreen" value="true">
                                            <span>Yes</span>
                                       </label><br>
                                       <label>
                                            <input class="with-gap" type="radio" name="touchscreen" value="false">
                                            <span>No</span>
                                       </label>
                                    </div>
                                    <div class="input-field">
                                       <input type="text" name="other" id="other">
                                       <label for="other">Description</label>
                                    </div>

                                    <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Done</a>
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
    $('.modal').modal();
    $('textarea#textarea1').characterCounter();
  });

    $('select').on('change',function(){ 
        document.getElementById('test').value = $(this).val();
    });

    $('.addDescription').on('click',function(){
        var category_id = document.getElementById('test').value;
        if(category_id == 1){
            $("#ram_size_id").show();
            $("#screen_size_id").show();
            $("#refresh_rate_id").show();
            $("#resolution_id").show();
            $("#storage_id").show();
            $("#gpu_id").show();
            $("#cpu_id").show();
            $("#battery_power_id").show();
            $("#touchscreen_id").show();
            $("#dpi_id").hide();
            $("#programmable_button_id").hide();
            $("#wireless_id").hide();
        }else if(category_id == 2){
            $("#ram_size_id").hide();
            $("#screen_size_id").hide();
            $("#refresh_rate_id").hide();
            $("#resolution_id").hide();
            $("#storage_id").hide();
            $("#gpu_id").hide();
            $("#cpu_id").hide();
            $("#battery_power_id").hide();
            $("#touchscreen_id").hide();
            $("#dpi_id").show();
            $("#programmable_button_id").show();
            $("#wireless_id").show();
        }else if(category_id == 3){
            $("#ram_size_id").hide();
            $("#screen_size_id").show();
            $("#refresh_rate_id").show();
            $("#resolution_id").show();
            $("#storage_id").hide();
            $("#gpu_id").hide();
            $("#cpu_id").hide();
            $("#battery_power_id").hide();
            $("#touchscreen_id").show();
            $("#dpi_id").hide();
            $("#programmable_button_id").hide();
            $("#wireless_id").hide();
        }else{
            $("#ram_size_id").hide();
            $("#screen_size_id").hide();
            $("#refresh_rate_id").hide();
            $("#resolution_id").hide();
            $("#storage_id").hide();
            $("#gpu_id").hide();
            $("#cpu_id").hide();
            $("#battery_power_id").hide();
            $("#touchscreen_id").hide();
            $("#dpi_id").hide();
            $("#programmable_button_id").hide();
            $("#wireless_id").hide();
        }
    });
</script>
</html>