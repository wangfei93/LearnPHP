<?php
/**
 * @param $type  字符串链接的类型
 * @param $array  需要链接的字符串数组
 */
function strLink($type, $array)
{
    $str = implode($type, $array);
    return $str;
}


$str = strLink('-',['aaa', 'bbbb', 'cccccc'] );
echo $str;