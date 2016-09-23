<?php

  $hostdir='./hospital_data/dict/';



  $filesnames = scandir($hostdir);



foreach ($filesnames as $key=>$name) {
    $i = 0;
echo $key;
echo $name;
   



}

function getFile($file)
{
    $filesnames = scandir($file);
    
    
    
}