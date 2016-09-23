<?php

header("Content-type:text/html;charset=utf-8");
header("Content-type:application/vnd.ms-excel");
header("content-Disposition:filename=$hospital.csv");

$a="a,b,c";
echo iconv("UTF-8", "GBK//TRANSLIT//IGNORE", $a)."\n";