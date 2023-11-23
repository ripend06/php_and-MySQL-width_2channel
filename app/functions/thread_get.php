<?php
//SQLでデータ取得
$thread_array = array(); //array()でthreadを連想配列を格納できる変数を用意

//コメントデータをデーブルから取得してくる
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql); //prepare関数
$statement->execute(); //executeは実装するって意味

$thread_array = $statement;

//var_dump($thread_array->fetchAll()); //fetchObject()で中身見れる

//DB接続を切る 不要に
// $pdo = null;
// $statement = null;
?>