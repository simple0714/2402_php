<?php
//function
function my_sum($num1, $num2){
    return $num1 + $num2;
}

// echo my_sum(32, 54);


// 파라미터 drfault 설정

//!!주석 작성 방법!!
/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, dafault 10
 * @return int 합계
*/
function my_sum2($num1, $num2 = 10){
    return $num1 + $num2;
}
//argument작성시 parameter 순서에 맞춰야 함으로 
//default값을 설정해야 하는 parameter는 뒷 순서로 배치한다.
// ex) default를 먼저 설정했다 하더라도 echo my_sum( ,4); 는 동작하지 않는다.
echo my_sum2(5, 4)."\n";
echo my_sum2(5)."\n";


// -, *, /, % 를 해주는 각각의 함수를 만들어 주세요
function my_minus($num1, $num2){
    return $num1 - $num2;
}
function my_multi($num1, $num2){
    return $num1 * $num2;
}
function my_division($num1, $num2){
    return $num1 / $num2;
}
function my_remainder($num1, $num2){
    return $num1 % $num2;
}

echo my_minus(10,1)."\n";
echo my_multi(7,7)."\n";
echo my_division(49,7)."\n";
echo my_remainder(13,2)."\n";

$str = "처음 정의";
function test(string $str){
    $str = "test()에서 변경";
}
test($str);
echo $str."\n";

function test2(string $str){
    $str = "test()에서 변경";
    return $str;
}
$str = test2($str)."\n";
echo $str;


//가변길이 파라미터
//파라미터의 데이터 타입은 배열
function my_sum_all(...$numbers) {
   // $numbers = func_get_args(); //PHP 5.5. 이하 에서 가변길이 파라미터 사용법.
   print_r($numbers);
}

// my_sum_all(3,5,2);



//파라미터로 받은 모든 수를 더하는 함수를 만들어주세요.
function my_sum_all2(...$numbers){
    $tmp = 0; //합계 저장용 변수

    //파라미터 루프해서 값을 획득 후 더하기
    foreach($numbers as $val){
        $tmp = $val + $tmp;
        // $tmp += $val;
    }
    //합계 리턴
    return($tmp);
}
echo my_sum_all2(5,4,5,6)."\n";

//참조전달
function test_v($num){
    $num = 3;
}
function test_r(&$num){
    $num = 5;
}
$num = 0;
test_r($num);
echo $num."\n";

//참조 변수
$a = 1;
$b = &$a;
$a = 3;
echo $b."\n"; // =3

