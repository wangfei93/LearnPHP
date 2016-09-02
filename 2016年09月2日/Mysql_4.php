<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');


class Mysql
{
    protected $link;
    
    public function __construct($config)
    {
        $this->connect($config);
        $this->setChar($config);
    }


    //链接数据库
    public function  connect($config)
    {
        $host = isset($config['host']) ? $config['host'] : 'localhost';
        $username = isset($config['username']) ? $config['username'] : 'root';
        $password = isset($config['password']) ? $config['password'] : 'root';
        $dbname = isset($config['dbname']) ? $config['dbname'] : 'test';
        $this->link = new PDO("mysql:host=$host;dbname=$dbname","$username",$password) or die('链接数据库失败');
    }

    //设置字符编码
    public function  setChar($config){
        $setChar = isset($config['setChar']) ? $config['setChar'] : 'utf-8';
        $this->link->query("set names $setChar");
    }

    //断开数据链接
    public function closeDb()
    {
        $this->link = null;
    }
    
    
}


$config = array();
$db = new Mysql($config);