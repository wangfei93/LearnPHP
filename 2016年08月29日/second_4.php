<?php
function   second($array){
    //设置需要循环的次数
    for($i=1, $count=count($array); $i<3; $i++){
        //相邻两个数的比较
        for($j=0; $j<$count-$i;$j++){
                if($array[$j] > $array[$j+1]){
                    $temp = $array[$j+1];
                    $array[$j+1] = $array[$j];
                    $array[$j] = $temp;
                }

        }
    }
    return $array[$count-2];
}
$data = second([2,5,3,9,343,67, 34,123,23,7,1]);
echo $data;