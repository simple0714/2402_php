<?php
// int : 숫자(정수)
echo 123 ;

// double : 실수 
//float 보다 오류가 더 적은 double을 더 많이 사용한다.
var_dump (3.141592) ;


// string : 문자열
var_dump ("abcd") ;
// pure php 개발시 "" 많이 사용
var_dump ('efgh') ;
// Laravel 이용시 ''많이 사용


// boolean : 논리(true/false)
var_dump(true, false,);


// NULL
var_dump(null);

// array : 배열
var_dump([1,2,3]);

//object : 객체
$obj = new DateTime();
var_dump($obj);


//형변환 : 변수 앞에 (datatype)
var_dump('123');
var_dump((int) '456');
var_dump((string) 789);

//주의할 점  var_dump((int)'abc');  <- 작동안함.