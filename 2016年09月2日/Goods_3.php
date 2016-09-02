<?php
class Goods
{
    public $name; //名称
    public $price; //价格
    public $number; // 数量


    public function __construct($name, $price, $number)
    {
        $this->name = $name;
        $this->price = $price;
        $this->number = $number;

    }

    public function goodInfo()
    {
        echo '商品名称 : ' . $this->name;
        echo '商品价格 : ' . $this->price;
        echo '商品库存数量'  . $this->number;
    }
}


class Phone extends Goods
{
    public $name; //名称
    public $brand; // 品牌
    public $address; //生产地址

    public function __construct($name, $price, $number, $brand, $address)
    {
        parent::__construct($name, $price, $number);
        $this->brand = $brand;
        $this->address = $address;
    }

    public function phoneInfo()
    {
        echo '商品名称: '  . $this->name;echo '<br>';
        echo '商品价格 : ' . $this->price;echo '<br>';
        echo '商品库存数量: '  . $this->number;echo '<br>';
        echo '商品品牌: ' . $this->brand;echo '<br>';
        echo '商品的生产地址: ' . $this->address;echo '<br>';
    }


}

class Book extends Goods
{
    public $author;
    public $published;

    public function __construct($name, $price, $number, $author, $published)
    {
        parent::__construct($name, $price, $number);
        $this->author = $author; //作者
        $this->published = $published;// 出版社
    }

    public function bookInfo()
    {
        echo '<br>';
        echo '商品名称: '  . $this->name;echo '<br>';
        echo '商品价格 : ' . $this->price;echo '<br>';
        echo '商品库存数量: '  . $this->number;echo '<br>';
        echo '商品作者: ' . $this->author;echo '<br>';
        echo '商品的出版社: ' . $this->published;echo '<br>';
    }
}


$phone = new Phone('xiaomi', '1234', 233345, 'huawei', '上海');
$phone->phoneInfo();

$phone = new Book('格林童话', '1234', 233345, '不知道', '不知道');
$phone->bookInfo();