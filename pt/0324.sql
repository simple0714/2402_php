-- 입사일이 1990/01/01 ~ 1995/12/31이고, 성별이 여자인 사원의 정보를 성과 이름 오름차순으로 정렬

SELECT 
	gender 
	,CONCAT_WS (' ',emp.first_name, emp.last_name ) AS NAME
FROM employees emp
WHERE hire_date >= DATE(19900101) AND hire_date <=(19951231)
	and emp.gender = "F"
;

-- 현재 재직중인 직원의 전체  사원수 조회
SELECT COUNT(*)
FROM titles
WHERE to_date >= NOW()
;

-- 각 사원의 최고연봉 중 80000 이상을 조회
SELECT 
	sal.emp_no
	,sal.salary
FROM salaries sal
WHERE sal.salary >= 80000
	AND sal.to_date >= DATE(NOW())
;

-- 재직중인 사원 중 급여 상위 5위까지 조회
SELECT 
	sal.emp_no
	, sal.salary
FROM salaries sal
WHERE to_date >= DATE(NOW())
ORDER BY salary DESC 
LIMIT 5
;

-- 자신의 사원 정보를 사원 테이블에 신입으로 저장
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES (700000, 19980714, "Gyeongho", "Noh", "M", 230814)
;
INSERT INTO titles (emp_no, title,from_date,to_date)
VALUES (700000, "신입",240101,DATE(NOW()))
;

-- 자신의 '신입'인 사원의 직책을 'staff'로 변경
UPDATE titles title
set title = Staff
	,to_date = DATE(NOW())
WHERE title.emp_no = 700000
;

-- 재직중인 여자사원중 생일이 8월인 사원의 사번 찾기
SELECT emp.emp_no
	,emp.gender
	,emp.birth_date
FROM employees emp
	JOIN titles title
	ON emp.emp_no = title.emp_no
WHERE MONTH(emp.birth_date) = 8
	and to_date >= DATE(NOW())
	AND emp.gender = "F"
;

-- 누나꺼
SELECT emp.emp_no
FROM employees emp
    JOIN titles tit
        ON emp.emp_no = tit.emp_no
        AND tit.to_date >= DATE(NOW())
        AND emp.gender = "F"
        AND MONTH(emp.birth_date) = 8;

-- 사원별 급여의 평균을 조회해 주세요.
SELECT 
	emp_no
	,floor(AVG(salary)) AS 평균급여
FROM salaries
WHERE to_date >= DATE(NOW())
GROUP BY emp_no
;

-- 사원별 급여의 평균이 30,000 ~ 50,000인, 사원번호와 평균급여를 조회해 주세요.
SELECT emp.emp_no
	,AVG(sal.salary) AS 평균급여
FROM employees emp
	JOIN salaries sal 
	ON emp.emp_no = sal.emp_no
WHERE to_date >= DATE(NOW())
GROUP BY emp.emp_no
HAVING 평균급여 BETWEEN 30000 AND 50000
;

-- 사원별 급여 평균이 70,000이상인, 사원의 사번, 이름, 성, 성별을 조회해 주세요.
SELECT emp.emp_no
	,CONCAT(last_name, " ", first_name) 이름
	,emp.gender
FROM employees emp
	JOIN salaries sal
	on emp.emp_no = sal.emp_no
GROUP BY emp.emp_no
HAVING AVG(sal.salary) >= 70000
;

-- 현재 직책이 "Senior Engineer"인, 사원의 사원번호와 성을 조회해 주세요.
SELECT emp.emp_no
	,emp.gender
FROM employees emp
	JOIN titles title
	ON emp.emp_no = title.emp_no
WHERE title = "Senior Engineer"
	AND to_date >= DATE(NOW())
;


-- 현재 재직중인 사원 중 <직급이 "Senior Enginner"이고 급여가 60,000 이상>인 사원의 "사원번호", "이름", "입사일", "생일"을 구하시오.
SELECT 
	emp.emp_no
	,CONCAT (first_name, " ", last_name) AS NAME
	,emp.hire_date
	,emp.birth_date
FROM employees emp
	JOIN titles title
	ON emp.emp_no = title.emp_no
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE 
	sal.salary >= 60000
	AND title.title ="Senior Engineer"
	AND sal.to_date >=DATE(NOW())
;
	
-- 현재 재직중인 사원 중 <d001파트의 파트장>의 "직급","사원번호","이름","입사일,"을 구하시오.
SELECT 
	title.title
	,emp.emp_no
	,CONCAT (emp.first_name, " ", emp.last_name) AS NAME
	,emp.hire_date
FROM employees emp
	JOIN titles title
	ON emp.emp_no = title.emp_no
	JOIN dept_manager manager
	ON emp.emp_no = manager.emp_no
WHERE 
	manager.dept_no = "d001"
	AND manager.to_date >= DATE(NOW())
	AND title.to_date >= DATE(NOW())
;

-- 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
INSERT INTO titles (emp_no, title,from_date,to_date)
VALUES (700000, "Senior Engineer",DATE(NOW()),99990101)
;

-- 쿼리 실행 순서를 작성하세요.
-- from -> where -> group by -> having -> select ->order BY -> limit

-- 10481 사원의 풀네임 과거부터 현재까지 급여이력을 출력해주세요.
SELECT 
	CONCAT (emp.first_name, " ", emp.last_name)
	,sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE 
	emp.emp_no = 10481
;
	
	
	
