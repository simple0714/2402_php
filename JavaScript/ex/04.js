console.log("js파일에서 안녕하세요?");

//변수
//var : 중복 선언 가능,재할당 가능, 함수레벨 스코프
var num1 = 1; // 최초 선언
var num1 = 2; // 중복 선언
num1 = 3;     // 재할당

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프 
let num2 = 2;
//let num2 = 3;
num2 = 6;

//상수
//상수는 대문자로 작성
// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const NUM = 3;
//const NUM = 5;
// NUM = 4;



//-------------------
//스코프
//-------------------
//변수나 함수의 유효 범위
//전역, 지역, 블록 3가지의 스코프

//전역 스코프
let globalScope = '전역 스코프';

function myPrint() {
    console.log(globalScope);
}

//myPrint();
//console.log(globalScope);


//지역 스코프
function myLocalPrint() {
    let localStr = '지역 스코프 let';
    console.log(localStr);
}

// console.log(localStr);

//블록 레벨 스코프 
//{ }로 둘러싸인 범위 

function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}

// 호이스팅 (hoisting)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 한는 가
console.log(test);
test = "abc";
console.log(test);

var test;

//데이터 타입
// number 숫자 
let num = 1;

//string 문자
let str = 'abcdefg';

// boolean 논리(true/false)
let boo = true;

// null이 존재하지 않는 값
let letNull = null;

// undefined 값이 할당 되어 있지 않은 상태
let letUndefined;

//object 객체
let obj = {
    key1: 'val1',
    key2: 'val2'  
};

console.log(typeof obj);

// Array 배열
let arr = [1, 2, 3];

// symbol 심볼
let letStr1 = '심볼1';
let letStr2 = '심볼1';
let letSymbol1 = Symbol('심볼1');
let letSymbol2 = Symbol('심볼1');