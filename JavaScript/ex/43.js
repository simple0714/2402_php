//Axios

// axios.get('')
// .then(response => {
//     console.log(response);
//     console.log(response.data);
// })
// .catch(err => console.log(err))
// .finally(() => console.log('파이널리'))
// ;

function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input-url').value;

    // Axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
    })
    .catch();

}


// 사진 데이터를 화면에 추가 함수
function myMakeImg(data) {
    data.forEach(item => {
        //부모 요소 접근
        const CONTAINER = document.querySelector('.img-container');

        //img태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style.width = '200px';
        ADD_IMG.style.height = '200px';

        CONTAINER.appendChild(ADD_IMG);
    });
}

//api호출 버튼 이벤트
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);