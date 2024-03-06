-- SUB QUERY
-- 쿼리 안에 또다른 쿼리가 들어있는 쿼리

-- WHERE 절에 사용하는 서브쿼리
-- d001부서장의 사원정보 출력
-- 단일 행 서브쿼리 : 비교 연산자를 사용할때는 레코드가 1건이여야 한다.
SELECT *
FROM employees
WHERE 
	emp_no = (
	SELECT
		emp_no
	FROM dept_manager
	WHERE
		dept_no = 'd001'
	AND to_date >= NOW()
);

-- 모든 부서의 부서장의 사원 정보를 출력
SELECT *
FROM employees
WHERE 
	emp_no IN (SELECT 
	emp_no
FROM dept_manager
WHERE 
	to_date >= NOW()
);

-- d001 부서에 속했던 적이 있는 사원의 사번과 풀네임을 출력
SELECT
	emp_no, CONCAT_WS (' ', first_name, last_name) AS FullName
FROM employees
WHERE
	emp_no IN (
	SELECT emp_no
	FROM dept_emp
	WHERE dept_no = 'd001'
	);

-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력
SELECT
	emp_no, CONCAT_WS (' ', first_name, last_name) AS FullName, birth_date
FROM employees
WHERE
	emp_no IN (
	SELECT emp_no
	FROM titles
	WHERE title = 'Senior Engineer'
	AND to_date >= NOW()
	);
	
-- 다중열 서브쿼리, 연관 서브쿼리
SELECT dpe.*
FROM dept_emp dpe
WHERE (dpe.dept_no, dpe.emp_no) IN (
	SELECT 
		dpm.dept_no, dpm.emp_no ,-- dpe.a (dept_emp.a)
	FROM dept_manager as dpm
	WHERE dpe.emp_no = dpm.emp_no
);


-- SELECT에 사용하는 서브쿼리
-- 사원의 사원번호, 평균급여, 사원명
SELECT 
	employees.emp_no
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE salaries.emp_no = employees.emp_no
	) avg_sal
	,employees.first_name
FROM employees;


-- FROM절에서 사용되는 서브쿼리
-- FROM에서 사용되는 서브쿼리는 임시 테이블이라서 AS로 별칭을 지정해서 불러오지 않으면 작동되지 않는다.
SELECT tmp.*
FROM (
	SELECT emp_no, birth_date
	FROM employees) tmp
;


-- INSERT 문에서 서브쿼리 사용
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES (
	(SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	, 19980714
	, 'Noh'
	, 'Gyeongho'
	, 'M'
	, NOW()
	);
-- hire_date의 타입은YYYYMMDD였는데 내가 values에서 hire_date를 now()로 넣어서 경고창이 떴음.
-- 커맨드 창에서 작업시 오류가 발생할 수 있기 때문에 데이터타입을 고려해서 짜는 습관이 필요하다.


-- UPDATE문에서 사용
UPDATE employees
SET 
	first_name = (
		SELECT left(title,10)
		FROM titles
		WHERE emp_no = 10001
			AND to_date >= NOW()
	)
WHERE emp_no = 500000;
	

