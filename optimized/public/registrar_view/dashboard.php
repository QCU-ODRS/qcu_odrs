<?php
//registrar landing page

include_once "../../resource/opt2/header.php";
include_once "../../resource/opt2/nav.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "../../resource/opt/header.php"
    ?>
    <style>
      <?php
        include "../../resource/CssJs/style.css";
      ?>
    </style>
    <title>Dashboard</title>
</head>
    <body style="background-color: #F7F7FF;">
        <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control searchbar" style="position: absolute; left: 40px; top: 175px; width: 1726px; color: #000000; filter: drop-shadow(0px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" placeholder="Search Request List">
            <div class="input-group-append">
            <button class="btn btn-outline-secondary btnsearch" style="position: absolute; top: 175px; margin-left: 1767px; width: 100px; filter: drop-shadow(5px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" type="submit">Search</button>
            </div>
        </div>

        <?php
            include "view.php"
        ?>
    </body>
</html>