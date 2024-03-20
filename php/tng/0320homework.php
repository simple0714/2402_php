<?php
$end_num = 100;
$arr_base = range(1,$end_num);
foreach ($arr_base as $arr) {
    if($arr % 3 != 0)
    echo $arr."입니다.\n";
}