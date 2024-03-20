<?php
//try, catch, finally : 보통 트라이캐치라고 부름
try{
    //예외가 발생할 처리를 작성

    $i = 5/0;
    echo "\$i의 값은 : \n";
    // \뒤의 문자 하나는 문자타입으로 인식하게 한다.
    echo $i;
}
catch(\Throwable $e) {
    //예외가 발생했을 때 처리를 작성
    // $e : 예외가 발생시 담아두는 곳. 여기서 message를 가져올 수 있다.
    // $e는 변수명이기 때문에 아무렇게나 지어줄 수 있지만 관습적으로 e라고 사용하셨다고 한다.
    //(아마 error의 e인듯?)
    echo "예외 발생 : ".$e->getMessage()."\n";
}
//IF문과 비슷하게 catch문을 연달아서 사용가능하기다. \Throwable을 이용하지 않고 예외 및 오류 처리를
//하나씩 체크할때 사용하는 듯 하다.
//단, 이렇게 사용할 시 계층이 낮은 예외처리를 먼저 작성해주어야 한다.
finally {
    //예외 발생 여부와 상관없이 무조건 마지막에 실행
    //finally는 생략 가능
    echo "finally\n";
}

echo "계산 완료";