<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./views/public/css/vendorsignup_style.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>VendorSignup</title>
    <style>
        .bold{
            font-weight: bold;
        }
    </style>
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
                    <form action="" method="post" autocomplete="off" onsubmit="return validation();">
                        <div class="input-field">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" name="vendor_name" id="vendor_name">
                            <label for="vendor_name">Vendor Name/ Company Name</label>
                            <span class="red-text text-accent-4 bold" id="vendor_msg"></span>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-phone prefix"></i>
                            <input type="text" name="phone_number" id="phone_number">
                            <label for="phone_number">Phone Number</label>
                            <span class="red-text text-accent-4 bold" id="phone_msg"></span>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="text" name="email" id="email">
                            <label for="email">Email</label>
                            <span class="red-text text-accent-4 bold" id="email_msg"></span>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">location_on</i>
                            <input type="text" name="address" id="address">
                            <label for="address">Address</label>
                            <span class="red-text text-accent-4 bold" id="address_msg"></span>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-key prefix"></i>
                            <input type="password" name="password" id="password"></input>
                            <label for="password">Password</label>
                            <span class="red-text text-accent-4 bold" id="password_msg"></span>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-kefy prefix"></i>
                            <input type="password" id="confirmpassword"></input>
                            <label for="confirmpassword">Confirm Password</label>
                            <span class="red-text text-accent-4 bold" id="confirmpassword_msg"></span>
                        </div>
                        <div class="input-field center">
                            <input type="submit" class="btn center" name="vendorsignup" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM VALIDATION -->


    <script type='text/javascript'>
        function validation()
        {
            var ok=0;
            var username = document.getElementById('vendor_name').value;
            var email = document.getElementById('email').value;
            var phone_number = document.getElementById('phone_number').value;
            var password = document.getElementById('password').value;
            var confirmpassword = document.getElementById('confirmpassword').value;
            var address = document.getElementById('address').value;

            var usercheck = /^[a-z]{1}[a-zA-Z0-9.]{2,12}$/gm;
            var emailcheck = /^[a-z._]+([0-9]+)?@[a-z]+.[a-z]{3,5}$/gm;
            var phonecheck = /^[0-9]{10,}$/gm;
            var passwordcheck =  /^(?=.*[0-9])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/gm;

            /* Username validation */ 
            if(usercheck.test(username))
            {
                    document.getElementById('vendor_msg').innerHTML = " ";
            }
            else
            {
                document.getElementById('vendor_msg').innerHTML = "** VendorName Invalid **";
                return false;
            }   

            /* Phonenumber validation */

            if(phonecheck.test(phone_number))
            {
                document.getElementById('phone_msg').innerHTML = " ";
            }
            else
            {
                document.getElementById('phone_msg').innerHTML = "** PhoneNumber Invalid **";
                return false;
            }

            /* Email validation */

            if(emailcheck.test(email))
            {
                document.getElementById('email_msg').innerHTML = " ";
            }
            else
            {
                document.getElementById('email_msg').innerHTML = "** Email Invalid **";
                return false;
            }

            /* Address validation */

            if(address != "")
            {
                document.getElementById('address_msg').innerHTML = " ";
            }
            else
            {
                document.getElementById('address_msg').innerHTML = "** Address Field Empty **";
                return false;
            }

            /* Password validation */

            if(passwordcheck.test(password))
            {
                document.getElementById('password_msg').innerHTML = " ";
                ok = 1;
            }

            else
            {
                document.getElementById('password_msg').innerHTML = "** Please insert atleast one number and an Uppercase letter(8-16) **";
                return false;
            }

            if(password.length >=1 && password.length <8)
            {
                document.getElementById('password_msg').innerHTML = "** Password must be atleast 8 characters **";
                return false;
            }
            
            if(password.length > 16)
            {
                document.getElementById('password_msg').innerHTML = "** Password cannot contain more than 16 characters **";
                return false;
            }

            if(ok == 1 && password == confirmpassword)
            {
                document.getElementById('confirmpassword_msg').innerHTML = " ";
            }
            if(password != confirmpassword)
            {
                document.getElementById('confirmpassword_msg').innerHTML = "** Password Mismatched **";
                return false;
            }
            if(ok == 0)
            {
                document.getElementById('password_msg').innerHTML = "** Password cannot be empty **";
                return false;
            }
        }
    </script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>