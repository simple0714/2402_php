//타이머 함수

//setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
//setTimeout(() => (console.log('타임아웃')), 5000);

// 1초뒤 A, 2초 뒤 B, 3초 뒤 C
// setTimeout(() => (console.log('A')), 1000);
// setTimeout(() => (console.log('B')), 2000);
// setTimeout(() => (console.log('C')), 3000);

// console.log('A');
// setTimeout(() => {
//     console.log('B');
//     console.log('C');
// }, 1000);

//clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거
// const TIMEOUT_ID = setTimeout(() => console.log('test'), 5000);
// clearTimeout(TIMEOUT_ID);
// console.log(TIMEOUT_ID);

//setInterval(콜백함수, 시간)[, 아규먼트1, 아규먼트2] : 일정 시간마다 콜백함수 실행
// const INTERVAL_ID = setInterval(() => console.log('인터벌'), 1000);
// let cnt = 1;
// setInterval(() => {
//     console.log('인터벌' + cnt);
//     cnt++;
// }, 1000);

// clearInterval(intervalID) : 해당 intervalID 처리 제거
// clearInterval(INTERVAL_ID);

//화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.


// const BODY = document.querySelector('body');
// setTimeout(() => {
// BODY.textContent = '두두등장';
// BODY.style.fontSize = '10rem';
// }, 5000
// );
// setTimeout(() => {
// BODY.textContent = '';
// }, 8000
// );
// const REMOVE = setTimeout(() => {BODY.textContent = '두두등장'; BODY.style.fontSize = '10rem';}, 5000);
// setTimeout(() => {
//     clearTimeout(REMOVE);
// }, 3000);


// 5초 후에 '두두등장' 텍스트와 스타일을 변경하는 작업을 실행
// const showTextTimeout = setTimeout(() => {
//     BODY.textContent = '두두등장';
//     BODY.style.fontSize = '10rem';

//     const hideTextTimeout = setTimeout(() => {
//         BODY.textContent = ''; 
//     }, 3000);
// }, 5000);


//-----------------------------------------
setTimeout(() => {
    const H1 = document.createElement('h1');
    H1.innerHTML = '두두등장';
    H1.style.fontSize = '10rem';

    document.body.appendChild(H1);

    setTimeout(() => {
        const DEL_H1 = document.querySelector('h1');
        document.body.removeChild(DEL_H1);
    },3000)
}, 5000)


setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C')
        },1000)
    }, 2000)
},3000)