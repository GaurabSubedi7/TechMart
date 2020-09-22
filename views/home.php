<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="./views/public/css/style.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>TechMart</title>
</head>
<body>
    <!-- homenavbar -->
    <header>
        <?php include 'partials/homenav.php'; ?>
    </header>

    <!-- photos/grid -->
    <?php include 'partials/photosandgrids.php'; ?>

    <!-- parallax -->
    <div class="parallax-container">
      <div class="parallax">
          <img src="./views/public/img/sunset.jpg" alt="" class="responsive-img">
      </div>
    </div>

    <!-- Our Features -->
    <?php include 'partials/ourfeatures.php'; ?>

    <!-- parallax -->
    <div class="parallax-container">
      <div class="parallax">
          <img src="./views/public/img/stars.jpg" alt="" class="responsive-img">
      </div>
    </div>

    <!-- Get In Touch -->
    <?php include 'partials/getintouch.php'; ?>

    <!-- footer -->
    <?php include 'partials/footer.php'; ?>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./views/public/scripts/home.js"></script>
</body>
</html>