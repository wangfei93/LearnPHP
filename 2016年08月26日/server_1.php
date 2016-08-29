<html>
<head>

</head>
<body>
<h1>PHP_$_SERVER_说明详解</h1>
<table border="1">
    <tr>
        <th>序号</th>
        <th>元素名称</th>
        <th>运行结果</th>
        <th>含义</th>
    </tr>
    <tr>
        <td><?php $i=1; echo $i++ ?></td>
        <td>$_SERVER['PHP_SELF']</td>
        <td><?php echo $_SERVER['PHP_SELF'] ?></td>
        <td>当前正在执行的脚本的文件名</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['argv']</td>
        <td><?php var_dump($_SERVER['argv']); ?></td>
        <td>url中传递给该脚本的参数</td>
    </tr>
    <tr>
        <td><?php  echo $i++ ?></td>
        <td>$_SERVER['argc']</td>
        <td><?php  echo  $_SERVER['argc']; ?></td>
        <td>传递给程序的 命令行参数的个数</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['GATEWAY_INTERFACE']</td>
        <td><?php  echo  $_SERVER['GATEWAY_INTERFACE']; ?></td>
        <td>服务器使用的 CGI 规范的版本</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['SERVER_NAME']</td>
        <td><?php  echo  $_SERVER['SERVER_NAME']; ?></td>
        <td>当前 运行脚本所在服务器 主机的名称</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['SERVER_SOFTWARE'] </td>
        <td><?php  echo  $_SERVER['SERVER_SOFTWARE'] ; ?></td>
        <td>服务器标识的字串，在响应请求时的头部中给出</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['SERVER_PROTOCOL'] </td>
        <td><?php  echo  $_SERVER['SERVER_PROTOCOL'] ; ?></td>
        <td>请求页面时通信协议的名称和版本</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['REQUEST_METHOD'] </td>
        <td><?php  echo  $_SERVER['REQUEST_METHOD'] ; ?></td>
        <td>访问页面时的请求方法</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['DOCUMENT_ROOT'] </td>
        <td><?php  echo  $_SERVER['DOCUMENT_ROOT'] ; ?></td>
        <td>当前 运行脚本所在的文档根目录</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>$_SERVER['QUERY_STRING']  </td>
        <td><?php  echo  $_SERVER['QUERY_STRING']  ; ?></td>
        <td>查询(query)的字符串</td>
    </tr>
</table>
</body>
</html>