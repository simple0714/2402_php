<?php
include("./070_include2.php"); //해당 파일을불러올때 오류여부 상관없이 처리진행
//불러올 php의 위치도 중요하다.
//보통은 최상단에 include파일을 작성해둔다고 한다.
include_once("./070_include2.php"); //해당 파일을 한번만 불러오고 오류여부 상관없이 진행
//include_once는 여러번 작성하더라도 한번만 불러옴
//include_once 불러오는 주소가 틀리더라도 warning만뜨고 진행되므로 주의해야함.
echo my_sum(1, 2);

