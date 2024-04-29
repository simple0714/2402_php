// API 호출 버튼 이벤트
const btnAPI = document.querySelector('#btn-api');
btnAPI.addEventListener('click', myGetData);

// API 호출
// async/await로 작성하는 방법
async function myGetData() {
    // url획득
    const url = document.querySelector('#input-url').value;

    // API 호출
    try{
        const response = await axios.get(url);
        myMakeItem(response.data);
    } catch (error) {
        console.log(error);
    }
}

function myMakeItem() {
data.forEach(item => {
    // 아이템을 추가할 부모요소 획득
    const main = document.querySelector('.main');

    // article박스 생성
    const newArticle = document.createElement('div');
    const newArticleId = document.createElement('div');
    const newImg = document.createElement('img');

    //아이템 셋팅
    newArticle.classList = 'article';
    newArticleId.classList = 'div-article-img';
    newImg.classList = 'div-article-img';
    newArticleId.textContent = item.id;
    newImg.src = item.download_url;
    
    // 생성한 요소 결합
    newArticle.appendChild(newArticleId);
    newArticleId.appendChild(newImg);
    main.appendChild(newArticle);
    });
}

const btnMain = document.querySelector('#btn-clear');
btnMain.addEventListener('click', () => {
    // document.querySelector('.main').innerHTML = '';
    // const main = document.querySelector('.main');
    // main.innerHTML = '';

    // 최대 5개까지씩 지우기
    const articleList = document.querySelectorAll('.article');

    for(let i = 0; i < 5; i++) {
        let idx = articleList.length -1 -i; //index 계산
        if(idx < 0) {
            //index가 0보다 작으면 루프 종료
            break;
        } 
        main.removeChild(articleList[idx]); //해당 아티클 삭제
    }
});

