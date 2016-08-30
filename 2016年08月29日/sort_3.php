<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
/**
 * @param $type  升序或者降序 'asc' 升序   'des' 降序
 * @param $array 需要排序的数组
 */
function maopao_sort($type, $array){
    //设置需要循环的次数
    for($i=1, $count=count($array); $i<$count-1; $i++){
        //相邻两个数的比较
        for($j=0; $j<$count-$i;$j++){
            if($type == 'asc'){
                if($array[$j] > $array[$j+1]){
                    $temp = $array[$j+1];
                    $array[$j+1] = $array[$j];
                    $array[$j] = $temp;
                }
            } elseif($type == 'des'){
                if($array[$j] < $array[$j+1]){
                    $temp = $array[$j+1];
                    $array[$j+1] = $array[$j];
                    $array[$j] = $temp;
                }
            }else{
                return '输入的排序方式不对';
            }
        }
    }
    return $array;
}







function quick_sort($array){
    $len = count($array);
    if($len <= 1){
        return $array;
    }

    $base_num = $array[0];

    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的



    for($i=1; $i<$len; $i++) {
        if($base_num > $array[$i]) {
            //放入左边数组
            $left_array[] = $array[$i];
        } else {
            //放入右边
            $right_array[] = $array[$i];
        }
    }
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    return array_merge($left_array, array($base_num), $right_array);

}


//
$data = quick_sort([2,5,3,9,343,67, 34,0,23,7,1]);
print_r($data);
