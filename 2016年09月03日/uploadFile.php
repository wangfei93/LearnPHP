<html>
<head>

</head>

<body>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file" > filename:</label>
    <input type="file" id="file" name="file">
    <br>
    <input type="submit" id="submit" value="Submit">
</form>
<script>
    var submit = document.getElementById("submit");
    submit.onclick = function(){
        var file = document.getElementById("file").value;
        if(file . length < 1)
        {
            alert('请选择文件');
            return false;
        }
    }
</script>
</body>
</html>