<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');

$hostdir='./dict/';
$filenames = scandir($hostdir);
foreach ($filenames as $filename) {
    $str = unserialize(file_get_contents('./dict/' . $filename));
    $new_data = [];
    $i = 0;


    foreach ($str as $row)
    {

        $new_data[$i] = str_replace('，', '', $row);

        $new_data[$i]['name'] = str_replace('。', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('（', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('）', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('、', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('“', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('”', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('？', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace(' ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('-', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('_', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('*', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('&', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('·', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('γ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('β', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('／', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ア', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ジ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('オ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('•', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ク', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ッ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('テ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ス', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('ー', 'l', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace(',', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('.', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('/', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('α', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace('χ', '', $new_data[$i]['name']);
        $new_data[$i]['name'] = str_replace(' ', '', $new_data[$i]['name']);


        $i++;

    }


    print_r($new_data);


    file_put_contents('./tmp/' . $filename . '.txt', serialize($new_data));




}




//echo '<pre>';
//echo count($data);
//echo count($new_data);
//print_r($new_data);

//
//echo '<pre>';
//print_r($array);

//$str = 'hello--- world';
//$str1 = str_replace('，', ',', $str);
//
//echo $str1;