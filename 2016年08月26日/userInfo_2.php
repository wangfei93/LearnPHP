<html>
<head>
    <title>注册用户信息</title>
</head>
<body>
<table>
    <form action="info_2.php" method="post">
        <tr>
            <td><label>用户名:</label></td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td><label>密码:</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><label>性别:</label></td>
            <td>
                <input type="radio" name="sex" value="1">男
                <input type="radio" name="sex" value="0">女
            </td>
        </tr>
        <tr>
            <td><label>学科</label></td>
            <td>
                <input type="checkbox" name="subject[]" value="1">C#
                <input type="checkbox" name="subject[]" value="2">JAVA
                <input type="checkbox" name="subject[]" value="3">PHP
                <input type="checkbox" name="subject[]" value="4">C++
            </td>
        </tr>
        <tr>
            <td><label>地址:</label></td>
            <td>
                <select name="address">
                    <option  value="1">上海</option>
                    <option  value="2">广东</option>
                    <option  value="3">北京</option>
                    <option  value="4" selected = "selected">四川</option>
                    <option  value="5">河南</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>描述:</label></td>
            <td><textarea name="des"></textarea></td>
        </tr>
        <tr>
            <td><label hidden>id:</label></td>
            <td><input type="hidden" name="id" value="wangfei"></td>
        </tr>
        <tr >

            <td colspan="2" align="center"><input type="submit" value="提交"></td>
        </tr>
    </form>
</table>
</body>
</html>