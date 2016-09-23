<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
require './floor.php';

function getHospital()
{

}



$sql = "select * from hospitals";
$hospital = getAll($sql);

foreach ($hospital as $hos) {
        $k = 0;

        $arrayname = [];
        $filename = $hos['slug'] . 'dict';
        $id = 1;



        if($id == 9  || $id == 18)
        {

            //品牌
            $sql = "select DISTINCT hospital_brands.name from hospital_brands where hospital_brands.id in
                (
                SELECT
                DISTINCT	hospital_categories.brand_id
                FROM
                    equipments
                left join hospital_categories on equipments.hospital_category_id = hospital_categories.id
                where equipments.hospital_id=$id and hospital_brands.name is not null
                )";
            $brands = getAll($sql);
            foreach ($brands as $brand){

                $arrayname[$k]['name'] = $brand['name'];
                $arrayname[$k]['type'] = 1;
                $arrayname[$k]['extra'] = null;
                $k++;
            }


            //品类
            $sql = "SELECT DISTINCT
                hospital_categories. NAME
            
            FROM
                equipments
            LEFT JOIN hospital_categories ON equipments.hospital_category_id = hospital_categories. ID
            WHERE
                equipments.hospital_id = $id and hospital_categories. NAME is not null
";
            $categories = getAll($sql);

            foreach ($categories as $category) {
                $arrayname[$k]['name'] = $category['name'];
                $arrayname[$k]['type'] = 2;
                $arrayname[$k]['extra'] = null;
                $k++;
            }


        }else{

            //品牌
            $sql = "select DISTINCT brands.name from brands where brands.id in
                (
                SELECT
                DISTINCT	categories.brand_id
                FROM
                    equipments
                left join categories on equipments.category_id = categories.id
                where equipments.hospital_id=$id and brands.name is not null
                )";
            $brands = getAll($sql);
            foreach ($brands as $brand){

                $arrayname[$k]['name'] = $brand['name'];
                $arrayname[$k]['type'] = 1;
                $arrayname[$k]['extra'] = null;
                $k++;
            }


        }


            //品类
            $sql = "SELECT DISTINCT
                categories. NAME
            
            FROM
                equipments
            LEFT JOIN categories ON equipments.category_id = categories. ID
            WHERE
                equipments.hospital_id = $id and categories. NAME is not null
";
            $categories = getAll($sql);


            foreach ($categories as $category) {

                $arrayname[$k]['name'] = $category['name'];
                $arrayname[$k]['type'] = 2;
                $arrayname[$k]['extra'] = null;
                $k++;
            }




        //科室

        $sql = "SELECT DISTINCT
	departments. NAME

FROM
	hospitals
LEFT JOIN departments ON departments.hospital_id = hospitals. ID
WHERE
	hospitals. ID = $id and departments. NAME is not null";

        $departments = getAll($sql);

        foreach ($departments as $department) {

            $arrayname[$k]['name'] = $department['name'];
            $arrayname[$k]['type'] = 3;
            $arrayname[$k]['extra'] = null;
            $k++;


        }







//建筑
        $sql = "SELECT
DISTINCT	buildings.name as building_name
FROM
	buildings
left join floors on floors.building_id = buildings.id

WHERE
	hospital_id = $id and buildings.name is not null

ORDER BY buildings.name  ";
        $buildings = getAll($sql);

        //楼层
        $sql = "SELECT
DISTINCT	buildings.name as building_name, floors.name as floor_name
FROM
	buildings
left join floors on floors.building_id = buildings.id

WHERE
	hospital_id = $id

ORDER BY buildings.name";
//        $floors = getFloor($sql);


        foreach ($buildings as $building) {
            $arrayname[$k]['name'] = $building['building_name'];
            $arrayname[$k]['type'] = 4;
            $arrayname[$k]['extra'] = null;
//            foreach ($floors as $floor) {
//                if ($building['building_name'] == $floor['name'])
//                {
//                    $arrayname[$k]['extra'] = $floor['extra'];
//                }
//            }
            $k++;


        }
    echo '<pre>';
    print_r($arrayname);
//    file_put_contents($filename . '.txt',  serialize($arrayname));
    die;


    }








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