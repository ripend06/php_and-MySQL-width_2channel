<?php

include_once("./app/detabase/connect.php");

//INSERT
if(isset($_POST["submitButton"])) { //リロードでエラー回避　isssetで値が入っていたらって処理

    $post_date = date("Y-m-d H:i:s"); //date関数で日時を取得

    $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, :body, :post_date);";
    $statement = $pdo->prepare($sql);

    //値をセットする
    $statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR); //bindParam関数で値をセットする。　PDO::PARAM_STRは文字列指定って意味
    $statement->bindParam(":body", $_POST["body"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);

    $statement->execute();
}


//SQLでデータ取得
$comment_array = array(); //array()で連想配列を格納できる変数を用意

//コメントデータをデーブルから取得してくる
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql); //prepare関数
$statement->execute(); //executeは実装するって意味

$comment_array = $statement;

//var_dump($comment_array->fetchAll()); //fetchObject()で中身見れる



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
    <header>
        <h1 class="title">2ちゃんねる掲示板</h1>
        <hr>
    </header>


    <div class="threadWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【タイトル】</span>
                <h1>2ちゃんねる掲示板を作ってみた</h1>
            </div>
            <section>
                <?php foreach($comment_array as $comment) :?>
                <article>
                    <div class="wrapper">
                        <div class="nameArea">
                            <span>名前：</span>
                            <p class="username"><?php echo $comment["username"] ?></p>
                            <time>:<?php echo $comment["post_date"] ?></time>
                        </div>
                        <p class="comment"><?php echo $comment["body"] ?></p>
                    </div>
                </article>
                <?php endforeach ?>
            </section>
            <form class="formWrapper" method="POST">
                <div>
                    <input type="submit" name="submitButton" value="書き込む">
                    <label>名前：</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <textarea name="body" class="commentTextArea"></textarea>
                </div>
            </form>
        </div>
    </div>
</body>
</html>