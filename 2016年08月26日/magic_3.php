<html>
<head>

</head>
<body>
<h1>PHP_$_SERVER_说明详解</h1>
<table border="1">
    <tr>
        <th>序号</th>
        <th>魔术常量</th>
        <th>结果</th>
        <th>含义</th>
    </tr>
    <tr>
        <td><?php $i=1; echo $i++ ?></td>
        <td>__LINE__</td>
        <td><?php echo __LINE__ ?></td>
        <td>文件中的当前行号</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__DIR__</td>
        <td><?php echo __DIR__; ?></td>
        <td>文件所在的目录</td>
    </tr>
    <tr>
        <td><?php  echo $i++ ?></td>
        <td>__CLASS__</td>
        <td><?php  echo  __CLASS__; ?></td>
        <td>类的名称</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__FILE__</td>
        <td><?php  echo  __FILE__; ?></td>
        <td>文件的完整路径和文件名</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__FUNCTION__</td>
        <td><?php  echo  __FUNCTION__; ?></td>
        <td>函数被定义时的名字</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__TRAIT__ </td>
        <td><?php  echo  __TRAIT__ ; ?></td>
        <td>返回 trait 被定义时的名字</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__METHOD__ </td>
        <td><?php  echo  __METHOD__ ; ?></td>
        <td>返回该方法被定义时的名字</td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>__NAMESPACE__ </td>
        <td><?php  echo  __NAMESPACE__ ; ?></td>
        <td>当前命名空间的名称</td>
    </tr>
</table>

<hr>
<table border="1">
    <tr>
        <th>序号</th>
        <th>预定义常量</th>
        <th>结果</th>
    </tr>
    <tr>
        <td><?php $i=1; echo $i++ ?></td>
        <td>PHP_VERSION</td>
        <td><?php echo PHP_VERSION ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>PHP_OS</td>
        <td><?php echo PHP_OS; ?></td>
    </tr>
    <tr>
        <td><?php  echo $i++ ?></td>
        <td>PHP_INT_MAX</td>
        <td><?php  echo  PHP_INT_MAX; ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>PHP_INT_SIZE</td>
        <td><?php  echo  PHP_INT_SIZE; ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>DEFAULT_INCLUDE_PATH</td>
        <td><?php  echo  DEFAULT_INCLUDE_PATH; ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>PEAR_INSTALL_DIR </td>
        <td><?php  echo  PEAR_INSTALL_DIR ; ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>PEAR_EXTENSION_DIR </td>
        <td><?php  echo  PEAR_EXTENSION_DIR ; ?></td>
    </tr>
    <tr>
        <td><?php echo $i++ ?></td>
        <td>PHP_EXTENSION_DIR </td>
        <td><?php  echo  PHP_EXTENSION_DIR ; ?></td>
    </tr>
</table>
</body>
</html>