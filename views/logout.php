<?php
 unset($_SESSION["logged_user"]);
 header("Location: http://localhost/TechMart/", TRUE, 301);
?>