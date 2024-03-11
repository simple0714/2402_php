-- INDEX
-- 데이터베이스 테이블에 색인을 추가해 '검색 성능'의 속도를 높여주는 기능
-- " B+tree" 개념 찾아보기
-- 장점 : 테이블을 조회하는 속도와 그에 따른 성능 향상, 시스템의 부하 감소
-- 단점 : DB의 약10%에 해당하는 추가 저장공간이 필요, 추가작업이 필요, 관리 미흡시 오히려 속도 저하

-- INSERT, UPDATE, DELETE가 빈번하게 일어나는 테이블은 주의해야 한다.
-- 검색하고자 하는 데이터가 테이블의 10~15%이하 일 경우가 가장 효과적이다.
--  속도향상을 위해선 쿼리를 효율적으로 짜는 것이 우선, INDEX는 최후의 수단
-- *INDEX를 추가햇다면 대량의 데이터로 해당 테이블의 CRUD를 테스트해야 한다.
-- (CRUD : create, readung, update, delete)
-- *사용하지 않는 인데스는 제거, fk를 지정한 열은 자동으로 fk index가 생성
-- (DBMS에 따라 상이함으로 주의)

-- INDEX를 사용하기 좋은 상황
-- 규모가 작지 않은 테이블, INSERT, UPDATE, DELETE가 자주 발생하지 않는 컬럼
-- JOIN이나 WHERE 또는 ORDER BY에 자주 사용되는 컬럼, 데이터의 중복도가 낮은 컬럼
-- 보통 이름, 주민번호등에 사용한다. 


-- INDEX 확인
SHOW INDEX 
FROM employees;

SHOW INDEX
FROM titles;

-- INDEX 생성 전 검색 소요 시간 : 0.156 초
SELECT *
FROM employees
WHERE first_name = 'Saniya';
-- INDEX 생성 후 검색 소요 시간 : 0.016초

-- INDEX 생성
ALTER TABLE employees
ADD INDEX idx_employees_first_name (first_name)
;

-- INDEX 제거
DROP INDEX idx_employees_first_name
ON employees 
;