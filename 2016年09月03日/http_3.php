<?php
$host = 'localhost';
$port = '80';

$link = fsockopen($host, $port); //建立一个internet链接


define('CRLF', "\r\n");

//请求行
$request_data = 'http://localhost/nest/dm/index.php' . CRLF;

//请求头
$request_data .= 'Host: localhost' . CRLF;
$request_data .=  'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0
' . CRLF;
$request_data .= 'Connection: keep-alive'  . CRLF;
//空投行表示借宿
$request_data .= CRLF;


//请求主体,GET没有主体




//模拟post请求
$post_data = array(
    'username' => 'hehe',
    'password' => '1234',
    'captcha' => 'wedf'
);

$post_content = http_build_query($post_data);
$request_data .= 'Content-Length: ' . strlen($post_content) . CRLF;
$request_data .= 'Content-Type: application/x-www-form-urlencoded' . CRLF;
$request_data .= CRLF;

$request_data .= $post_content;

//发送
fwrite($link, $request_data);

//处理响应数据
while(!feof($link)){
    echo fgets($link, 1024);
}

fclose($link);
