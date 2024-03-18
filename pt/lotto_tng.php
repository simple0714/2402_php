<?php
$num = random_int(1,45);
$num_pik = [];
foreach ($num as $key => $val){
    $num_pik = $num;
    if(in_array($num_pik, $num)){
        $num_pik = $num;
        unset($num[$key]);
    }
}