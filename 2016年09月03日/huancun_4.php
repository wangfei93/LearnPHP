<?php
echo '这是一个缓存测试！';
$time=time();
$interval=3600*12;//12小时
header('Last-Modified: '.gmdate('r',$time));
header('Expires: '.gmdate('r',($time+$interval)));
header('Cache-Control: max-age='.$interval);