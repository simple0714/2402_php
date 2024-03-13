<?php
// 변수(Variable)
$str = "안녕 PHP";
echo $str ;

// 변수명은 한글로도 작성이 가능하나 지양한다.
$숫자1 = 1;
echo $숫자1;
/* 변수명은 영어(대소문자),숫자,_ 가능
 * 숫자로 시작 불가능, 공백포함 불가능
 * 미리 지정되어있는 예약어는 사용불가 $this, $_POST 등등
 * 변수명은 대소문자를 구분
 */

$num = 1;
$Num = 2;
echo $num;
echo $Num;

//네이밍 기법
/* 스네이크 기법 : 단어와 단어 사이를 '_'로 이어줌. purephp 개발시 많이 사용.
 * 카멜 기법 : 단어의 첫글자는 대문자, 나머지는 소문자로 작성. 객체지향개발시 많이 사용.
 */

 echo "\n"; //개행
 // 상수 : 절대 변하지 않는 값, 상수명은 대문자로 작성, 단어 사이는 _로 연결
 // 같은 이름의 상수는 재선언해서 재설정이 불가능함으로 warning이 발생한다.
 define("USER_AGE", 20);
 define("USER_AGE", 30);
 echo USER_AGE;

 echo "\n";
 // 점심메뉴
 /* 탕수육 9000원
  * 햄버거 10000원
  * 빵 2000원
  */

 $num1 = 9000;
 $num2 = 10000;
 $num3 = 2000;
 echo "점심메뉴";
 echo "\n";
 echo "탕수육 "; echo $num1;
 echo "\n";
 echo "햄버거 "; echo $num2;
 echo "\n";
 echo "빵 "; echo $num3;

 echo "\n";

 $menu = "점심메뉴";
 $sasp = "탕수육 9000원";
 $hbg = "햄버거 10000원";
 $brd = "빵 2000원";
 echo "\n";
 echo $menu;
 echo "\n";
 echo $sasp;
 echo "\n";
 echo $hbg;
 echo "\n";
 echo $brd;

echo "\n\n\n\n";
$menu = "점심메뉴\n";
$sasp = "탕수육 9000원\n";
$hbg = "햄버거 10000원\n";
$brd = "빵 2000원";
echo $menu, $sasp, $hbg, $brd;

// swap //todo : 나중에 하위목차로 다시 정리
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";
$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;
echo $swap1, $swap2;