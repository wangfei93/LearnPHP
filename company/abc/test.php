<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
$filename='abc.txt';

$str = file_get_contents($filename);
$data = explode(PHP_EOL, $str);
$new_data = [];
$i = 0;
foreach ($data as $row)
{
    $new_data[$i] = str_replace('，', '', $row);
    $new_data[$i] = str_replace('。', '', $new_data[$i]);
    $new_data[$i] = str_replace('（', '', $new_data[$i]);
    $new_data[$i] = str_replace('）', '', $new_data[$i]);
    $new_data[$i] = str_replace('、', '', $new_data[$i]);
    $new_data[$i] = str_replace('“', '', $new_data[$i]);
    $new_data[$i] = str_replace('”', '', $new_data[$i]);
    $new_data[$i] = str_replace('？', '', $new_data[$i]);
    $new_data[$i] = str_replace(' ', '', $new_data[$i]);
    $new_data[$i] = str_replace('-', '', $new_data[$i]);
    $new_data[$i] = str_replace('_', '', $new_data[$i]);
    $new_data[$i] = str_replace('*', '', $new_data[$i]);
    $new_data[$i] = str_replace('&', '', $new_data[$i]);


    $new_data[$i] = str_replace('·', '', $new_data[$i]);
    $new_data[$i] = str_replace('γ', '', $new_data[$i]);
    $new_data[$i] = str_replace('β', '', $new_data[$i]);
    $new_data[$i] = str_replace('／', '', $new_data[$i]);
    $new_data[$i] = str_replace('ア', '', $new_data[$i]);
    $new_data[$i] = str_replace('ジ', '', $new_data[$i]);
    $new_data[$i] = str_replace('オ', '', $new_data[$i]);
    $new_data[$i] = str_replace('•', '', $new_data[$i]);
    $new_data[$i] = str_replace('ク', '', $new_data[$i]);
    $new_data[$i] = str_replace('ッ', '', $new_data[$i]);
    $new_data[$i] = str_replace('テ', '', $new_data[$i]);
    $new_data[$i] = str_replace('ス', '', $new_data[$i]);
    $new_data[$i] = str_replace('ー', '', $new_data[$i]);
    $new_data[$i] = str_replace('  ', '', $new_data[$i]);
    $new_data[$i] = str_replace('\r\n', '', $new_data[$i]);
    $i++;

}

file_put_contents('cc2', serialize($new_data));

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