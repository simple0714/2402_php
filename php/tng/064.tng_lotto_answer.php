<?php
//로또 번호 생성기
//1~45까지의 랜덤한 숫자를 6개 뽑습니다.
//단, 중복되는 숫자는 없어야 합니다.


//방법 1
$arr_pick = []; //뽑은 값 저장용
while(true) {
    $int_rand = random_int(1,45); //랜덤 숫자 획득

    //중복 체크
    if(!isset($arr_pick[$int_rand])) {
        $arr_pick[$int_rand] = $int_rand;
    }

    //루프 종료 체그
    if(count($arr_pick) === 6) {
        break;
    }
}
print_r($arr_pick);


//방법2 
$arr_base = range(1,45); //기본 배열
$arr_pick =[]; //뽑은 값 저장용
for($i = 0; $i <6; $i++) {
    $int_rand = random_int(1,count($arr_base)-1); //랜덤 숫자 배열(배열의 키)
    $arr_pick[] = $arr_base[$int_rand]; //랜덤한 값 저장
    unset($arr_base[$int_rand]); //사용한 요소 삭제
    $arr_base = array_values($arr_base); //배열 인덱스 정렬
}
print_r($arr_pick);


//방법 3
$arr_base = range(1,45); //기본배열
shuffle($arr_base); //배열섞기
$result = array_slice($arr_base, 0, 6); //배열키 0에서 5까지 가져오기
print_r($result);