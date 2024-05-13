document.querySelector('#btn-chk-email').addEventListener('click', () => {
    const email = document.querySelector('#u_email').value;
    const url = '/user/email';
    const btnComplete = document.querySelector('#my-btn-complete');
    // 폼 데이터 생성
    const formData = new FormData();
    formData.append('u_email', email);
    
    axios.post(url, formData)
    .then(res => {
        const errMsg = document.querySelector('#div-error-msg');
        const printChkEmail = document.querySelector('#print-chk-email');
        if(res.data.errorFlg) {
            // 이메일 체크 실패
            errMsg.innerHTML = res.data.errorMsg.join('<br>');
            printChkEmail.textContent = '사용 불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 이메일 체크 성공 처리
            errMsg.innerHTML = "";
            printChkEmail.textContent = '사용 가능 ';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }
    })
    .catch(err => console.log(err));
});