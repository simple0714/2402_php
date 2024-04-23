// Math객체

//올림, 반올림, 버림
//올림
Math.ceil(0.1); //1
//반올림
Math.round(0.5); //1
//버림
Math.floor;(0.9); //0

//랜덤값
Math.random(); //0~1사이 랜던한 값 반환.
// 1~10 랜덤 숫자 획득
Math.ceil(Math.random() * 10) ; 


//최대값, 최소값, 절대값

//최대값
Math.max(1, 2, 3); // 3

let arr = [1, 2, 3, 4];
Math.max(...arr); // 4

//최소값
Math.min(1, 2, 3); // 1
Math.min(...arr); // 1

//절대값
//양수건 음수건 절대값으로 수를 가져옴
Math.abs(1);
Math.abs(-1);
