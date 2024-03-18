<?php

//trim(문자열) : 좌우 공백 제거 함수
$str = "  홍 길동 ";
echo trim($str);

echo "\n";
// strto(upper:대문자로 변환해서 출력)(lower:소문자로 변환해서 출력)
$str = "aVEsdqFGQ";
echo strtoupper($str);
echo "\n";
echo strtolower($str);

echo "\n";
//str_replace(대상문자, 변경문자, 대상문자열) : 특정문자를 치환해서 반환
echo str_replace("c", "Z", "acbdefg");
echo "\n";
echo str_replace("a", "", str_replace("f","","acbdefg"));

echo "\n";
// mb_substr(문자열, 시작위치, 출력할 갯수) : 문자열을 시작위치에서부터 출력할 갯수까지 반환
// mb : multi byte. 한글은 멀티바이트라서 사용
// 사용 예시 : 최대 30자까지 출력후 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 0,3);

echo "\n"; 
//출력할 개수는 생략이 가능하다.
echo mb_substr($str, 3);

echo "\n";
//mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
$str = "나는 홍길동 입니다.";
echo mb_strpos($str, "홍");
//대상 문자열이 검색할 문자열에서 중복될 경우 왼쪽부터 시작해서 가장 처음 문자열의 위치(int)가 반환된다. 
echo "\n";
if(mb_strpos($str, "나") !== false){
    echo "포함됨";
}
else {
    echo "없음";
}

echo "\n";
//sprintf(포맷문자열, 대입문자열1, 대입문자열2, ...)
$base_msg = "%s이/가 틀렸습니다.(%s)";
$print_msg = sprintf($base_msg, "아이디", "에러코드 00");
echo $print_msg."\n";
// 지정자를 여러개 중복해서 사용 가능. sprintf 작성시 순서대로 작성.
// 지정자(Specifier) : %s:문자열, %d:정수. (양수,0,음수 모두 표현), %u:정수(양수만), %f:부동 소수점 수를 대입

// * isset(변수) : 변수의 *설정 여부* 확인 true/false 리턴. 변수가 없으면 false리턴
// IT초보의 착각 예시
$ans1 = ""; //빈 문자열이라는 값을 가진 변수
$ans2 = NULL; // 정말 아무것도 없는 변수
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4));
var_dump(isset($ans5)); //변수를 검색해서 값이 지정되어 있는지, 사용중인지 확인할 수 도 있다.

//empty(변수) : 변수의 *값이 비어있는지* 확인, true/false 리턴/ 비어있지 않아야 false를 출력.
var_dump(empty($ans1), empty($ans2), empty($ans3), empty($ans4), empty($ans5));

//gettype(변수) : 변수의 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 =5;
$arr1 = [];
$double1 = 1.4;
$boo = true;
$null1 = null;
$obj = new DateTime();
var_dump(gettype($str1), gettype($int1), gettype($arr1), gettype($double1), gettype($boo), gettype($null1), gettype($obj));


$i = 3;
$i2 =(string)$i;
var_dump($i, $i2);

//settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 *주의*
//stettype으로 정상적으로 변환시 boolean이 true로 출력됨
$i =3;
$i2 = settype($i, "string");
var_dump($i, $i2);

//time(): unix time을 가져오는 타임스탬프
echo time();
//date(포맷형식, 타임스탬프): 타임스탬프 값을 날짜 포맷형식으로 변환해서 반환
// H : 24시간 , h :12시간 
echo date("Y-m-d H:i:s", time());
echo date("Y-m-d H:i:s", time()-86400); //24시간 전 날짜 출력

//ceil(숫자), round(숫자), floor(숫자)
var_dump(ceil(1.4), round(2.5), floor(1.9));

//random_int(시작 값, 끝 값) : 시작 값부터 끝 값 범위의 랜덤한 숫자를 반환
echo random_int(1, 10);