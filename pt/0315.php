<?php

//배열에서 가장 큰 수 찾기
$arr =[4,7,19,2,8,11];
$tmp = 0;
foreach($arr as $val){
    if($tmp < $val){
        $tmp = $val;
    }
}
echo $tmp;

//배열에서 가장 작은 수 찾기
$arr =[4,7,19,2,8,11];
$tmp = 0;
foreach($arr as $val){
    if($tmp < $val){
        $tmp = $val;
    }
}
echo $tmp;


echo "\n \n";
//while을 이용해서 구구단 2단 출력하기.
echo "2단\n";
$num = 1;
while($num < 10){
    echo "2 x ".$num." = ".(2*$num)."\n";
    $num++;
}

echo "\n \n";
//while을 이용해서 구구단 출력하기.
$dan = 2;
$num = 1;
while ($dan < 10) {
    echo $dan."단";
    while($num<10){
        $msg = $dan. " x ".$num." = ".($dan*$num);
        echo $msg."\n";
        $num++;
    }
    $num = 1;
    $dan++;
}