<?php
//세션 명을 지정하는 방법
session_name("login");
//세션 시작 : !!세션 시작 전에 출력 처리가 있으면 안된다
session_start(); //세션 시작(최상단에 작성)
//세션에 데이터 작성
$_SESSION["my_session1"] = "세션1";
