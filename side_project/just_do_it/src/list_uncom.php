<?php
//설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");  // 설정 파일 호출
require_once(FILE_LIB_DB);                              // DB관련 라이브러리
$list_cnt = 5;                                          // 한 페이지 최대 표시 수
$page_num = 1;                                          // 페이지 번호 초기화
$btn_page_cnt = 5;


try {
    //DB Connect 
    $conn = my_db_conn(); //connection 함수 호출
    //파라미터에서 page획득
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;       //now page
    //게시글 수 조회
    $result_board_cnt = db_select_boards_cnt($conn);

    //페이지 관련 설정 세팅
    $max_page_num = ceil($result_board_cnt / $list_cnt);                 // 최대 페이지 수
    $offset = $list_cnt * ($page_num - 1);                              // 오프셋
 
    //페이징
    // $start_page = ceil($page_num / $btn_page_cnt) * $btn_page_cnt -($btn_page_cnt - 1);
    // $end_page = $start_page + ($btn_page_cnt - 1);
    // $end_page = $end_page > $max_page_num ? $max_page_num : $end_page;
    
    //게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset  
    ];
    $result = db_select_boards_uncompleted($conn, $arr_param);

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
    <title>Just do it-uncom</title>
    <link rel="stylesheet" href="./css/wantgohome.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>
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
            <div class="main_midle">
                <p class="tasks">today tasks</p>
            </div>
            <div class="main_nav_list">
                <div class="nav_list_box">
                    <a href="./list_all.php" class="list_text a_all">all</a>
                </div>
                <div class="nav_list_box">
                    <a href="./list_com.php" class="list_text a_com" >completed</a>
                </div>
                <div class="nav_list_box">
                    <a href="./list_uncom.php" class="list_text a_uncom  now_page">uncompleted</a>
                </div>
            </div>
            <div class="item_list">
                <?php
                    foreach($result as $item) {
                        ?>
                    <div class="item">
                        <div class="item_title"><a href="./detail.php?no=<?php echo $item["board_no"] ?>&page=<?php echo $page_num ?>"><?php echo $item["title"] ?></a></div>
                        <div class="item_createdat"><?php echo $item["created_at"] ?></div>
                    </div>
                    <?php
                    }
                    ?>
                <div class="button_list">
                    <a href="./insert.php" class="under_button add button">add</a>
                </div>
            </div>
        </main>
        </div>
    </div>
</body>
</html>