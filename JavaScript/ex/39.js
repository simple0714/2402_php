//요소선택
//--------------------------------
//고유한 ID로 요소를 선택

const TITLE = document.getElementById('title');



//태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('H1');
H1[1].style.color = 'green';
H1[1].style = 'color: green; font-size: 3rem;';


const CLASS_ELE = document.getElementsByName('none-li')

//css선택자를 이용해서 요소를 선택
//쿼리셀렉터는 가장 상단의 요소 하나만 가져온다.
const CSS_ID = document.querySelector('#title');
const CSS_CLS = document.querySelector('.none-li');
//querySelectorAll은 해당 모든 요소를 다 가져온다.
const CSS_CLS_ALL = document.querySelectorAll('.none-li');

// ul의 li 자식 중 2번째 자식 선택
//const LI = document.getElementsByTagName('li');
const SECOND_CHILD = document.querySelector('ul>li:nth-child(2)');


//색넣기
//CSS_CLS_ALL.forEach(node => node.style.color = 'red')

// TITLE.textContent = '변경';

//innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a = href"">링크</a>';

//setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '입력해라' );
INPUT1.setAttribute('name', 'input1' );

//removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');


//요소 스타일링
//style : 인라인으로 스타일 추가
TITLE.style.color = 'blue';
TITLE.removeAttribute('style');

//classList : 클래스로 스타일 추가 및 삭제
// .add() : 추가
TITLE.classList.add('font-color-red'); //1개만 추가
//TITLE.classList.add('font-color-red', 'css2', 'css3', 'css4'); //여러개 추가

//classList.remove() : 제거
TITLE.classList.remove('font-color-red');

//classList.toggle() : 해당 클래스를 토글

//TITLE.classList.toggle('none');

//리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정

// CSS_CLS_ALL.foreach((node,index) => {
//     if(index % 2 === 0){
//         node.style.color = 'red';
//     }else{
//         node.style.color = 'blue';
//     }
// });
const LI = document.querySelectorAll('li');
LI.forEach((node, index) => {
    if(index % 2 === 0){
        node.style.color = 'red';
    }else{
        node.style.color = 'blue';
    }
});
