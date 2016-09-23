<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
require 'floor.php';
function gethospital($slug)
{
    $hospital = [];
    $sql = "select id from hospitals where slug = '$slug'";
    $res = getAll($sql);
    if ($res) {
        foreach ($res as $row)
        {
            $id = $row['id'];
        }
        $notData = [2,3,5,20,23,24];
        if (in_array($id, $notData)) {
            return '';
        }
        $k = 0;
        if($slug == 'AHYE'  || $slug == 'FDZL')
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
            if($brands) {

                foreach ($brands as $brand){

                    $hospital[$k]['name'] = $brand['name'];
                    $hospital[$k]['type'] = 1;
                    $hospital[$k]['extra'] = null;
                    $k++;
                }
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
            if($categories)
                foreach ($categories as $category) {
                    $hospital[$k]['name'] = $category['name'];
                    $hospital[$k]['type'] = 2;
                    $hospital[$k]['extra'] = null;
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
            if($brands) {
                foreach ($brands as $brand){

                    $hospital[$k]['name'] = $brand['name'];
                    $hospital[$k]['type'] = 1;
                    $hospital[$k]['extra'] = null;
                    $k++;
                }
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
        if($categories) {
            foreach ($categories as $category) {

                $hospital[$k]['name'] = $category['name'];
                $hospital[$k]['type'] = 2;
                $hospital[$k]['extra'] = null;
                $k++;
            }
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
        if($departments) {
            foreach ($departments as $department) {

                $hospital[$k]['name'] = $department['name'];
                $hospital[$k]['type'] = 3;
                $hospital[$k]['extra'] = null;
                $k++;


            }
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
        $floors = getFloor($sql);
        echo '<pre>';

        if($buildings) {
            foreach ($buildings as $building) {
                $hospital[$k]['name'] = $building['building_name'];
                $hospital[$k]['type'] = 4;
//            $hospital[$k]['extra'] = null;


                if(!$floors ){
                    $hospital[$k]['extra'] = null;
                } else{
                    foreach ($floors as $floor) {
                        if ($building['building_name'] == $floor['name'])
                        {
                            $hospital[$k]['extra'] = $floor['extra'];
                        }
                    }
                }

                $k++;


            }
    }


    }


    return $hospital;
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
    if($arr){
        return $arr;

    }else {
        return false;
    }

}

//$hospital = gethospital('FYZX');
//echo '<pre>';
//print_r($hospital);


$sql = "select * from hospitals";
$hospital = getAll($sql);
foreach ($hospital as $row)
{
    $slug = $row['slug'];

    $hospital = gethospital($slug);
    if ('' == $hospital || [] == $hospital) {
        continue;
    }
//    print_r($hospital);
    //echo '<pre>';
//print_r($hospital);
    file_put_contents('./dict/' . $slug . '.txt',  serialize($hospital));
}
