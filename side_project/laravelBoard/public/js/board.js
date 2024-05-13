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
                btnDelete.value = data.b_id;
            }

            // if(data.login_u_id === data.u_id) {
            //     btnUpdate.classList.remove('d-none');
            //     btnUpdate.value = '';
            // } else {
            //     btnUpdate.classList.add('d-none');
            //     btnUpdate.value = data.b_id;
            // }

        })
        .catch(err => console.log(err));
    });
});

//삭제 처리(async로 작성해보기)
// document.querySelector('#my-btn-delete').addEventListener('click', myDeleteCard);

// async function myDeleteCard(e) {
//     const url = '/board/delete'; //url설정

//     const data = new FormData(); //form설정
//     data.append('b_id', e.target.value);
//     try {
//         const responese = await axios.post(url, data);
//         console.log(responese.data);

//         if(responese.data.errorFlg) {
//             //에러일 경우 처리 
//             alert('삭제 실패 했습니다');
//         } else {
//             //정상일 경우
//             const main =document.querySelector('main'); // 부모요소
//             const card = document.querySelector('#card' + responese.data.b_id); //삭제할 요소 
//             main.removeChild(card);
            
//         }
//     } catch (error) {
//         console.log(error);
//     }
//}