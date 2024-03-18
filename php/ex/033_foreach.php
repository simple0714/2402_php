<?php
//foreach문 : 배열을 편하게 루프시키기 위한 반복문
//배열의 길이만큼 루프

//배열의 값만 이용할 경우에 사용.
$arr = [9,8,7,6,5];
foreach($arr as $val){
    echo $val."\n";
}
// // $val : loof안의 요소를 임시로 저장하기 위한 값

echo "\n";
// //배열의 키와 값 모두 이용할 경우
foreach($arr as $key => $val) {
    echo "key: $key, value: $val"."\n";
}

// $arr = [
//     ["name" => "홍길동"
//     ,"age"  => "20"
//     ,"gender" => "남자"]
//     ,["name" => "갑순이"
//     ,"age"  => "20"
//     ,"gender" => "여자"]
//     ,["name" => "갑돌이" 
//     ,"age"  => "21"
//     ,"gender" => "남자"]
// ];
//$msg_format = "<h3>%s</h3>의 나이는 %d이고, 성별은 %s입니다.<br>"
// name의 나이는 age이고, 성별은 gender입니다.
// foreach($arr as $item) {
//     echo $item["name"]."의 나이는 ".$item["age"]."이고, 성별은 ".$item["gender"]."입니다."."\n";
// }

// $arr2 = {
//     "name"=>"홍길동", "age" => "20", "gender"=>"M"
// };


// 아래의 배열에서 foreach를 이용해 아래처럼 출력해 주세요.
// ID List
// meerkat1
// meerkat2
// meerkat3
$arr = [
	["id" => "meerkat1", "pw" => "php504"]
	,["id" => "meerkat2", "pw" => "php504"]
	,["id" => "meerkat3", "pw" => "php504"]
];
echo "ID List"."\n";
foreach($arr as $item) {
    echo $item["id"]."\n";
}

// 배열의 값중 가장 큰 수를 구해주세요.
// 예시)
// $arr = [4,5,7,3,2,9];
// 위의 배열 중 가장 큰 수인 9가 출력 되어야 합니다.
$arr1 = [4,5,7,3,2,9];
$tmp=0;
$min_num=$arr[0];
foreach($arr1 as $key){
    //최대값
    if($tmp < $key){
        $tmp = $key;
    }
    //최소값
    if($min_num > $key){
        $min_num = $key;
    }
}
echo $tmp;
echo $min_num;






//데이터 타입에 따른 초기화값
// $max_num = 0;
// $srt_num = "";
// $arr = [];
// $obj = null;