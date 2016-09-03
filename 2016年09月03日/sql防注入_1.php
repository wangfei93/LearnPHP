<?php
header("Content-Type: text/html;charset=utf-8");
$id = 2;
$pdo = new PDO("pgsql:host=localhost;dbname=test","postgres",'123') or die('链接数据库失败');

$stmt = $pdo->prepare('SELECT * FROM categories WHERE id = :id');

$stmt->execute(array('id' => $id));


foreach ($stmt as $row) {
    var_dump($row);

}