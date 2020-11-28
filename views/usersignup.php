<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./views/public/css/usersignup_style.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>userlogin</title>
</head>
<body class="signuppage">
    <div class="container">
        <div class="row">
            <div class="col s12 l3">
                <a href="/project5/TechMart"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img"></a>
            </div>
            <div class="col s12 l12">
                <h3 class="white-text center-align"><b>Sign Up</b></h3>
            </div>
            <div class="col s12 m10 l10 offset-m1 offset-l1">
                <div class="container my-container">
                    <form action="" method="post" autocomplete="off">
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">face</i>
                                <input type="text" name="first_name" id="first_name">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" name="last_name" id="last_name">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" name="username" id="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-phone prefix"></i>
                            <input type="text" name="phone_number" id="phone_number">
                            <label for="phone_number">Phone Number</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="text" name="email" id="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" name="address" id="address">
                            <label for="address">Address</label>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-key prefix"></i>
                            <input type="password" name="password" id="password"></input>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-kefy prefix"></i>
                            <input type="password" id="confirmpassword"></input>
                            <label for="confirmpassword">Confirm Password</label>
                        </div>
                        <div class="input-field center">
                            <input type="submit" class="btn center" name="usersignup" value="Sign Up">
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

</body>
</html>