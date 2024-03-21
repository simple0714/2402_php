<?php
print_r($_POST);
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
    <form action="/146_http_method_post.php" method="post">
        <fieldset>
            <legend>로그인</legend>
            <input type="hidden" name="hidden" value="숨겨졌다.">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" >
            <br>
            <label for="pw">PW</label>
            <input type="password" name="pw" id="pw">
            <br>
            <label for="subway">subway</label>
            <input type="checkbox" name="chk[]" id="subway" value="subway">
            <label for="pan">빵</label>
            <input type="checkbox" name="chk[]" id="pan" value="pan">
            <label for="do">도삭면</label>
            <input type="checkbox" name="chk[]" id="do" value="도삭면">
            <br>
            <label for="radio-1">남자</label>
            <input type="radio" name="radio" id="m" value="남자">
            <label for="radio-2">여자</label>
            <input type="radio" name="radio" id="f" value="여자" >
            <br>
            <button type="submit">로그인</button>
        </fieldset>
    </form>
</body>
</html>