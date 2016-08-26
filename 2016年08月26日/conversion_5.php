<?php
$data10 = isset($_GET['data10']) ? $_GET['data10'] : 0; 
$conversion = $_GET['conversion'];
switch ($conversion){
    case 2 : $con_data = decbin($data10);break;
    case 8 : $con_data = decoct($data10);break;
    case 16 : $con_data = dechex($data10);break;
}
?>


<html>
<head>

</head>
<body>
<form action="?" method="get">
    <label>十进制: </label>
    <input type="text" name="data10" value="<?=$data10?>">
    <select name="conversion">
        <option value="2">转化为2进制</option>
        <option value="8">转化为8进制</option>
        <option value="16">转化为16进制</option>
    </select>
    <input type="text"  value="<?=$con_data?>" >
    <input type="submit" value="转化">
</form>
</body>
</html>