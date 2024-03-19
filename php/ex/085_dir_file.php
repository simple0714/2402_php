<?php
// 디렉토리 존재여부 체크
if(is_dir("./test")){
    echo "이미 존재하는 디렉토리\n";
}
else {
    echo "없는 디렉토리\n";
}

//디렉토리 생성
$result = mkdir("./test", 777);
if($result) {
    echo "디렉토리 생성 성공\n";
}
else {
    echo "디렉토리 생성 실패\n";
}

//디렉토리 삭제
$result = rmdir("./test");
if($result){
    echo "디렉토리 삭제 성공\n";
}
else {
    echo "디렉토리 삭제 실패\n";
}

//디렉토리 열기 및 읽기
$open_dir = opendir("./"); //디렉토리 열기
while($item = readdir($open_dir)) {
    echo $item."\n";
}

//디렉토리 닫기
closedir($open_dir);

//--------------------

//파일 오픈 
$file = fopen("./999_test.php", "a");
//쓰기 전용으로 만들경우, 불러오려고 하는 파일이 없을경우 생성후 불러오게된다.
//열기 옵션에서 'a'를 가장 많이 사용한다. (a:쓰기 전용으로 열기, 기존내용 보존)
if($file){
    echo "파일 오픈 성공\n";

    ///파일에 데이터 쓰기 
    fwrite($file, "글쓰기 테스\n");

    //파일 닫기
    fclose($file);
}
else {
    echo "파일 오픈 실패\n";
}

//파일 삭제
unlink("./999_test.php");