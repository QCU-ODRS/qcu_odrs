<?php
//registrar landing page

include_once "../../resource/opt/header.php";
include_once "../../resource/opt/dashnav.php";

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
    <title>Document</title>
</head>
    <body>
        <?php
            require("../../resource/opt/tab_filter.php");
        ?>
        <hr>
        <?php
            require("../../resource/opt/pendinglist_table.php");
        ?>
    </body>
</html>