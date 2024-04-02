<?php
//설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리

try {
    //DB Connect
    $conn = my_db_conn();                               //PDO 인스턴스 생성

    // 게시글 데이터 조회 
    //파라미터 획득
    $no = isset($_GET["board_no"]) ? ($_GET["board_no"]) : "";          //no획득
    $page = isset($_GET["page"]) ? ($_GET["page"]) : "";                //page 획득
    //여기서 파라미터 작동 안하면 no -> board_no로 수정해보기

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
    
    //게시글 정보 획득
    $arr_param = [
        "board_no" => $no
    ];
    $result = db_select_boards_no($conn, $arr_param);
    if(count($result) !== 1) {
        throw new Exception("Select Boards no count");
    }

    //아이템 셋팅
    $item = $result[0];


} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
}finally {
    //PDO파기
    if(!empty($conn)) {
        $conn = null;
    }
}

if(REQUEST_METHOD === "POST") {

	try {
		//파라미터 획득
		$no = isset($_POST["board_no"]) ? trim($_POST["board_no"]) : "";       
		$page = isset($_POST["page"]) ? trim($_POST["page"]) : "";      

		// 파라미터 에러 체크
        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
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
            "board_no" => $no
        ];
        $result = db_insert_tasks($conn, $arr_param);
        // $arr_param 다시 넣거 todo

        //글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }
        //커밋
        $conn->commit();
        //리스트 페이지로 이동
        header("Location: list_all.php?board_no={$no}&page={$page}");
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
        <form action="./detail.php?board_no=<?php echo $no; ?>&page=<?php echo $page; ?>" method="POST">
            <input type="hidden" name="board_no" value="<?php echo $item["board_no"]; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <div class="insert_page_main">
                <div class="detail_title">
                    <p class="in_detail_title"><?php echo $item["title"] ?></p>
                    <p class="in_detail_title"><?php echo $item["created_at"] ?></p>
                </div>
                <div class="content_box">
                    <div class="write_here detail_content">
                        <?php echo $item["content"] ?>
                    </div>
                </div>
                <div class="insert_button_list">
                    <div class="insert_button">
                    <a href="./update.php?board_no=<?php echo $item["board_no"]; ?>&page=<?php echo $page; ?>" class="button_in button">수정하기</a>
                    </div>
                    <!-- <form action="./detail.php" method="post"> -->
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
                    <!-- </form> -->
                    <div class="delete_button">
                        <a href="./delete.php" class="button_in button">삭제하기</a>
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