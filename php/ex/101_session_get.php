<?php
session_start("login");
//저장된 세션 데이터 획득
echo $_SESSION["my_session1"];
