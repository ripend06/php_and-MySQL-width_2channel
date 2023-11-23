<?php
//SQLでデータ取得
$comment_array = array(); //array()で連想配列を格納できる変数を用意。$comment_array変数の中に、実行した状態を保存するために、必要な変数。

//コメントデータをデーブルから取得してくる
//SELECT流れ
//①prepareを実行
//②bindValue、bindParamを実行（※今回は使用していない）
//③executeを実行
$sql = "SELECT * FROM comment"; //*は全部のカラムを取得する。commentはテーブル名。SELECTを$sqlに入れる
$statement = $pdo->prepare($sql); //prepareメソッドを使用する。SELECTに必要な工程のもの。pdoの中の、preareメソッドを実行。引数にSELECTを入れた$sqlを入れてpreareメソッドを実行。
$statement->execute(); //pdoの中の、execute関数を実行する。executeは実装するって意味

$comment_array = $statement; //$comment_array変数の中に、実行した状態を保存する。$statementはこの行では、実行後の状態

//デバッグ　SELECTでとってきた中身みたい
//var_dump($comment_array->fetchAll()); //fetchObject()で中身見れる　　アロー演算子でfetchAll()にアクセスする

?>