<?php

function my_db_conn() {
    //설정 정보
    $option = [
        PDO::ATTR_EMULATE_PREPARES          =>      false
        ,PDO::ATTR_ERRMODE                  =>      PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE       =>      PDO::FETCH_ASSOC
    ];

    //return
    return new PDO(MARIADB_DSN,MARIADB_USER,MARIADB_PASSWORD, $option);
}

function db_select_boards_cnt(&$conn) {
    $sql = 
    " SELECT "
    ." COUNT(board_no) as cnt "
    ." FROM "
    ."  boards "
    ." WHERE "
    ."  deleted_at IS NULL "
;
    //Query 실행
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll();

    //return
    return (int)$result[0]["cnt"];
}
//pk로 게시글 정보 조회
function db_select_boards_no(&$conn, &$array_param) {
    $sql =
        " SELECT "
        ." 	board_no "
        ." 	,title "
        ." 	,content "
        ." 	,created_at "
        ." FROM	 "
        ." 	boards "
        ." WHERE	 "
        ." 	user_no = :user_no "
        ;
   //Query 실행
   $stmt  = $conn->prepare($sql);
   $stmt->execute($array_param);
   $result = $stmt->fetchAll();

   //리턴
   return $result;
}

function db_select_boards_paging(&$conn, &$array_param) {
    // sql 작성
    $sql = 
        "SELECT	 "
        ." 	board_no "
        ." 	,title "
        ." 	,created_at "
        ." FROM	 "
        ." 	boards "
        ." WHERE	 "
        ." 	deleted_at IS NULL "
        ." ORDER BY	 "
        ." 	board_no DESC "
        ." LIMIT :list_cnt OFFSET :offset " 
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    //리턴
    return $result;
}
function db_select_boards_completed(&$conn, &$array_param) {
    // sql 작성
    $sql = 
        "SELECT	 "
        ." 	board_no "
        ." 	,title "
        ." 	,created_at "
        ." FROM	 "
        ." 	boards "
        ." WHERE	 "
        ." 	deleted_at IS NULL "
        ." and "
        ."  task = 1"
        ." ORDER BY	 "
        ." 	board_no DESC "
        ." LIMIT :list_cnt OFFSET :offset " 
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    //리턴
    return $result;
}
function db_select_boards_uncompleted(&$conn, &$array_param) {
    // sql 작성
    $sql = 
        "SELECT	 "
        ." 	board_no "
        ." 	,title "
        ." 	,created_at "
        ." FROM	 "
        ." 	boards "
        ." WHERE	 "
        ." 	deleted_at IS NULL "
        ." and "
        ."  task = 0 "
        ." ORDER BY	 "
        ." 	board_no DESC "
        ." LIMIT :list_cnt OFFSET :offset " 
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

    //리턴
    return $result;
}










?>