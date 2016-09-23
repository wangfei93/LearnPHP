<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
include_once('./Classes/PHPExcel.php');//包含类文件
include_once('./Classes/PHPExcel/Writer/Excel2007.php');//包含类文件
$objPHPExcel=new PHPExcel();

$sql = "select * from hospitals";
$hospital = getAll($sql);
$length = count($hospital);

for($i=1;$i<=$length;$i++){
    $objPHPExcel->createSheet();
    $objPHPExcel->setactivesheetindex($i-1);
    $sql = "select * from hospitals where id = $i ";
    $hospital = getAll($sql);
    foreach ($hospital as $hos) {
        //医院名字

        $objPHPExcel->getActiveSheet()->setTitle($hos['name']);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', '医院id');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', $hos['id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B1', '医院名称');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', $hos['name']);
        $objPHPExcel->getActiveSheet()->setCellValue('C1', '医院简称');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', $hos['slug']);


        if($i == 9  || $i == 18)
        {
            //品类
            $sql = "SELECT DISTINCT
                hospital_categories. NAME
            
            FROM
                equipments
            LEFT JOIN hospital_categories ON equipments.hospital_category_id = hospital_categories. ID
            WHERE
                equipments.hospital_id = $i
";
            $categories = getAll($sql);
            $j = 2;
//    var_dump($categories);
            $objPHPExcel->getActiveSheet()->setCellValue('D1', '品类');
            foreach ($categories as $category) {



                $objPHPExcel->getActiveSheet()->setCellValue('D' . $j++, $category['name']);
            }

            //品牌
            $sql = "select DISTINCT hospital_brands.name from hospital_brands where hospital_brands.id in
                (
                SELECT
                DISTINCT	hospital_categories.brand_id
                FROM
                    equipments
                left join hospital_categories on equipments.hospital_category_id = hospital_categories.id
                where equipments.hospital_id=$i
                )";
            $brands = getAll($sql);$j = 2;
            $objPHPExcel->getActiveSheet()->setCellValue('E1', '品牌');
            foreach ($brands as $brand){

                $objPHPExcel->getActiveSheet()->setCellValue('E'.$j++, $brand['name']);
            }
        }else{




            //品类
            $sql = "SELECT DISTINCT
                categories. NAME
            
            FROM
                equipments
            LEFT JOIN categories ON equipments.category_id = categories. ID
            WHERE
                equipments.hospital_id = $i
";
            $categories = getAll($sql);
            $j = 2;
//    var_dump($categories);
            $objPHPExcel->getActiveSheet()->setCellValue('D1', '品类');
            foreach ($categories as $category) {



                $objPHPExcel->getActiveSheet()->setCellValue('D' . $j++, $category['name']);
            }

            //品牌
            $sql = "select DISTINCT brands.name from brands where brands.id in
                (
                SELECT
                DISTINCT	categories.brand_id
                FROM
                    equipments
                left join categories on equipments.category_id = categories.id
                where equipments.hospital_id=$i
                )";
            $brands = getAll($sql);$j = 2;
            $objPHPExcel->getActiveSheet()->setCellValue('E1', '品牌');
            foreach ($brands as $brand){

                $objPHPExcel->getActiveSheet()->setCellValue('E'.$j++, $brand['name']);
            }


        }


        //科室

        $sql = "SELECT DISTINCT
	departments. NAME

FROM
	hospitals
LEFT JOIN departments ON departments.hospital_id = hospitals. ID
WHERE
	hospitals. ID = $i";

        $departments = getAll($sql);$j = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('F1', '科室');
        foreach ($departments as $department) {

            $objPHPExcel->getActiveSheet()->setCellValue('F' . $j++, $department['name']);


        }








        $sql = "SELECT
DISTINCT	buildings.name as building_name, floors.name as floor_name
FROM
	buildings
left join floors on floors.building_id = buildings.id

WHERE
	hospital_id = $i

ORDER BY buildings.name";
        $res = getAll($sql);$j = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('G1', '建筑');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', '楼层');
        foreach ($res as $row) {
            $j++;

            $objPHPExcel->getActiveSheet()->setCellValue('G' . $j, $row['building_name']);

            $objPHPExcel->getActiveSheet()->setCellValue('H' . $j, $row['floor_name']);


        }



    }






}
echo 1;
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save("0908_0.xlsx");//导出并写入当前目录，按照$excel_name命名


function getAll($sql)
{
    $link = new PDO("pgsql:host=localhost;dbname=dmrelease","postgres",'123') or die('链接数据库失败');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res =  $link->query($sql);
    $arr = [];
    while($row = $res->fetch()){
        $arr[] = $row;
    }
    return $arr;
}