<?php
// 주석
/**
 * 여러줄
 * 주석
 */

echo "안녕 php";
// echo(구문) : 단순 출력. 현업에서 가장 많이 사용. 빠른 속도.

print("프린트로 출력");
// print(함수) : 단순출력. 함수라 return값이 있음. 따라서 echo보다 상대적으로 느림. 현업에서 잘 사용되지 않음.

var_dump("바덤프로 출력"); //TODO : 나중에 삭제할것.
// var_dump(함수) : 대상의 상세정보까지 출력. return은 없으나 상대적으로 느림. 개발과정에서만 사용.
// var_dump의 경우 실제 사용되는 소스코드에서는 삭제해야 함으로 주석을 달아두었다가 나중에 검색기능으로 todo를 찾아서 제거한다.
// todo코멘트 : 실수를 방지하기 위해 나중에 해야할 일을 작성하는 코멘트.

//breakpoint : 한줄씩 작동되는 것을 확인하기 위해 사용. 다음 코드로 넘어가는 단축키는 F10이다.

echo "1";