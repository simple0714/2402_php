-- 뷰(VIEW)
-- 가상 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해서 사용
-- 장점 : 복잡한 SQL을 편하게 조회 할 수 있다. 보안에 도움이 된다.
-- 암호화된 테이블을 view로 만들 때 암호화된 정보를 복호화해서  가지고 올 수 있다.
-- view를 select 하는 계정의 권한에 따라 조절이 가능해서 보안 편의성이 좋다.

-- 단점 : INDEX를 사용할 수 없어 조회 속도가 느리다. 따라서 
-- 사용빈도가 낮은 (개발자들이 사용하는) 곳에 뷰를 만들어 둔다.

-- 사원의 사번, 생년월일, 이름, 성, 성별, 입사일, 현재급여, 현재 직책을 출력.
SELECT
	emp.emp_no
	,emp.birth_date
	,CONCAT (emp.first_name, ' ', emp.last_name)
	,emp.gender
	,emp.hire_date
	,sal.salary
	,tit.title
FROM employees  emp
	JOIN salaries sal
		ON sal.emp_no = emp.emp_no
	JOIN titles tit
		ON tit.emp_no = emp.emp_no
WHERE sal.to_date >= NOW()
		AND tit.to_date >= NOW()
;


-- 위의 쿼리를 뷰로 작성
CREATE VIEW view_emp_info
AS 
	SELECT
		emp.emp_no
		,emp.birth_date
		,CONCAT (emp.first_name, ' ', emp.last_name)
		,emp.gender
		,emp.hire_date
		,sal.salary
		,tit.title
	FROM employees  emp
		JOIN salaries sal
			ON sal.emp_no = emp.emp_no
		JOIN titles tit
			ON tit.emp_no = emp.emp_no
	WHERE sal.to_date >= NOW()
			AND tit.to_date >= NOW()
;


SELECT *
FROM view_emp_info
;

-- view에는 index를 사용할 수 없어서 속도가 느림
-- view에 where조건문이 붙으면 속도가 느려짐
-- 따라서 자주 사용하지 않는(주로 개발자들이 가끔 사용하는) 곳에 view를 만든다. 집에 가곳피다.