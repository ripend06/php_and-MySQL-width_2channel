<?php
//SQLでデータ取得
$comment_array = array(); //array()で連想配列を格納できる変数を用意

//コメントデータをデーブルから取得してくる
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql); //prepare関数
$statement->execute(); //executeは実装するって意味

$comment_array = $statement;

//var_dump($comment_array->fetchAll()); //fetchObject()で中身見れる

?>