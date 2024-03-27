<?php
//설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리

try {
    //DB Connect 
    $conn = my_db_conn();                               //PDO 인스턴스 생성

    //Method 체크
    if(REQUEST_METHOD === "GET"){
        // 게시글 데이터 조회 
        //파라미터 획득
        $no = isset($_GET["no"]) ? ($_GET["no"]) : "";                      //no획득
        $page = isset($_GET["page"]) ? ($_GET["page"]) : "";                //page 획득

        $arr_err_param = [];
        //에러를 담을 빈 배열 만들기
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0 ) {
        //$arr_err_param이 0보다 크다는 뜻은 빈구문이라는 뜻. => 오류다
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
            //implode : 구문을 연결시켜주는 함수
        }
        
        //게시글 정보 획득
        $arr_param = [
            "no" => $no
        ];
        $result = db_select_boards_no($conn, $arr_param);
        if(count($result) !== 1) {
            throw new Exception("Select Boards no count");
        }

        //아이템 셋팅
        $item = $result[0];
    }
    else if (REQUEST_METHOD === "POST") {
        //파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : "";

        $arr_err_param = [];
        //에러를 담을 빈 배열 만들기
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if(count($arr_err_param) > 0 ) {
        //$arr_err_param이 0보다 크다는 뜻은 빈구문이라는 뜻. => 오류다
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
            //implode : 구문을 연결시켜주는 함수
        }
        
        //Transaction 시작 
        $conn->beginTransaction();

        //게시글 정보 삭제
        $arr_param = [
            "no" => $no
        ];
        $result = db_delete_boards_no($conn, $arr_param);

        // 삭제 : 예외 처리
        if($result !== 1) {
            throw new Exception("Delete Boards no count");
        }

        //commit
        $conn->commit();

        // 리스트 페이지로 이동처리
        header("Location: list.php");
        exit;
    }
} catch (\Throwable $e) {
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
}finally {
    //PDO 파기
    if(!empty($conn)) {
        $conn = null;
    }
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삭제 페이지
    </title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>

    <main>
        <div class="center">
        <p>
          삭제하면 영구적으로 복구 할 수 없습니다.
          <br>
          정말로 삭제 하시겠습니까?
        </p>
        <div class="main_middle">
            <div class="line_item">
              <div class="line_title">게시글 번호</div>
              <div class="line_content"><?php echo $item["no"] ?></div>
            </div>
            <div class="line_item">
              <div class="line_title">제목</div>
              <div class="line_content"><?php echo $item["title"] ?></div>
            </div>
            <div class="line_item">
              <div class="line_title">내용</div>
              <div class="line_content"><?php echo $item["content"] ?></div>
            </div>
            <div class="line_item">
              <div class="line_title">작성일자</div>
              <div class="line_content"><?php echo $item["created_at"] ?></div>
            </div>
        </div>
        <form action="./delete.php" method="post">
            <div class="main_bottom">
                <input type="hidden" name="no" value="<?php echo $no; ?>">
                <button type="submit" class="a_button small_button">동의 </button>
                <a href="./detail.php?no=<?php echo $no ?>&page=<?php echo $page?>" class="a_button small_button">취소</a>
            </div>
        </form>
    </main>
</body>
</html>