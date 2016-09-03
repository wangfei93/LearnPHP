<?php

if(!empty($_FILES['file']['tmp_name'])){
    if(!file_exists($_FILES['file']['name']))
    {
        move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
    }else{
        echo '文件已存在';
    }

}