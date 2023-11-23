<?php
include_once("./app/detabase/connect.php"); //include_onceで一度だけ読み込む

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <!-- header.phpを読み込む　-->
    <?php include("./app/parts/header.php") ?>

    <!-- validation.phpを読み込む　-->
    <?php include("./app/parts/validation.php") ?>

    <!-- thread.phpを読み込む　-->
    <?php include("./app/parts/thread.php") ?>

    <!-- newThreadButton.phpを読み込む　-->
    <?php include("./app/parts/newThreadButton.php") ?>

</body>
</html>