<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리

//post 처리
if(REQUEST_METHOD === "POST") {
    try {
        //파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content 획득
        
        //파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            // 예외처리
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
            //implode : 구문을 연결시켜주는 함수
        }

        //DB connect
        $conn = my_db_conn(); //PDO 인스턴스

        //Transaction
        $conn->beginTransaction();

        //게시글 작성 처리
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        // 글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }
        //로직을 잘 짰다면 일어나지 않을 현상이지만,
        //현업에서는 혹시나를 방지하기 위해서 작성해 둔다.

        //커밋
        $conn->commit();

        //리스트 페이지로 이동
        header("Location: list.php");
        exit;

    } catch (\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    } finally {
        if(!empty($conn)) {
            $conn = null;
        }
    }

}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 작성</title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <!-- 헤더 호출 -->
    <main>
      <form action="./insert.php" method="post">
        <div class="main_middle">
            <div class="line_item">
              <label class="line_title" for="title">
                <div>제목</div>
              </label>
                <div class="line_content">
                  <input type="text" name="title" id="title">
                </div>
            </div>
            <div class="line_item">
              <label class="line_title" for="content">
                <div class="line_title_textarea">내용</div>
              </label>
              <div class="line_content">
                <textarea name="content" id="content" rows="10"></textarea>
              </div>
            </div>
        </div>
        <div class="main_bottom">
            <button type="submit" class="a_button small_button">작성</button>
            <button>
              <a href="./insert.php" class="a_button small_button">취소</a>
            </button>
        </div>
      </form>
    </main>
</body>
</html>