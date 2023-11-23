<?php

$user = "root"; //mysqlのusername
$pass = "root"; //mysqlのpass

//DBと接続
try { //trycatch文で接続できたか調べる
    $pdo = new PDO("mysql:host=localhost;dbname=2chan-bbs", $user, $pass); //host=localhost dbname=2chan-bbs
    //echo "DBとの接続できました";
} catch (PDOException $error){ //PDOException（PDOのエラメッセージ）のクラスを $errorの引数に入れる
    echo $error->getMessage(); //$error クラスの中の、getMessage() メソッドを呼び出す　それをechoで出力する
}