-- INSERT 문 : 신규 데이터 저장
-- INSERT INTO 테이블명(컬럼1, 컬럼2 ...)
-- VALUES (값1, 값2...);
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19980714
	,'hong'
	,'gildong'
	,'M'
	,20230305
);

SELECT* FROM employees WHERE emp_no = 500000;

-- SELECT INSERT (다중 레코드 INSERT): select한 결과를 가지고 insert를 실행
INSERT INTO employees (emp_no,birth_date,first_name,gender,hire_date)
SELECT 
	500000
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
FROM employees
WHERE emp_no = 500000
FROM employees;

-- 신입 사원들의 직책 정보를 select insert를 이용해서 저장
INSERT INTO titles(emp_no, title, from_date,to_date)
SELECT 
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20230305
;

-- 자신의 사원 정보를 사원 테이블에 저장
-- 자신의 직책 정보 저장
-- 자신의 급여 정보 저장

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
	,19980714
	,'Gyeongho'
	,'Noh'
	,'M'
	,20240305
);

INSERT INTO titles (emp_no, title, from_date,to_date)
SELECT 
	500002
	,'noob'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >=20240305
;

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,60022
	,20240305
	,99990101
);

UPDATE employees
SET
	first_name = 'Noh'
	,last_name = 'Gyeongho'
WHERE emp_no=500002
;

UPDATE employees
SET
	first_name = 'Dannz'
	,last_name = 'Gecsel'
WHERE emp_no=50002
;

SELECT*
FROM employees
WHERE emp_no=50002
;