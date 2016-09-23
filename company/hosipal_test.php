<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');

$sql_categories = "select DISTINCT name from categories";


$sql_brands = "select DISTINCT name from brands where name is not null";

$sql_departments = "select DISTINCT name from departments";
$sql_buildings = "select DISTINCT name from buildings";



$categories = getAll($sql_categories);
$brands = getAll($sql_brands);
$departments = getAll($sql_departments);
$buildings = getAll($sql_buildings);


foreach ($brands as $brand) {
    $ab1[$brand['name']] = 1;

}
foreach ($categories as $category)
{
//    $ab1[] = $category['name'];
    $ab1[$category['name']] = 2;
//    file_put_contents('categorys.txt', $category['name'] . PHP_EOL, FILE_APPEND);
}
//print_r($ab1);die;
//file_put_contents('2.txt',  serialize($ab1));


//file_put_contents('1.txt',  serialize($ab2));

foreach ($departments as $department) {

    $ab1[$department['name']] = 3;
}

foreach ($buildings as $building) {
    $ab1[$building['name']] = 4;
}

print_r($ab1);
file_put_contents('all.txt',  serialize($ab1));

function getAll($sql)
{

    $link = new PDO('pgsql:host=10.0.0.233;dbname=dm', 'postgres', 'postgres', array(PDO::ATTR_EMULATE_PREPARES => true));
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res =  $link->query($sql);
    $arr = [];
    while($row = $res->fetch()){
        $arr[] = $row;
    }
    return $arr;
}