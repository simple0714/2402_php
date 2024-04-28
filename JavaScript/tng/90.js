function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input-url').value;
    
    // Axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
        console.log(response.data)
    })
    .catch();

}

// 사진 데이터를 화면에 추가 함수
function myMakeImg(data) {
    data.forEach(item => {
        console.log(myMakeImg);
        //부모 요소 접근
        const CONTAINER = document.querySelector('.img-container');

        //박스 생성
        const ADD_BOX = document.createElement('div');
        ADD_BOX.setAttribute('class','img-box');
        CONTAINER.appendChild(ADD_BOX);

        //div img id태그 생성
        const ADD_ID = document.createElement('div');
        ADD_ID.textContent = item.id;
        ADD_ID.setAttribute('id', 'img_id');
        ADD_BOX.appendChild(ADD_ID);
    
        //img태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.setAttribute('class', 'img');

        ADD_BOX.appendChild(ADD_IMG);
    });
}

//api호출 버튼 이벤트
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);

//api불러온거 제거
const BTN_DEL = document.querySelector('#btn-api-del');
BTN_DEL.addEventListener('click', () => {
    const DEL = document.querySelector('.img-container')
    DEL.textContent = "";
});

//마지막으로 추가된 5개의 이미지를 삭제하는 함수
function deleteLastFiveImages() {
    const imgContainer = document.querySelector('.img-container');
    const imgBoxes = imgContainer.querySelectorAll('.img-box');
    console.log(imgBoxes.length)
    
    // 마지막으로 추가된 5개의 이미지를 삭제
    const numberOfImagesToDelete = Math.min(5, imgBoxes.length);
    for (let i = 0; i < numberOfImagesToDelete; i++) {
        imgContainer.removeChild(imgBoxes[imgBoxes.length - 1 - i]);
    }
}

const BTN_DEL5 = document.querySelector('#btn-api-5del');
BTN_DEL5.addEventListener('click', deleteLastFiveImages);