<?php
$error_message = array();

//INSERT
if(isset($_POST["threadSubmitButton"])) { //リロードでエラー回避　isssetで値が入っていたらって処理

    //スレッド名入力チェック
    if(empty($_POST["title"])) {
        $error_message["title"] = "スレッドを入力してください。";
    } else {
        //エスケープ処理
        $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "utf-8");
    }

    //お名前入力チェック
    if(empty($_POST["username"])) {
        $error_message["username"] = "お名前を入力してください。";
    } else {
        //エスケープ処理
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "utf-8");
    }

    //コメント入力チェック
    if(empty($_POST["body"])) {
        $error_message["body"] = "コメントを入力してください。";
    } else {
        //エスケープ処理
        $escaped["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "utf-8");
    }

    //エラメッセージが無かったら実行
    if(empty($error_message)) {

        $post_date = date("Y-m-d H:i:s"); //date関数で日時を取得
    
        //スレッドを追加
        $sql = "INSERT INTO `thread` (`title`) VALUES (:title);"; //:とは？
        $statement = $pdo->prepare($sql);
    
        //値をセットする
        $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR); //bindParam関数で値をセットする。　PDO::PARAM_STRは文字列指定って意味
    
        $statement->execute();
        

        //コメントを追加
        // thread_id はどこのコメントに投稿してるかのIDを指定する必要がある
        //　:title　は、スレッドフォームのtitle
        //  title は、$sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
        // :titleとtitleが等しければ、そのIDをとってくる

        // 流れ
        // ０　スレッドが最初に存在してて、
        //　①:titleとtitleが一緒ならば、そのスレッドのIDを取得してくる
        //　② ①のIDをコメントのthread_idに入れてあげる
        $sql = "INSERT INTO comment (username, body, post_date, thread_id)
        VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))";
        $statement = $pdo->prepare($sql);

        //値をセットする
        $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
        $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
        $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
        $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR); //:titleは５２行目の:title

        $statement->execute();
    }

    //掲示板ページにリダイレクト
    header("location: http://localhost/_workspace/PHP-Project/php_and-MySQL-width_2channel/");

}

?>