<?php
$data1 = $_GET['data1'];
$data2 = $_GET['data2'];
$function = $_GET['function'];

switch($function ) {
    case '+' : $result = $data1 + $data2;break;
    case '-' : $result = $data1 - $data2;break;
    case '/' : $result = $data1 / $data2;break;
    case '*' : $result = $data1 * $data2;break;

}


?>

<html>
<head>

</head>

<body>
<table>
    <form action="?" method="get">
        <tr>
            <td>数值1: </td>
            <td><input type="text" name="data1" value="<?php echo $data1?>"></td>
        </tr>
        <tr>
            <td>数值2: </td>
            <td><input type="text" name="data2"  value="<?=$data2?>"></td>
        </tr>
        <tr>
            <td>方法: </td>
            <td>
                <select name="function">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="/">/</option>
                    <option value="*">*</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>结果: </td>
            <td><input type="text" name="result" value="<?=$result?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="计算结果"></td>
        </tr>
    </form>
</table>
</body>
</html>

