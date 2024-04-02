<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리


try {
    //DB connect
    $conn = my_db_conn(); // PDO인스턴스 생성    

    if(REQUEST_METHOD === "GET") {
        //파라미터 획득
        $no = isset($_GET["board_no"]) ? ($_GET["board_no"]) : "";                      //no획득
        $page = isset($_GET["page"]) ? ($_GET["page"]) : "";                //page 획득

        $arr_err_param = [];
        //에러를 담을 빈 배열 만들기
        if($no === "") {
            $arr_err_param[] = "board_no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0 ) {
        //$arr_err_param이 0보다 크다는 뜻은 빈구문이라는 뜻. => 오류다
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
            //implode : 구문을 연결시켜주는 함수
        }
        //게시글 정보(no) 획득
        $arr_param = [
            "board_no" => $no
        ];
        $result = db_select_boards_no($conn, $arr_param);
        if(count($result) !== 1) {
            throw new Exception("Select Boards no count");
        }
        //(no)아이템 셋팅
        $item = $result[0];

    }else if(REQUEST_METHOD === "POST") {
        //파라미터 획득
        $no = isset($_POST["board_no"]) ? ($_POST["board_no"]) : "";                      //no획득
        $page = isset($_POST["page"]) ? ($_POST["page"]) : "";                //page 획득
        $title = isset($_POST["title"]) ? ($_POST["title"]) : "";             //title 획득
        $content = isset($_POST["content"]) ? ($_POST["content"]) : "";       //content 획득

        $arr_err_param = [];
        //에러를 담을 빈 배열 만들기
        if($no === "") {
            $arr_err_param[] = "board_no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0 ) {
        //$arr_err_param이 0보다 크다는 뜻은 빈구문이라는 뜻. => 오류다
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
            //implode : 구문을 연결시켜주는 함수
        }
        //Transaction 시작
        $conn->beginTransaction();
        
        //게시글 수정 처리
        $arr_param = [
            "board_no" => $no
            ,"title" => $title
            ,"content" => $content
        ];

        $result = db_update_boards_no($conn, $arr_param);
        
        //수정 예외 처리
        if($result !== 1 ) {
            throw new Exception("Update Boards no count");
        }
        //commit
        $conn->commit();

        //상세 페이지로 이동
        header("Location: detail.php?board_no={$no}&page=".$page);
        // {}를 이용하거나 연결연산자 dot을 이용.
        exit;
    }
} catch (\Throwable $e) {
    if(!empty($conn) && $conn->inTransaction()){
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
}finally { //exit가 실행되더라도 finally는 무조건 실행된다. 
    //try-catch-finally 찾아볼것
    //PDO파기
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
    <title>수정하기</title>
    <link rel="stylesheet" href="../css/wantgohome.css">
</head>
<body>
    <div class="test">
        <div class="main_body">
        <header>
            <div class="main_head">
                <h1 class="doit">Just do it</h1>
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
        <form action="./update.php" method="post">
            <input type="hidden" name="board_no" value="<?php echo $item["board_no"]; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <div class="insert_page_main">
                <div class="detail_title">
                    <p class="in_detail_title"><?php echo $item["title"] ?></p>
                    <p class="in_detail_title"><?php echo $item["created_at"] ?></p>
                </div>
                <div>
                    <textarea name="" id="insert_text" class="write_here"><?php echo $item["content"]; ?></textarea>
                </div>
                <div class="insert_button_list">
                    <div> 
                        <input type="hidden" name="board_no" value="<?php echo $item["board_no"]; ?>">
                        <button type="submit" id="submitButton">완료하기</button>
                            <script>
                            // JavaScript를 사용하여 버튼 클릭 이벤트를 처리
                            document.getElementById("submitButton").addEventListener("click", function() {
                                // 버튼이 클릭되었을 때 border를 제거
                                this.style.border = "none";
                            }); 
                            </script>
                    </div>
                    <div class="cancel_button">
                        <a href="./list_all.html" class="button_in button">뒤로가기</a>
                    </div>
                </div>  
            </div>
        </form>
        </main>
        </div>
    </div>
</body>
</html>