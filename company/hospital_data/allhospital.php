<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
require './allfloor.php';
$sql_categories = "select DISTINCT name from categories";


$sql_brands = "select DISTINCT name from brands where name is not null";

$sql_departments = "select DISTINCT name from departments";
$sql_buildings = "select DISTINCT name from buildings";



$categories = getAll($sql_categories);
$brands = getAll($sql_brands);
$departments = getAll($sql_departments);
$buildings = getAll($sql_buildings);

$all_data = [];
$i = 0;
foreach ($brands as $brand) {
    $all_data[$i]['name'] = $brand['name'];
    $all_data[$i]['type'] = 1;
    $all_data[$i]['extra'] = null;
    $i++;
}
foreach ($categories as $category)
{

    $all_data[$i]['name'] = $category['name'];
    $all_data[$i]['type'] = 2;
    $all_data[$i]['extra'] = '';
    $i++;

}

foreach ($departments as $department) {

    $all_data[$i]['name'] = $department['name'];
    $all_data[$i]['type'] = 3;
    $all_data[$i]['extra'] = '';
    $i++;
}

foreach ($buildings as $building) {
    $all_data[$i]['name'] = $building['name'];
    $all_data[$i]['type'] = 4;
    foreach ($floors as $floor) {
        if ($building['name'] == $floor['name'])
        {
            $all_data[$i]['extra'] = $floor['extra'];
        }
    }
    $i++;
}

print_r($all_data);
die;
file_put_contents('alldict.txt',  serialize($all_data));

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