<?php
//while문
$cnt = 0;
while($cnt < 3){
    echo "count : $cnt \n";
    $cnt++;
}

$cnt = 0;
while(true) {
    $cnt++;
    if($cnt === 3) {
        break;
    }
}

// while을 이용해서구구단 2단 출력
// 예시)
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// 2 X 9 = 18

$cnt = 1;
$dan = 2;
while($cnt < 10) {
    echo $dan." X ".$cnt." = ".($dan*$cnt)."\n";
    $cnt++;
}
