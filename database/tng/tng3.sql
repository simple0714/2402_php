-- 1.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19980714
	,'Noh'
	,'Gyeongho'
	,'M'
	,20240311
)
;

-- 2.
INSERT INTO salaries (emp_no, salary, from_date, to_date) 
VALUES (500001, 60000, 20240311, 99990101) ;
INSERT INTO titles (emp_no, title, from_date, to_date) 
VALUES (500001, 'Engineer', 20240311, 99990101) ;
INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) 
VALUES (500001, 'd004', 20240311, 99990101) ;

-- 3.	
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19940101
	,'유'
	,'호경'
	,'F'
	,20240311
)
;

INSERT INTO salaries (emp_no, salary, from_date, to_date) 
VALUES (500002, 60000, 20240311, 99990101) ;
INSERT INTO titles (emp_no, title, from_date, to_date) 
VALUES (500002, 'Engineer', 20240311, 99990101) ;
INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) 
VALUES (500002, 'd004', 20240311, 99990101) ;

	
-- 4. 
UPDATE dept_emp 
SET dept_no = 'd009'
WHERE emp_no >= 500001 ;


-- 5.
DELIMITER $$
CREATE TRIGGER trigger_employees_emp_info
BEFORE DELETE 
ON employees 
FOR EACH ROW 
BEGIN
	DELETE FROM titles WHERE emp_no = OLD.emp_no;
END $$
DELIMITER ; 

DELETE FROM employees WHERE emp_no = 500002 ;


-- 6.
UPDATE dept_manager
SET emp_no = 500001
WHERE dept_no = 'd009' AND to_date >= NOW() ; 

-- 7.
UPDATE titles
SET from_date = 20230101
	,to_date = 20240311
WHERE emp_no = 500001; 

INSERT INTO titles (emp_no, title, from_date, to_date) 
VALUES (500001, 'Senior Engineer', 20240311, 99990101) ;

SELECT 
	emp.emp_no
	,CONCAT(first_name, ' ', last_name) AS NAME
FROM 
;

-- 8.
SELECT emp.emp_no AS 사원번호
		,CONCAT(emp.first_name, ' ', emp.last_name) AS 이름
		, sal.salary AS 월급
FROM employees emp
	JOIN salaries sal 
	ON emp.emp_no = sal.emp_no
	AND sal.to_date >= NOW()
WHERE sal.salary = (SELECT MAX(salary) FROM salaries)
   OR sal.salary = (SELECT MIN(salary) FROM salaries)
;
   
-- 9. 
SELECT
	AVG(salary)
FROM salaries
WHERE
	to_date >= 20230901
;

-- 10.
SELECT
	AVG(salary)
FROM salaries
WHERE emp_no = 499975 
;


-- 1.
CREATE TABLE users (
	userid 			INT 					PRIMARY KEY AUTO_INCREMENT
	,username 		VARCHAR(30) 		NOT NULL 
	,authflg			CHAR(1)				DEFAULT '0'
	,birthday		DATE 					NOT NULL 
	,created_at		DATETIME				DEFAULT CURRENT_DATE  
);


-- 2.
INSERT INTO users (username, authflg, birthday, created_at) 
VALUES ('그린', '0', 20240126, 20240311) ;


-- 3.
UPDATE users
SET username = '테스터'
	,authflg = 1	
	,birthday = 20070301
WHERE username = '그린'
; 

-- 4.
DELETE FROM users
WHERE birthday = 20070301
;

-- 5.
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL;

-- 6.
DROP TABLE users ;

-- 7.
SELECT 
	u.username
	,u.birthday
	,r.rankname
FROM users u
	JOIN rankmanagement r
	ON u.userid = r.userid
;
	