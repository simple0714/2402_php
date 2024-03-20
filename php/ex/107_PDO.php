<?php
// DB접속 정보
$dbHost     = "localhost";  //DB Host (원래는 IP주소가 들어간다.)
$dbUser     = "root";       //DB 계정명
$dbPw       = "php505";     //DB 패스워드
$dbName     = "employees";  //DB명
$dbCharset  = "utf8mb4";    //DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset; // dsn

// PDO 옵션
$opt = [
    PDO::ATTR_EMULATE_PREPARES      => false //true면 php, false면 DB. 보안상의 이유로 일반적으로 false설정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION //PDO에서 예외를 처리하는 방식을 지정
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC //DB의 결과를 저장하는 방식을 지정
    // PDO::FETCH_ASSOC : 연상배열로 데이터 fetch
    // PDO::FETCH_OBJ : stdClass객체로 데이터 fetch
];
$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt);



// $sql = " SELECT * FROM employees LIMIT 10 ";
// 관습적으로 보기 편하게 하기 위해 ""안에서 처음과 마지막은 띄우고, 안에서 ;를 쓰지 않는다.(보안이슈)
//쿼리 작성
$sql = 
    " SELECT "
    ." * " 
    ." FROM "
    ."  employees " //한칸 더 띄운 이유는 from의 하위 요소임을 쉽게 보기 위함.
    ." LIMIT "
    //." 10 " //del 240320
    ." 5 " //add 240320
    ;

$stmt = $conn->query($sql); //쿼리 준비 + 실행 둘 다 한번에 하는 메소드
$result = $stmt->fetchAll(); //질의 결과 패치
print_r($result);

//현업에서는 수정의 용이성을 위해 이런 방식으로 작성한다.
//현업에서는 수정을 한다하더라도 기존의 코드를 주석처리할 뿐 지우진 않는다고 한다. 
//주석처리한 코드와 추가한 코드는 주석을 달아준다.

//CONN = 커넥션의 약자
$conn = null; //PDO파기. PDO가 리소스를 많이 잡아먹기 때문에 끝나고 파기를 하는 것이 좋다.