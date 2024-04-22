//함수(function)
//입력을 받아 출력을 하는 일련의 과정을 정의한 것

//함수 선언식
function mySum(a,b) {
    return a + b;
}

function mySum(a,b) {
    console.log('재할당');
}

//함수 표현식
//호이스팅에 영향 받지않고, 재할당을 방지.
const FNC_MY_SUM = function(a,b) {
    return a + b;
}

//화살표 함수
const FNC_MY_SUM2 = (a,b) => a + b;
//위의 일반 함수를 화살표함수로 표현
//    - function 생략
//    - {}와 return 생략

//파라미터가 하나일 경우
//소괄호를 생략하거나 소괄호 안에 하나만 넣으면 된다.
const FNC_MY_SUM3 = a => a * 2;
//const FNC_MY_SUM3 = (a) => a * 2;

//파라미터가 하나도 없으면 ()로 표시한다.
const FNC_MY_SUM4 = () => 'FNC_MY_SUM4'

//리턴처리 이외의 처리가 있을 경우, {}생략 불가눙.
const FNC_TEST = function(str) {
    if(str === 'a'){
        str = 'a입니다.';
    }
    return str;
}

const FNC_TEST2 = str => {
    if(str === 'a'){
        str = 'a입니다.';
    }
    return str;
}


//콜백 함수
//다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
const MY_SUM = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    }
    return callBack() - num;
}
const MY_CALLBACK = () => 10;


// 즉시 실행 함수(IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출되고 다시는 호출 불가
// 모듈화, 스코프 보호, 클로저 형성

const MY_CLASS = (function() {
    const name = '홍길동';

    return {
        myPrint: function(){
            console.log(name + '입니다.');
        }
    }
})();
