<?php
include 'Pgsql.php';

$dsn ='pgsql:host=10.0.0.250;dbname=dm';
$user='postgres';
$password='postgres';
try{

    $pdo=new PDO($dsn,$user,$password);

} catch (PDOException $e) {

    echo "error:" . $e->getMessage();
};


//class exported extends Pgsql{
//
//
//
//    public  function  export($hospital){
//        header("Content-type:text/html;charset=utf-8");
//        header("Content-type:application/vnd.ms-excel");
//        header("content-Disposition:filename=downloaded.csv");
//
//        $id=$this->getAll("select id from hospitals where \"name\"='$hospital'");
//
//        $total=$this->getAll("SELECT
//	categories.name as c_name,
//    brands.name as b_name
//FROM
//	equipments
//LEFT JOIN categories ON categories. ID = equipments.category_id
//left join brands on brands.id= categories.brand_id
//where equipments.hospital_id={$id[0]['id']} order by categories.name asc " );
//
//        $brand=[];
//        $array=[];
//        foreach ($total as $key =>$value){
//            ;
//            $brand[]= str_replace(',', '', $value['b_name']);
//            $array[$value['b_name']][]=$value['c_name'];
//
//        }
//
//        $brand_unique= array_unique($brand);
//
//        foreach ($array as &$index){
//            $index=array_values(array_unique($index));
//
//        }
//        $a=implode(",",$brand_unique );
//        $rows=[];
//        $count = 0;
//        foreach ( $array as $value){
//            if(count($value)>$count){
//                $count=count($value);
//            }
//        }
//
//        for($j=0;$j<$count;$j++){
//            foreach ($array as $item){
//                if(empty($item[$j])){
//                    $item[$j]="";
//                }
//                $rows[$j][]=$item[$j];
//            }
//
//        }
//        unset($array[""]);
//             echo iconv("UTF-8", "GBK//TRANSLIT//IGNORE", $a)."\n";
//            foreach ($rows as $index) {
//            $o = implode(",", $index);
//            echo iconv("UTF-8", "GBK//TRANSLIT//IGNORE", $o) . "\n";
//
//
//        }
//    }
//
//
//
//
//
//
//
//
//
//}
//$export= new exported($db['dsn'],$db['user'],$db['password'] );

//$export->export('四川省人民医院');


$data = $pdo->query("SELECT
        equipments.code,
         equipments.erp_code,
         brands.name as b_name,
          categories.name as c_name,
         qc_types.type as qc_name ,
         equipments.model_number,
         departments.name as dep_name ,
        buildings.name as build_name ,
        floors.name as flr_name ,
        users.name as username,
        equipments.created_at,
       equipments.address
FROM
	equipments
LEFT JOIN departments ON departments. ID = equipments.department_id
left join  categories on categories.id = equipments.category_id
left join qc_types on qc_types.id = categories.qc_type_id
left join hospitals on hospitals.id = equipments.hospital_id
left join buildings on buildings.hospital_id = hospitals.id
left join floors on floors.building_id = buildings.id
left join users on users.id = equipments.user_id
left join brands on brands.id = categories.brand_id
 where equipments.hospital_id = 1  ")->fetchAll(PDO::FETCH_ASSOC);

print_r($data);