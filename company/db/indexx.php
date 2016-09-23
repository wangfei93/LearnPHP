<?php
include 'Pgsql.php';
$hospital="四川省人民医院";
$pdo=new  pgsql($db['dsn'],$db['user'],$db['password']);

date_default_timezone_set("PRC");
//header("Content-type:text/html;charset=utf-8");
//header("Content-type:application/vnd.ms-excel");
//header("content-Disposition:filename=$hospital.csv");



$id=$pdo->getAll("select id from hospitals where \"name\"='$hospital'");

$total=$pdo->getAll("SELECT
	categories.name as c_name,
    brands.name as b_name
FROM
	equipments
LEFT JOIN categories ON categories. ID = equipments.category_id
left join brands on brands.id= categories.brand_id
where equipments.hospital_id={$id[0]['id']} order by categories.name asc  limit 300" );

$brand=[];
$array=[];
foreach ($total as $key =>$value){
   ;
    $brand[]= str_replace(',', '', $value['b_name']);
    $array[$value['b_name']][]=$value['c_name'];

}


$brand_unique= array_unique($brand);

foreach ($array as &$index){
    $index=array_values(array_unique($index));

}
$a=implode(",",$brand_unique );
$rows=[];
$count = 0;
foreach ( $array as $value){
    if(count($value)>$count){
        $count=count($value);
    }
}

for($j=0;$j<$count;$j++){
    foreach ($array as $item){
        if(empty($item[$j])){
            $item[$j]="";
        }
     $rows[$j][]=$item[$j];
    }

}
unset($array[""]);
echo iconv("UTF-8", "GBK//TRANSLIT//IGNORE", $a)."\n";
foreach ($rows as $index){
    $o=implode(",",$index );
    echo iconv("UTF-8", "GBK//TRANSLIT//IGNORE", $o)."\n";


}

