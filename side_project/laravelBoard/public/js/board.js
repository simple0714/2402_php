//상세 모달 처리
document.querySelectorAll(".my-btn-detail").forEach(item => {
    item.addEventListener('click', () => {
        const url = '/board/' + item.value;
        
        
        axios.get(url)
        .then(response => {
            const data = response.data;
            
            const btnDelete = document.querySelector('#my-btn-delete'); //삭제 버튼
            const btnUpdate = document.querySelector('#my-btn-update'); //수정 버튼
            const modalTitle = document.querySelector('.modal-title'); //제목 노드
            const modalContent = document.querySelector('.modal-body > p'); //내용 노드
            const modalImg = document.querySelector('.modal-body > img'); //이미지 노드

            //상세 정보 셋팅
            modalTitle.textContent = data.title;
            modalContent.textContent = data.content;
            modalImg.src = data.img;
            
            if(data.auth_id !== data.user_id) {
                btnDelete.classList.add('d-none');
                btnDelete.value = '';
            } else {
                btnDelete.classList.remove('d-none');
                btnDelete.value = data.id;
            }

            // //  삭제버튼 처리
            // if(data.auth_id !== data.user_id) {
            //     btnDelete.classList.remove('d-none');
            //     btnDelete.value = '';
            // } else {
            //     btnDelete.classList.add('d-none');
            //     btnDelete.value = data.id;
            // }
            

        })
        .catch(err => console.log(err));
    });
});

//삭제 처리(체이닝 작성해보기)
document.querySelector('#my-btn-delete').addEventListener('click', MyDeleteCard);

function MyDeleteCard(e) {
    const url = '/board/' + e.target.value; //url
    // console.log(url);
    //Ajax 처리
    axios.delete(url)
    .then(response => {
        // console.log(response);
        if(response.data.errorFlg) {
            //삭제 이상 발생
            alert('삭제에 실패했습니다');
        } else {
            //정상처리
            const main = document.querySelector('main');
            const card = document.querySelector('#card' + response.data.deletedId);
            main.removeChild(card);
        }
    })
    .catch();
}