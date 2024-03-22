<?php
$end_num = 100;
$arr = range(1,$end_num);
foreach ($arr as $val) {
    if($val % 3 != 0)
    echo $val."입니다.\n";
}

foreach($arr as $val){
    if(($val % 3) === 0 ) {
        continue;
    }
    echo $val."입니다.\n";
}