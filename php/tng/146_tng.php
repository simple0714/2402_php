<?php 
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$pw = isset($_GET["pw"]) ? $_GET["pw"] : "";
//삼항연산자
//변수 = 조건식 ? (참일경우) : (거짓일 경우);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>로그인</h1>
    <form action="/146_tng.php" method="get">
        <fieldset>
            <legend>로그인</legend>
            <label for="id">ID</label>
            <input type="text" name="id" id="id" >
            <br>
            <label for="pw">PW</label>
            <input type="password" name="pw" id="pw">
            <br>
            <button type="submit">로그인</button>
        </fieldset>
    </form>
    <?php
            if($id && $pw !== "") {
                echo "<h2>당신의 ID는 $id 입니다.<h2>";
                echo "<h2>당신의 PW는 $pw 입니다.<h2>";
            }
    ?>
</body>
</html>