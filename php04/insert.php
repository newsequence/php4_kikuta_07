<?php
//1. POSTデータ取得
$title   = $_POST['title'];
$author  = $_POST['author'];
$publisher = $_POST['publisher'];


//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO book_table(title,author,publisher,date)VALUES(:title,:author,:publisher,sysdate());');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
