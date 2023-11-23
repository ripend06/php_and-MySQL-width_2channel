<?php
include_once("../detabase/connect.php"); //データベース接続

// include("./app/functions/comment_add.php"); //コメントを追加する関数
// include("./app/functions/comment_get.php"); //コメントを取得する関数

include("../functions/thread_add.php"); //スレッド追加関数を読み込み

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規スレッド作成ページ</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <!-- header読み込み-->
    <?php include("../../app/parts/header.php") ?>
    <!-- バリデーション処理ファイル読み込み -->
    <?php include("../parts/validation.php") ?>

    <div>
        <h2>新規スレッド立ち上げ場</h2>
    </div>
    <form method="POST" class="formWapper">
        <div>
            <label>スレッド</label>
            <input type="text" name="title">
            <label>名前</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="body" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="立ち上げ" name="threadSubmitButton">
    </form>

</body>
</html>