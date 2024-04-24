const INFORMATION = document.getElementById('btn');
// const ANNAE = '';
const BTN = document.querySelector('#btn');
// btn.onclick = 




function ANNAE() {
    alert('"안녕하세요"')
}
INFORMATION.onclick = ANNAE;
INFORMATION.addEventListener('click',function(){
    alert('"숨어있는 div를 찾아보세요."');
})
/*
const item = document.querySelector('.item');
const container = document.querySelector('.container');
//포인터 진입시 나오는 알러트
item.addEventListener('mouseenter', () => {
    if (item.style.backgroundColor === 'white' || item.style.backgroundColor === '') {
        alert('두근두근');
    }
})
let clickCount = 0;
item.addEventListener('click', () => {
    if (clickCount % 2 === 0) {
        alert('들켰다!');
        item.style.backgroundColor = 'black'; 
    } else {
        alert('다시 숨는다!');
        item.style.backgroundColor = 'white'; 

        const containerWidth = container.clientWidth;
        const containerHeight = container.clientHeight;
        const itemWidth = item.clientWidth;
        const itemHeight = item.clientHeight;

        // 요소를 container 내의 랜덤한 위치로 이동
        const randomX = Math.floor(Math.random() * (containerWidth - itemWidth));
        const randomY = Math.floor(Math.random() * (containerHeight - itemHeight));

        item.style.left = `${randomX}px`;
        item.style.top = `${randomY}px`;

    }
    
    clickCount++; 
});
*/
const item = document.querySelector('.item');
const container = document.querySelector('.container');
let clickCount = 0;

item.addEventListener('click', () => {
    if (clickCount % 2 === 0) {
        alert('들켰다!');
        item.style.backgroundColor = 'black'; 
    } else {
        alert('다시 숨는다!');




        item.style.backgroundColor = 'white'; 

        const containerWidth = container.clientWidth;
        const containerHeight = container.clientHeight;
        const itemWidth = item.clientWidth;
        const itemHeight = item.clientHeight;

        // 요소를 container 내의 랜덤한 위치로 이동
        const randomX = Math.floor(Math.random() * (containerWidth - itemWidth) * 10);
        const randomY = Math.floor(Math.random() * (containerHeight - itemHeight)* 10);

        // 요소의 위치를 설정
        item.style.position = 'absolute'; // 위치를 absolute로 설정해야 top, left가 동작합니다.
        item.style.left = `${randomX}px`;
        item.style.top = `${randomY}px`;
    }
    
    clickCount++; 
});