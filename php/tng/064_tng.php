<?php
//로또 번호 생성기
//1~45까지의 랜덤한 숫자를 6개 뽑습니다.
//단, 중복되는 숫자는 없어야 합니다.

// for($number = 1; $number <2; $number++){
//     $num1 = random_int(1,45);
//     echo $num1."\n";
//     $num2 = random_int(1,45);
//     echo $num2."\n";
//     $num3 = random_int(1,45);
//     echo $num3."\n";
//     $num4 = random_int(1,45);
//     echo $num4."\n";
//     $num5 = random_int(1,45);
//     echo $num5."\n";
//     $num6 = random_int(1,45);
//     echo $num6."\n";
//     if($num1 === $num2){
//         echo random_int(1,45);
//     }
//     if($num1 === $num3){
//         echo random_int(1,45);
//     }
//     if($num1 === $num4){
//         echo random_int(1,45);
//     }
//     if($num1 === $num5){
//         echo random_int(1,45);
//     }
//     if($num1 === $num6){
//         echo random_int(1,45);
//     }
//     if($num2 === $num3){
//         echo rand(1,45);
//     }
//     if($num2 === $num4){
//         echo rand(1,45);
//     }
//     if($num2 === $num5){
//         echo rand(1,45);
//     }
//     if($num2 === $num6){
//         echo rand(1,45);
//     }
//     if($num3 === $num4){
//         echo rand(1,45);
//     }
//     if($num3 === $num5){
//         echo rand(1,45);
//     }
//     if($num3 === $num6){
//         echo rand(1,45);
//     }
//     if($num4 === $num5){
//         echo rand(1,45);
//     }
//     if($num4 === $num6){
//         echo rand(1,45);
//     }
//     if($num5 === $num6){
//         echo rand(1,45);
//     }
// }

$lotto = [];
while (count($lotto)<6){
    $number = random_int(1,45);
    if(!in_array($number,$lotto)) {
        $lotto[] = $number;
    }
}
// foreach ($lotto as $num) {
//     echo $num."\n";
// }
print_r($lotto);

//$range (1,45);
//shuffle =$range;

