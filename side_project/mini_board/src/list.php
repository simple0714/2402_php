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

    //파라미터에서 page 획득
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;         //$now_page 

    //게시글 수 조회
    $result_board_cnt = db_select_boards_cnt($conn);

    //페이지 관련 설정 세팅
    $max_page_num = ceil($result_board_cnt / $list_cnt);                 // 최대 페이지 수
    $offset = $list_cnt * ($page_num - 1);                              // 오프셋
    $prev_page_num = ($page_num - 1) < 1 ? 1 : ($page_num - 1);         // 이전 버튼 페이지 번호
    $next_page_num = ($page_num + 1) > $max_page_num ? $max_page_num : ($page_num + 1); // 다음 버튼 페이지 번호


    //페이징
    
    $start_page = ceil($page_num / $btn_page_cnt) * $btn_page_cnt -($btn_page_cnt - 1);
    $end_page = $start_page + ($btn_page_cnt - 1);
    $end_page = $end_page > $max_page_num ? $max_page_num : $end_page;
    
    //게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset  
    ];
    $result = db_select_boards_paging($conn, $arr_param);

} catch (\Throwable $e) {
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
    <title>mini Board</title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <?php require_once(FILE_HEADER); ?>
    <!-- 헤더 호출 -->
    <main>
        <div class="main_top">
            <a href="./insert.php" class="a_button">글 작성</a>
        </div>
        <div class="main_middle">
            <div class="item list_head">
                <div class="board_num">게시글 번호</div>
                <div class="board_title">게시글 제목</div>
                <div class="board_createdat">작성일자</div>
            </div>
            <?php
            foreach($result as $item) {
            ?>
                <div class="item">
                    <div class="item_num"><?php echo $item["no"] ?></div>
                    <div class="item_title"><a href="./detail.php?no=<?php echo $item["no"] ?>&page<?php $page_num ?>"><?php echo $item["title"] ?></a></div>
                    <div class="item_createdat"><?php echo $item["created_at"] ?></div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="main_bottom">
            <a href="./list.php?page=<?php echo $prev_page_num ?>" class="a_button small_button">이전</a>
            <?php
            for($i = $start_page; $i <= $end_page; $i++){
            ?>
            <a href="./list.php?page=<?php echo $i ?>" class="a_button small_button <?php echo $i == $page_num ? "test" : ""; ?>"><?php echo $i ?></a>
            <?php
            }
            ?>
            <a href="./list.php?page=<?php echo $next_page_num ?>" class="a_button small_button">다음</a>
        </div>
    </main>
</body>
</html>