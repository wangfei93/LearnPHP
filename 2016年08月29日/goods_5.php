<?php
$link = new PDO("pgsql:host=localhost;dbname=test","postgres",'123') or die('链接数据库失败');
$sql = "select customers.name as customer_name , orders.code as order_code, products.name as product_name, categories.name as category_name, orders.price as order_price , orders.number as order_number, orders.time as order_time
from order_cust
left join orders  on order_cust.order_id = orders.id
left join customers on order_cust.customer_id = customers.id
left join products on orders.product_id = products.id
left join categories on products.category_id = categories.id
";

$res =  $link->query($sql);
$arr = [];
while($row = $res->fetch()){
    $arr[] = $row;
}


?>


<html>
<head>

</head>
<body>
<table>
    <tr>
        <th>用户名称</th>
        <th>订单编码</th>
        <th>产品名称</th>
        <th>产品类别</th>
        <th>成交价格</th>
        <th>购买数量</th>
        <th>订单时间</th>

    </tr>
    <?php foreach ($arr as $row ) : ?>

    <tr>
        <td><?php echo $row['customer_name']?></td>
        <td><?php echo $row['order_code']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['category_name']?></td>
        <td><?php echo $row['order_price']?></td>
        <td><?php echo $row['order_number']?></td>
        <td><?php echo $row['order_time']?></td>
        
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>

