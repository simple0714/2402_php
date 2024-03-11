-- 프로시저 (procedure)
-- 선택실행은 ;기준으로 작동하기 때문에 프로시저를 사용할땐 전체실행으로 실행시켜야
-- 오류가 나지 않는다.


-- 프로시저 정의
delimiter $$
CREATE PROCEDURE test(
)
BEGIN 
	SELECT * 
	FROM employees 
	WHERE emp_no <= 10005;
END $$
delimiter ;


-- 프로시저 호출
CALL test();

-- 프로시저 삭제
DROP PROCEDURE test;