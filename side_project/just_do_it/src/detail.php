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
                        <a href="./update.php" class="button_in button">수정하기</a>
                    </div>
                    <div class="delete_button">
                        <a href="./delete.php" class="button_in button">삭제하기</a>
                    </div>
                    <div class="cancel_button">
                        <a href="./list_all.php" class="button_in button">뒤로가기</a>
                    </div>
                </div>  
            </div>
        </main>
        </div>
    </div>
</body>
</html>