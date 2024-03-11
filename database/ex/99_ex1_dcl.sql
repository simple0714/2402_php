-- 계정 및 권한 관리

-- 권한 확인
USE mysql;
SELECT *
FROM USER
;

-- 혹은 
SELECT * 
FROM mysql.user
;


-- 계정 생성
create USER 'user1'@'localhost' IDENTIFIED BY 'user1'

-- 계정에 권한 부여
GRANT SELECT, INSERT, UPDATE, DELETE  
ON employees.*
TO 'user1'@'localhost'
;

-- 권한 삭제
REVOKE INSERT, UPDATE, DELETE
ON employees.*
FROM 'user1'@'localhost'
;


-- 계정 삭제
DROP USER 'user1'@'localhost';