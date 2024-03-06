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

-- IFNULL(수식1, 수식2) : 존재하지 않는 데이터를 시각적으로 보기위해 사용
-- 수식1이  NULL이면 수식2를 반환
-- 수식1이 NULL이 아니면  수식2를 반환
SELECT IFNULL('11', '22');
SELECT IFNULL(NULL, '22');

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2가 같으면 NULL을 반환, 다르면 수식1을 반환
SELECT NULLIF(1, 1), NULLIF(1, 2);

-- *CASE ~ WHEN ~ELSE ~END : 다중분기를 위해 사용
SELECT
	emp_no
	,gender
	,case gender
		when 'M' then '남자'
		when 'F' then '여자'
		ELSE '무성'
	END ko_gender
FROM employees;

-- ''공백과 NULL은 완전 다른 개념이다. 
-- 공백은 방은 있으나 안에 내용이 없는 느낌이고, NULL은 방조차 존재하지 않는 상태이다.
-- 따라서 case~when 함수를 사용할 때 when에 ''을 넣어서 검색이 가능하다.

-- 문자열 함수
-- 문자열 연결 CONCAT, CONCAT_WS(구분자, 값1, 값2, ...)
SELECT CONCAT_WS(',',11, 22);
-- 사원번호, 생일, 풀네임, 성별, 입사일자 출력
SELECT 
	emp_no
	,birth_date
	,CONCAT_WS (' ', first_name, last_name) AS FullName
	,gender
	,hire_date
FROM employees;

-- FORMAT(숫자, 소숫점 자리수)
-- 숫자에 ','를 넣어 주고 소수점 자리수까지 표현
SELECT FORMAT(1234567.2553214, 2);

-- lEFT(문자열, 길이) : 문자열의 왼쪽부터 길이만큼 잘라서 반환
-- RIGHT(문자열, 길이) : 문자여르이 오른쪽부터 길이만큼 잘라서 반환
SELECT LEFT('abcdefg',2), RIGHT('abcdefg', 2);

-- SUBSTRING(문자열, 시작위치, 길이)
-- 문자열을 시작위치에ㅓ 길이만큼 잘라 반환
SELECT SUBSTRING('abcdef', 3, 2);

-- SUBSRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째 이후를 버림
SELECT SUBSTRING_INDEX('test.blade.txt', '.', 2);
-- 횟수에 -를 붙이면 오른쪽부터 구분자가 횟수번째 이후를 버린다.
SELECT SUBSTRING_INDEX('test.blade.txt', '.', -1);

-- UPPER(문자열), LOWER(문자열)
SELECT UPPER ('asdgDD'), LOWER ('ASDFGH');

-- LPAD(문자열, 길이, 채울 문자열)
-- 채울 문자열을 길이만큼 왼쪽에 삽입해서 반환
SELECT LPAD(1, 10, '0');
-- RPAD(문자열, 길이, 채울문자열)
-- 채울 문자열을 길이만큼 오른쪽에 삽입해서 반환
SELECT RPAD(12, 10, '0');

-- *TRIM(문자열) : 좌우의 공백을 제거
SELECT '        asdfasd     ', TRIM('        asdfasd     ');

-- 수학함수(리턴되는 데이터 타입이 숫자이다)
-- CEILING(값) : 올림
-- ROUND(값) : 반올림
-- FLOOR(값) : 버림
SELECT CEILING (1.4), ROUND (1.4), FLOOR(1.9);
-- TRUNCATE(값, 정수)
-- 소수점 기준으로 정수 위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.123, 1);

-- 날짜/ 시간 함수
-- NOW() : 현재 날짜/시간을 반환(YYYY-MM_DD hh:mi:ss)
SELECT NOW();
-- DATE(데이트형식 값) : 해당 값을 YYYY-MM-DD로 변환
SELECT DATE(NOW());
-- ADDDATE(기준날짜, INTERVAL 추가할 날짜/시간)
-- 기준날짜에 추가할 날짜/ 시간을 추가해서 반환
SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);
SELECT ADDDATE(NOW(), INTERVAL -1 MONTH);

-- 집계함수
-- count() : 검색결과의 레코드 수를 출력
-- * = NULL을 포함한 모든 레코드 수를 출력
-- 컬럼 = NULL을 제외한 레코드 수를 출력
SELECT
	emp_no
	,COUNT(*)
	,COUNT(to_date)
FROM salaries
GROUP BY emp_no;


-- 순위함수
-- RANK() OVER(ORDER BY 컬럼 DESC/ASC)
-- 지정한 컬럼을 기준으로 순위를 매겨서 반환
-- 동일한 순위가 있으면 동일한 순위를 부여
-- 예) 1,1,3,4,5,5,5,8
SELECT
	emp_no
	,salary
	,RANK() OVER(ORDER BY salary DESC) AS sal_rank
	FROM salaries
WHERE to_date >= NOW()
LIMIT 5
;

-- ROW_NUMBER() OVER(ORDER BY 속성명 DESC/ASC)
-- 동일한 값이 있더라도 각 행에 고유한 번호를 부여
-- 예) 1,2,3,4,5,6
SELECT
	emp_no, salary,ROW_NUMBER() OVER(ORDER BY salary DESC) sal_rown
	FROM salaries
	WHERE to_date >=NOW()
	LIMIT 5;