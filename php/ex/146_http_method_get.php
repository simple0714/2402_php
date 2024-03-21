<?php

// localhost/파일명?name=hong&gender=M
// 도메인   /패스  ?파라미터&파라미터2

// print_r($_GET);
// print_r($_GET["name"]);
$question = "";
if(isset($_GET["Q"])){
    $question = $_GET["Q"];
}

//삼항연산자
//변수 = 조건식 ? (참일경우) : (거짓일 경우);
$question = isset($_GET["Q"]) ? $_GET["Q"] : "";

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>검색어를 입력하세요</h1>
    <form action="/146_http_method_get.php" method="get">
        <input type="tel" name="Q">
        <button type="submit">검색</button>
    </form>
    <br>
    <br>
    <?php
        if($question !== "") {
            echo "<h2>당신의 검색어는 $question 입니다.<h2>";
        }
    ?>
</body>
</html>