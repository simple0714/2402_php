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



//강사님과 함께
const items = document.querySelectorAll('#ul > li');
items.forEach((item, key) => (item.style.color = key % 2 === 0 ? 'red' : 'blue '));

//todo-if문을 사용하는 것이 가독성은 좋지만 한줄로 적을 수 있는 삼항연산자 활용도 연습해볼것. 0424


//-----------------------------------------------
//새로운요소 생성

//createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.innerHTML = '광산게임';

const TARGET = document.querySelector('#ul'); // 삽입할 부모요소 선택

//appendChild(노드) : 해당 부모 노드에 가장 마지막 자식으로 노드 추가
TARGET.appendChild(NEW_LI);

//동일한 형태의 요소를 여러개 추가하는 방법
// for(let i = 0; i < 3; i++) {
//     const NEW_LI = document.createElement('li');
//     NEW_LI.innerHTML = '광산게임';
//     const TARGET = document.querySelector('#ul');
//     TARGET.appendChild(NEW_LI);
// }

//insertBefore(새로운노드, 기준노드) : 해당 부모 노드의 자식인 기준노드 앞에 새로운 노드 추가
const NEW_LI2 = document.createElement('li');
NEW_LI2.innerHTML = '굴착소년쿵'

const hyeunSoo = document.querySelector('#ul > li:nth-child(3)');
TARGET.insertBefore(NEW_LI2, hyeunSoo);

//프리셀을 스페이스와 사과게임 사이에 넣기
const NEW_LI3 = document.createElement('li');
NEW_LI3.innerHTML = '프리셀'
const applegame = document.querySelector('#ul > li:nth-child(5)');
TARGET.insertBefore(NEW_LI3, applegame);

//removeChild(노드) : 해당 부모 노드의 자식을 삭제
TARGET.removeChild(NEW_LI3);
