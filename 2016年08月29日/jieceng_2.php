<?php
function jieceng($n){
    $data = 1;
   for($i=1; $i<=$n; $i++){
       $data *= $i;
   }
       return $data;

}


function jieceng1($n)
{
    if ($n > 1) {
        $data = $n * jieceng($n - 1);
        return $data;

    }else{
        return 1;
    }

}
$data = jieceng1(23);
echo $data;