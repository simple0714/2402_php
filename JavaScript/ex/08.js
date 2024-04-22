/*
// 기본형태
if(조건1) {
	// 조건1이 참이면 실행할 처리
}
// 조건1이 거짓일경우 다음 체크로 진행
else if(조건2) {
	// 조건2가 참이면 실행할 처리
}
// 앞선 조건1, 조건2 모두 거짓일경우 else가 실행
else {
	
}
*/

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
let num = 1;
if(num === 1) {
    console.log("1등")
} else if(num === 2) {
    console.log("2등")
} else if(num === 3) {
    console.log("3등")
} else if(num === 5) {
    console.log("특별상")
} else {
    console.log("순위 외")
}

//나이가 20이면 '20대', 30이면 '30대', 나머지는 '모르겠다'.
let age = 20;
switch(age) {
    case 20:
        console.log('20대');
        break;
    case 30:
        console.log('30대');
        break;
    default:
        console.log('모르겠다');
        break;
} 


console.log('for문')
//---------------------------
//반복분(for, while, do_while)
//---------------------------
// 3의 배수일 경우 출력을 원하지 않을 때
// i % 3 === 0은 3으로 나누었을 때 나머지가 0 즉, 3의 배수라는 뜻.
for(let i = 1; i < 11; i++){
    if(i % 3 === 0){
        continue;
    }
    console.log(i + '번째 루프')

    if(i === 7){
        break;
    }
}

console.log('while문')
let cnt = 1;
while(cnt <= 10) {
    console.log(cnt + '번째 루프');
    cnt++;
}

console.log('while문에서 3의 배수 생략')
cnt = 0;
while(cnt <= 10) {
    if(cnt % 3 === 0){
        cnt++;
        continue;
    }
    console.log(cnt +'번째 루프');

    if(cnt === 8){
        break;
    }
    cnt++;
}

console.log('구구단')
for(gugu = 2; gugu < 10;){
    console.log(`${gugu}단`)
    for(i = 1; i < 10; i++){
        console.log(`${gugu} x ${i} = ${gugu * i}`);
    }
    gugu++;
}


//for...in
//모든 객체를 반복하는 문법
//key에만 접근이 가능
const OBJ = {
    key1: 'val1',
    key2: 'val2'
};

for(let key in OBJ) {
    console.log(key);
}
//key의 value를 가져오는법
for(let key in OBJ) {
    console.log(OBJ[key]);
}

const ARR1 = [1, 2, 3];
for(let key in ARR1) {
    console.log(ARR1[key]);
}

//for...of
//iterable 객체를 반복하는 문법(String, Array, Map, Set, TypeArray...)
//iterable : 반복 가능한
//value에만 접근이 가능
const STR1 = '안녕하세요';
for(let val of STR1){
    console.log(val);
}

//iterable 객체 확인 하는 법
// console에 ().length 를 쳤을때 값이 나오면 iterable객체, undefined뜨면 iterable가 아닌 객체.
