<?php

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
            <a href="./insert.html" class="a_button">글 작성</a>
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
            for($num = 1; $num <=  $max_block_num; $num++){
            ?>
            <a href="./list.php?page=<?php echo $num ?>" class="a_button small_button"><?php echo $num ?></a>
            <?php
            if($cnt) {
                break;
            }
            }

            ?>
            <a href="./list.php?page=<?php echo $next_page_num ?>" class="a_button small_button">다음</a>
        </div>
    </main>
</body>
</html>