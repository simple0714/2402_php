const leftPadZero = (str, length) => {
    return String(str).padStart(length, 0);
}


const GET_DATE = () => {
    const NOW = new Date(); //Date객체 생성
    let hour = NOW.getHours();
    let minute = NOW.getMinutes();
    let second = NOW.getSeconds();
    let ampm = '오전';
    let hour_12 = hour;

    if(hour > 12) {
        ampm = '오후';
        hour_12 = hour - 12;
    }

    let printTime = 
        ampm + ' '
        + leftPadZero(hour_12, 2, '0') + ':'
        + leftPadZero(minute, 2, '0') + ':'
        + leftPadZero(second, 2);

    const SPAN_TIME = document.querySelector('#time');
    SPAN_TIME.textContent = printTime;

    }


GET_DATE();
let intervalID = setInterval(GET_DATE, 1000);

//멈춰
const BTN_STOP = document.querySelector('#btn-stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(intervalID);
})

//재시작
const BTN_RESTART = document.querySelector('#btn-restart');
BTN_RESTART.addEventListener('click', () => {
    GET_DATE();
    intervalID = setInterval(GET_DATE, 1000);
})