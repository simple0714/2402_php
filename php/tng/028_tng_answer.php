<?php
// // 아래처럼 별을 찍어주세요.
// // 예시)
// // *****
// // *****
// // *****
// // *****
// // *****
for($i = 1; $i <6; $i++) {
    echo "*****"."\n";
}

echo "\n";
// // 아래처럼 별을 찍어주세요.
// // 예시)
// // *
// // **
// // ***
// // ****
// // *****
for($i=1; $i<6; $i++) {
    for($z=1; $z<=$i; $z++){
        echo"*";
    }
    echo "\n";
}

echo"\n";
for($i=0; $i<=5; $i++){
    for($z=0;$z<=5; $z++){
        if($z<$i){
            echo "*";
        }
    }
    echo "\n";
}

echo "\n";
// // 아래처럼 별을 찍어주세요.
// // 예시)
// //     *
// //    **
// //   ***
// //  ****
// // ***** 


//if문을 사용한 별찍기
$num = 5;
for($i=1; $i<=$num; $i++){
    $cnt_space = $num-$i;
    for($z=1; $z<=$num; $z++){
        if($z<=$cnt_space) {
            echo" ";
        }
        else{
            echo"*";
        }
    }
    echo "\n";
}

echo"\n";
for($i=0; $i<$num; $i++){
    for($z=$num-1; $z>=0; $z--){
        if($z<=$i){
        echo "*";
        }
        else{
        echo " ";
        }
    }
    echo "\n";
}

echo"\n";
//for문을 이용
for($i=0; $i<$num; $i++){
    //공백 for문
    for($z=1; $z<$num-$i; $z++){
        echo " ";
    }
    //* for문
    for($y=0; $y <= $i; $y++){
        echo"*";
    }
    echo"\n";
}