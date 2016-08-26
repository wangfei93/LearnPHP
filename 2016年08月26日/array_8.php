<?php
/**
 * 使用任何形式定义一个数组，要求使用3种形式输出该数组的所有键和值。 提示：foreach, print_r, var_dump
 */


$person = array(
    'name' => 'wangfei',
    'age'  => '22',
    'gender' => '女',
    'master' => 'math',
    'sorce' => '100'
);
//第一种
echo json_encode($person);
echo '<br>';

//第二种
print_r($person);
echo '<br>';



//第三种
var_dump($person);
echo '<br>';