<?php
interface Shop
{
    public function buy($id);
    public function sell($id);
    public function view($id);
}


class BaseShop implements Shop
{
    public function buy($id)
    {
        echo "你购买了ID为 $id 的商品";
    }

    public function sell($id)
    {
        echo "你卖了了ID为 $id 的商品";
    }

    public function view($id)
    {
        echo "你查看了ID为 $id 的商品";
    }

}

$good = new BaseShop();
$good->buy(123);