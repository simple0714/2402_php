<?php   
// 배열 (array) : 하나의 변수에 여러 값을 담을 수 있는 데이터 타입
// array 자체가 하나의 데이터 타입이기 때문에 echo $arr 로 출력하려 시도하면 warning가 뜬다.

// 5.4 이전 버전의 배열선언 방식
$arr1 = array(1, 2, 3);
print_r($arr1);

// 5.4부터 추가 된 배열 선언 방식(이 방식을 더 많이 사용)
$arr2 = [4, 5, 6];
print_r($arr2);

//배열에서 특정 요소의 값을 가져오는 방법
// index(key)는 0번부터 시작한다. 아이템을 추가하면 키는 자동으로 1씩 증가하며 추가된다.
echo $arr2[0];

// 배열에 요소 추가
$arr2[] = 7; 
print_r($arr2);
// 배열의 특정 요소의 값 변경
$arr2[0] = 10;
print_r($arr2);

// 음식종류 5개 이상을 인덱스 배열로 만들어주세요.
$arr_menu = [
    "밥"
    ,"김치찌개"
    ,"된장찌개"
    ,"순두부찌개"
    ,"제육볶음"
];
print_r($arr_menu);
echo $arr_menu[4];


//연관배열. PHP에서 가장 많이 사용하는 방식이다.
$arr_asso = [
    "name" => "honggildong"
    ,"age" => 20
];
print_r($arr_asso);
echo $arr_asso["name"];

//$arr_asso 키(gender), 값(F)인 아이템을 추가
$arr_asso["gender"] = "F";
print_r($arr_asso);

// 다차원 배열
$arr_multi = [
    [1, 2, 3]
    ,[
        4
        ,[10, 11, 12]
        ,6
    ]
    ,7
];
echo $arr_multi[0][1];
echo $arr_multi[1][1][1];

$arr_result =[
    ["name" => "홍길동", "age" => 20]
    ,["name" => "갑돌이", "age" => 18]
    ,["name" => "갑순이", "age" => 19]
];
echo $arr_result[1]["name"];
echo $arr_result[2]["age"];

echo "\n \n";


// 배열의 길이(size, length등 여러가지로 불린다.) 
$arr = [1, 2, 3, 4, 5];
// 위 함수의 배열의 길이는 5
echo count($arr);
echo count($arr_result);

// unset() : 배열의 특정 아이템 삭제. key 자체를 삭제하기 때문에 key number가 정렬되지는 않음.
unset($arr[2]);
print_r($arr);

//배열의 정렬 : 배열의 값으로 정렬하는 방법, 배열의 key값으로 정렬하는 방법. 크게 두가지가 있다.
// asort() : 배열의 값을 기준으로 오름차순 정렬
$arr = [5,4,3,8,1];
asort($arr);
print_r($arr);
// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);
print_r($arr);

//ksort() : 배열의 키를 기준으로 오름차순 정렬
ksort($arr);
print_r($arr);
//krsort() : 배열의 키를 기준으로 내림차순 정렬
krsort($arr);
print_r($arr);

//키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요.(배열 길이는4)
$arr_food = [
    "김치찌개" => "김치"
    ,"배추국" => "배추"
    ,"순두부찌개" => "순두부"
    ,"피자" => "치즈"
];
print_r($arr_food);

// 피자의 주재료를 밀가루, 토마토, 치즈, 바질
$arr_food["피자"] = ["밀가루", "토마토", "치즈", "바질"];
print_r($arr_food);

// *!!! 키 작성시 멀티바이트를 사용하는 한글 말고 영어로 작성해야 한다.
// 단 배열의 값은 한글로 작성이 가능하다.
// 멀티바이트 언어인 한글은 오류가 발생할 수 있기 때문.