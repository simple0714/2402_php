<?php

$dan = 2;
while($dan<10) {
    echo $dan."단 \n";
    $cnt = 1;
    while($cnt < 10) {
        $msg= $dan." X ".$cnt." = ".($dan*$cnt)."\n";
        echo $msg;
        $cnt++;
    }
    $dan++;
}


