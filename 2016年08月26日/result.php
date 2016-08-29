<?php
//总结一句话：
//我们按照正常的思路，应当保证接收数据的时候，$_REQUEST
//['参数']要和提交数据的页面给出html元素名字一致，如果不一致，
//则会出现notice提示，同时我们接收的数据就是null等价""
/*
    if($num1==null){
        echo'也没有收到值';
    }
    if($num1==""){
        echo'也没有值';
    }
    echo $num1;
*/
//接收用户从mycal.php(对应静态页面 浏览器提交的数据
//1.接收num1
//$_REQUEST 该方法可以接收用户的post 或者get 请求数据
$num1=$_REQUEST['num1'];
//2.接收num2
$num2=$_REQUEST['num2'];
//3.接收运算符
$oper=$_REQUEST['oper'];

$res=0;
switch($oper){
    case "+":
        $res=$num1+$num2;
        break;
    case "-":
        $res=$num1-$num2;
        break;
    case "*":
        $res=$num1*$num2;
        break;
    case "/":
        $res=$num1/$num2;
        break;
    default:
        echo '运算结果不正常';

}
echo'接收到.'.$num1."||".$num2."||".$oper."<br/>";
echo '结果='.$res ;
?>
<br/>
<a href="mycal.php">返回计算器页面</a>