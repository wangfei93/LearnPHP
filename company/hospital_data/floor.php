<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');



function getFloor($sql)
{
    $data = getAll($sql);
    if(!$data)
    {

        return false;
    }
    $new_data = [];

    foreach ($data as $key => $row) {
        $new_data[$key]['building_name'] = $row['building_name'];
        $new_data[$key]['floor_name'] = str_replace('层', '', $row['floor_name']);;

    }
    
    foreach ($new_data as $new_key => $new_row) {

        if(strlen($new_row['floor_name']) > 5)
        {

            unset($new_data[$new_key]);

        }

    }

    foreach ($new_data as $new_key => $new_row) {

        if(strlen($new_row['floor_name']) > 5)
        {
            echo $new_row['floor_name'];

        }

    }
    $new_data = array_values($new_data);

    
    $res[0]['building_name'] = $new_data[0]['building_name'];
    $res[0]['floor_min'] = $new_data[0]['floor_name'];
    $res[0]['floor_max'] = $new_data[0]['floor_name'];
    $j = 0;


    for($i=1; $i < count($new_data); $i++) {

        if($res[$j]['building_name'] == $new_data[$i]['building_name']) {
            if($new_data[$i]['floor_name'] < $res[$j]['floor_min'])
            {
                $res[$j]['floor_min'] = $new_data[$i]['floor_name'];
            }
            if($new_data[$i]['floor_name'] > $res[$j]['floor_max']) {
                $res[$j]['floor_max'] = $new_data[$i]['floor_name'];
            }
        }else {
            $j++;
            $res[$j]['building_name'] = $new_data[$i]['building_name'];
            $res[$j]['floor_min'] = $new_data[$i]['floor_name'];
            $res[$j]['floor_max'] = $new_data[$i]['floor_name'];
        }
    }
    $k = 0;
    foreach ($res as $re) {
        $floors[$k]['name'] = $re['building_name'];
        $floors[$k]['extra'] = $re['floor_min'] .'-'. $re['floor_max'] ;
        $k++;
    }
    
    return $floors;
}
//$sql = "select DISTINCT buildings.name as  building_name, floors.name as floor_name   from floors left join buildings on buildings.id = floors.building_id order by buildings.name";


//
//$sql = "SELECT
//DISTINCT	buildings.name as building_name, floors.name as floor_name
//FROM
//	buildings
//left join floors on floors.building_id = buildings.id
//
//WHERE
//	hospital_id = $id
//
//ORDER BY buildings.name";












