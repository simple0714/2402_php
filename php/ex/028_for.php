<?php
//for : 특정 처리를 반복적으로 구현하고자 할 때 사용하는 문법
for($i = 0; $i <3; $i++) {
    //반복할 처리
    echo $i."번째 루프\n";
}

// 총 10번 도는 루프문을 만들어 주세요. 
for($i = 1; $i <11; $i++) {
    echo $i.",";
}
echo "\n";
//break문 : +$i값이 3일때 멈추고 싶다면? 
for($i = 1; $i <11; $i++) {
    if($i === 4) {
        break;
    }
    echo $i;
}
echo "\n";
// continue문 : continue아래 처리를 건너뛰고 다음 루프를 진행
for($i = 1; $i <11; $i++) {
    if($i === 3 || $i === 6 || $i === 9) {
        continue;
    }
    echo $i.",";
}
echo "\n";
//배열 루프
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < $loop_cnt; $i++){
    echo $arr[$i];
}
echo "\n";
//다중루프
for($i = 1; $i <3; $i++) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 1; $z < 3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}
// \t : indent

//구구단 2단
// 예시)
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// 2 X 9 = 18
echo "\n";
$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++) {
    $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num);
    echo $msg_line."\n";
}

echo "\n";
//구구단
for($dan = 2; $dan <10; $dan++) {
    echo "**".$dan."단**\n";
    for($multi_num = 1; $multi_num <10; $multi_num++) {
        $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num);
        echo $msg_line."\n";
    }
}