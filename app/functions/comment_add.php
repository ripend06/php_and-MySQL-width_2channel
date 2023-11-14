<?php
$error_message = array();

//INSERT
if(isset($_POST["submitButton"])) { //リロードでエラー回避　isssetで値が入っていたらって処理

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
    
        $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, :body, :post_date);"; //:とは？
        $statement = $pdo->prepare($sql);
    
        //値をセットする
        $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR); //bindParam関数で値をセットする。　PDO::PARAM_STRは文字列指定って意味
        $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
        $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
    
        $statement->execute();
        
    }

}

?>