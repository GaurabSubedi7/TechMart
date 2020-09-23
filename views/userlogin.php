<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./views/public/css/vendorstyle.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Seller Login</title>
    <style>
        .tabs .indicator{
        background-color: #000;
        }
        .tabs .tab a:focus, .tabs .tab a:focus.active{
        background: transparent;
        }
        .input-field .prefix{
            border-bottom: none;
        }
        .input-field label{
            border-bottom: none;
        }
    </style>
</head>
<body class="sellerpage">
    <div class="container section">
        <!-- main registration page -->

        <!-- part 1 -->
        <div class="row section">
            <div class="col s12 l5">
                <a href="/techmart"><img src="./views/public/img/logo-techmart.png" alt="" class="responsive-img"></a>
                <div class="card">
                    <div class="card-content grey darken-4 z-depth-4">
                        <span class="card-title center-align grey-text text-lighten-1"><h3>WELCOME TO SELLER CENTER</h3></span>
                        <h5 class="center-align orange-text text-darken-2"><br>3 Simple Steps To Sell On TechMart<br></h5>
                        <i class="section material-icons left grey-text text-lighten-1">looks_one</i>
                        <h6 class="section grey-text text-lighten-1">Sign Up</h6>
                        <i class="section material-icons left grey-text text-lighten-1">looks_two</i>
                        <h6 class="section grey-text text-lighten-1">Upload product to start selling </h6>
                        <i class="section material-icons left grey-text text-lighten-1">looks_3</i>
                        <h6 class="section grey-text text-lighten-1">Adopt tools to maximize sales</h6>
                    </div>
                </div>
            </div>

            <!-- part 2-1 -->

            <div class="col s12 l6 offset-l1">
            <ul class="tabs">
                <li class="tab col s6">
                    <a href="#seller_login" class="grey-text text-darken-4">Login</a>
                </li>
                <li class="tab col s6">
                    <a href="#seller_signup" class="grey-text text-darken-4">Sign Up</a>
                </li>
            </ul>

            <!-- part 2-2 -->

            <div class="col s12" id="seller_login">
                <form action="">
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">Username/Email</label>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-key prefix"></i>
                        <input type="password" id="password" name="password"></input>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field center">
                        <button class="btn">Submit</button>
                    </div>
                </form>
            </div>

            <!-- part 2-3 -->

            <div class="col s12" id="seller_signup">
            <form action="">
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">First Name</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">Last Name</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">Username</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">Phone No.</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="email" id="email" name="name">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="name">
                        <label for="email">Address</label>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-key prefix"></i>
                        <input type="password" id="password" name="password"></input>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-reload prefix"></i>
                        <input type="password" id="password" name="password"></input>
                        <label for="password">Confirm Password</label>
                    </div>
                    <div class="input-field center">
                        <button class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- custom javascript -->
    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });
    </script>

</body>
</html>