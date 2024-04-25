//1. 현재 시간을 화면에 표시
//2. 실시간으로 시간을 화면에 표시
//3. 멈춰 버튼을 누르면, 시간이 정지할 것
//4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시실시간으로 화면에 표시


function clock() {
    const H1 = document.querySelector('h1');
    const DATE = new Date();
    let amPm = '';
    let hour = DATE.getHours();
    if(hour < 12){
        amPm = '오전'
    }else{
        amPm = '오후';
        hour -= 12;
    }
    const H = String(hour).padStart(2, '0');
    const M = String(DATE.getMinutes()).padStart(2, '0');
    const S = String(DATE.getSeconds()).padStart(2, '0');

    H1.innerHTML = `현재 시각 ${amPm} ${H}:${M}:${S}`;
}
clock();
let TIME = setInterval(clock, 1000);


//멈춰
function stop() {
    clearInterval(TIME);
}
let StopBtn = document.querySelector('#stop');
StopBtn.addEventListener('click', stop);

//재시작
function restart() {
    stop();
    TIME = setInterval(clock,1000);
}
let reStart = document.querySelector('#restart');
reStart.addEventListener('click', restart);