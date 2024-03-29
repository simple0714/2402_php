<?php
//■ MariaDB 관련	
define("MARIADB_HOST", "localhost");    //DB HOST
define("MARIADB_USER", "root");         //DB 유저
define("MARIADB_PASSWORD", "php505");   //DB 비밀번호
define("MARIADB_NAME", "just_do_it");   //DB 명
define("MARIADB_CHARSET", "utf8mb4");   //DB 유니코드
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET);
//상수를 사용하려면 이전에 정의해놔야만 한다. DSN을 나중에 적을 수 있도록 한다.


//■ PHP Path 관련	
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/"); // 웹서버 root 패스
define("FILE_HEADER", ROOT."header.php"); // 헤더 파일 패스
define("FILE_LIB_DB", ROOT."lib/lib_db.php"); // DB 파일 패스

//유저요청 정보
define("REQUEST_METHOD",strtoupper($_SERVER["REQUEST_METHOD"]));