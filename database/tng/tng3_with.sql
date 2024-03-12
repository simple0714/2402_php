-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES(500002, 20010203, 'kim', 'YY', 'M', DATE(NOW()));

-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO salaries (emp_no, salary, from_date, to_date)
VALUES (500002, 30000, DATE(NOW()), 99990101);
INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES (500002, 'Staff', DATE(NOW()), 99990101);
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES (500002, 'd001', DATE(NOW()), 99990101);

-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES(500003, 20010102, 'Park', 'YY', 'M', DATE(NOW()))
,(500004, 19990101, 'Lee', 'YY', 'M', DATE(NOW()));

INSERT INTO salaries (emp_no, salary, from_date, to_date)
VALUES (500003, 30000, DATE(NOW()), 99990101)
,(500004, 30000, DATE(NOW()), 99990101);

INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES (500003, 'Staff', DATE(NOW()), 99990101)
,(500004, 'Staff', DATE(NOW()), 99990101);

INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES (500003, 'd001', DATE(NOW()), 99990101)
,(500004, 'd001', DATE(NOW()), 99990101);

-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET to_date = DATE(NOW())
WHERE emp_no IN (500002, 500003, 500004)
;
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES 
(500002, 'd009', DATE(NOW()), 99990101)
,(500003, 'd009', DATE(NOW()), 99990101)
,(500004, 'd009', DATE(NOW()), 99990101)
;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM titles WHERE emp_no IN (500003, 500004);
DELETE FROM salaries WHERE emp_no IN (500003, 500004);
DELETE FROM dept_emp WHERE emp_no IN (500003, 500004);
DELETE FROM employees WHERE emp_no IN (500003, 500004);

-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET to_date = DATE(NOW())
WHERE dept_no = 'd009'
	AND to_date > DATE(NOW())
;
INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
VALUES ('d009', 500002, DATE(NOW()), 99990101);

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET to_date = DATE(NOW())
WHERE emp_no = 500002
;
INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES(500002, 'Senior Enginner', DATE(NOW()), 99990101)
;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT emp.emp_no AS 사원번호
		,CONCAT(emp.first_name, ' ', emp.last_name) AS 이름
FROM employees emp
	JOIN salaries sal 
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())
WHERE sal.salary IN (
	(SELECT MAX(salary) FROM salaries WHERE to_date > DATE(NOW()))
	,(SELECT MIN(salary) FROM salaries WHERE to_date > DATE(NOW()))
)
;


SELECT 
	emp.emp_no AS 사원번호
	,CONCAT(emp.first_name, ' ', emp.last_name) AS 이름
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())
	JOIN (select
				MAX(salary) max_sal
				,MIN(salary) min_sal
			FROM salaries
			WHERE to_date > DATE(NOW())
			) minmax_sal
		ON sal.salary IN (minmax.sal.max_sal, minmax.sal.min_sal)
;


-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary)
FROM salaries
WHERE
	to_date >= 20230901
;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	AVG(salary)
FROM salaries
WHERE emp_no = 499975 
;

-- 표 1
CREATE TABLE users (
	userid 			INT 					PRIMARY KEY AUTO_INCREMENT
	,username 		VARCHAR(30) 		NOT NULL 
	,authflg			CHAR(1)				DEFAULT '0'
	,birthday		DATE 					NOT NULL 
	,created_at		DATETIME				DEFAULT CURRENT_TIMESTAMP()  
);

-- 표 2
INSERT INTO users (username, authflg, birthday, created_at) 
VALUES ('그린', '0', 20240126, 20240311) ;

-- 표 3
UPDATE users
SET username = '테스터'
	,authflg = 1	
	,birthday = 20070301
WHERE userid = 1
; 

-- 표 4
DELETE FROM users
WHERE userid = 1
;

-- 표 5
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';

-- 표 6
DROP TABLE users ;

-- 표 7
SELECT 
	u.username AS 유저명
	,u.birthday AS 생일
	,r.rankname AS 랭크명
FROM users u
	JOIN rankmanagement r
	ON u.userid = r.userid
;
	