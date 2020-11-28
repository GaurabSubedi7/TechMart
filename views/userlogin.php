<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./views/public/css/userlogin_style.css">

    <?php include 'partials/Elinks.php'; ?>
    <title>userlogin</title>
</head>
<body class="loginpage">
    <div class="container">
        <a href="/TechMart"><img src="./views/public/img/logo-techmart.png" alt="logo" class="responsive-img"></a>
        <div class="row">
            <div class="col s12 l12">
                <h3 class="white-text center-align"><b>Login</b></h3>
            </div>
            <div class="col s12 m8 l8 offset-m2 offset-l2">
                <div class="container my-container">
                    <form action="" method="post" autocomptete="off">
                        <div class="input-field">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" name="username" id="username" autocomptete="off">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-key prefix"></i>
                            <input type="password" name="password" id="password"></input>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field center">
                            <input type="submit" class="btn center" name="userlogin" value="Log in">
                        </div>
                    </form>
                    <div class="error"></div>
                </div>
            </div>
            <div class="col s12 l12 center-align section">
                <h6 class="white-text">Don't have an account? <a href="usersignup">Create an account.</a></h6>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
document.getElementById('error').style.display = 'none';

</script>
</body>
</html>