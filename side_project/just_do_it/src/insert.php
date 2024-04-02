<?php
//설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리

if(REQUEST_METHOD === "POST") {
    try {
        //파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";       // title 획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // contetn 획득

        //파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ",$arr_err_param));
        }

        //DB connect
        $conn = my_db_conn();  //PDO 인스턴스
        //Transaction
        $conn->beginTransaction();
        //게시글 작성 처리
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        //글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }
        //커밋
        $conn->commit();
        //리스트 페이지로 이동
        header("Location: list_all.php");
        exit;
    } catch (\Throwable $e) {
        if(!empty($conn) && $conn->inTransaction()) {
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
    <title>자세히보기</title>
    <link rel="stylesheet" href="../css/wantgohome.css">
</head>
<body>
    <div class="test">
        <div class="main_body">
        <header>
            <div class="main_head">
                <a href="./list_all.php" class="doit">Just do it</a>
            </div>
        </header>
        <div class="nav_container">
            <div class="container_box button">
                <a href="./list_all.php" >
                    <img class= "image_box"src="../image/free-icon-font-ballot-7653160.png"/>
                </a>
            </div>
            <div class="container_box button">
                <a href="./list_all.php">
                    <img class= "image_box" src="../image/free-icon-font-book-open-cover-7720118.png" />
                </a>
            </div>
            <div class="container_box button">
                <a href="./list_all.php">
                    <img class= "image_box" src="../image/free-icon-font-calendar-clock-7602606.png"  />
                </a>
            </div>
            <div class="container_box button">
                <a href="./list_all.php">
                    <img class= "image_box" src="../image/free-icon-font-piggy-bank-7653269.png" />
                </a>
            </div>
        </div>
        <main>
            <form action="./insert.php" method="post">
                <div class="insert_page_main">
                    <div class="detail_title" >
                        <input type="text" name="title" id="title" class="write">
                    </div>
                    <div>
                        <div class="write_here">
                            <textarea name="content" id="content" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="insert_button_list">
                        <div>
                            <button type="submit" id="submitButton">
                            등록하기
                            </button>
                            <script>
                            // JavaScript를 사용하여 버튼 클릭 이벤트를 처리
                            document.getElementById("submitButton").addEventListener("click", function() {
                                // 버튼이 클릭되었을 때 border를 제거
                                this.style.border = "none";
                            }); 
                            </script>
                        </div>
                        <div class="cancel_button">
                            <a href="./list_all.php" class="button_in button">뒤로가기</a>
                        </div>
                    </div>  
                </div>
            </form>
        </main>
        </div>
    </div>
</body>
</html>