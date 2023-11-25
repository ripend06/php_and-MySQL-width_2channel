<?php
$error_message = array(); //連想配列で用意。名前とかテキストとか色々入るので

//INSERT
if(isset($_POST["submitButton"])) { //リロードでエラー回避　isssetで値が入っていたらって処理

    //　押されたときに、空かどうかチェクなのでボタン押下後のここに記述
    //お名前入力チェック
    if(empty($_POST["username"])) { //usernameの入力欄が空だった場合の処理
        $error_message["username"] = "お名前を入力してください。"; //空だったら、連想配列に、「お名前を入力してください。」を格納
    } else { //usernameの入力欄が空じゃない場合の処理
        //エスケープ処理
        // htmlspecialchars(【変換したい文字列】, 【ルール】, 【文字コード】);
        $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "utf-8"); //htmlspecialcharsを使用でエスケープ処理
    }

    //コメント入力チェック
    if(empty($_POST["body"])) {
        $error_message["body"] = "コメントを入力してください。";
    } else {
        //エスケープ処理
        $escaped["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "utf-8");
    }

    //エラメッセージが無かったら以下処理を実行
    if(empty($error_message)) {

        $post_date = date("Y-m-d H:i:s"); //date関数で日時を取得

        //トランザクション開始
        $pdo->beginTransaction();

        try {
            //INSERT流れ
            //①prepareを実行
            //②bindValue、bindParamを実行
            //③executeを実行
            //INSERT INTO テーブル名 VALUES (値1, 値2,...);
            $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`)
            VALUES (:username, :body, :post_date, :thread_id);"; //:とは？　名前付きプレースホルダーというもの。プレースホルダー記述でも可。
            $statement = $pdo->prepare($sql);
        
            //値をセットする
            //bindParam使い方
            //第一引数には、パラメータID
            //第二引数には、バインドする変数
            //第三引数は、オプションで、バインドする値に対して明示的にデータ型を指定
            $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR); //bindParam関数で値をセットする。　PDO::PARAM_STRは文字列指定って意味
            $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
            $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $statement->bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);
        
            $statement->execute();

            $pdo->commit(); //正常にできたOKの記述
        } catch (Exception $error) { //エラーを $error変数で保持
            $pdo->rollBacck(); //最初に戻す
        }

        
    }

}

?>