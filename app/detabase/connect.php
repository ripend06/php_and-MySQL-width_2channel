<?php

$user = "root";
$pass = "root";

//DBと接続
try { //trycatch文で接続できたか調べる
    $pdo = new PDO("mysql:host=localhost;dbname=2chan-bbs", $user, $pass);
    //echo "DBとの接続できました";
} catch (PDOException $error){
    echo $error->getMessage();
}

