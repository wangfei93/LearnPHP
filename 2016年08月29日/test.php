<?php


$link = new PDO("pgsql:host=localhost;dbname=test","postgres",'123') or die('链接数据库失败');
$sql = "
select * from customers
";

$res =  $link->query($sql);
$arr = [];
while($row = $res->fetch()){
    $arr[] = $row;
}
print_r($arr);
echo 'via邻居发觉日ug比较好吧vhvbhn你今年vurhu';

?>