-- 내장함수(Fuction)
-- 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입), CONVERT(값, 데이터타입)
SELECT 123, CAST(123 AS CHAR(3)), CONVERT(123, CHAR(3));

-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참이면 참일 때, 거짓이면 거짓을때를 출력
SELECT emp_no, gender, IF(gender = 'M', '남자', '여자')
FROM employees;

-- 급여가 80000 이상인 사원은 '고소득자' 아니면'그냥저냥'
SELECT  emp_no,salary, IF(salary >= 80000, '고소득자','그냥저냥') salary
FROM salaries
WHERE to_date >= NOW();