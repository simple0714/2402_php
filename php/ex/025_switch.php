<?php
//switch
$food = "피자";
switch($food){
    case "김밥":
        echo "한식";
        break;
    case "피자": //여러 조건들에 똑같은 처리를 해주고 싶을때 이런식으로 case를 작성하면 된다.*
    case "햄버거":
        echo "양식";
        break;
    default:
        echo "기타";
        break; //default도 없어도 되지만 관습적으로 적어준다.
}
//*단 이렇게 여러 조건이 들어갈 경우 if문을 사용하는 것이 더 선호된다고 한다.
//php는 case에 비교연산자가 들어갈 수 있다.
//다만 그렇게 사용하게 될 경우 가독성이 떨어지고 분석이 어렵기 때문에,
//if를 사용하는것이 더 좋다고 한다.(근데 내 생각도 그럼ㅋㅋ)
echo "\n \n \n";
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.

$rank = "등";
switch($rank){
    case"1등":
        echo "금상";
        break;
    case"2등":
        echo "은상";
        break;
    case"3등":
        echo "동상";
        break;
    case"4등":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}
echo "\n \n \n";

// 위에 프로그램을 if문으로 변경해주세요.
$rank = 5;
if($rank === 1) {
    echo "금상";
}
else if($rank === 2) {
    echo "은상";
}
else if($rank === 3) {
    echo "동상";
}
else if($rank === 4) {
    echo "장려상";
}
else {
    echo "노력상";
}