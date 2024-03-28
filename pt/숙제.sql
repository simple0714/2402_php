CREATE DATABASE NEW;

-- 1번 문제
CREATE TABLE users (
    id                     	INT                     	AUTO_INCREMENT PRIMARY KEY
    ,NAME                 		VARCHAR(50)         			NOT NULL
    ,email                 	VARCHAR(100)         		NOT NULL UNIQUE
    ,created_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE
    ,updated_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE
    ,deleted_at         		DATE
);
-- boards 테이블
CREATE TABLE boards (
    id                     	INT                    		AUTO_INCREMENT PRIMARY KEY
    ,user_id             		INT
    ,title                 	VARCHAR(100)         		NOT NULL
    ,content                	VARCHAR(1000)         		NOT NULL
    ,created_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE
    ,updated_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE
    ,deleted_at         		DATE
    ,FOREIGN KEY (user_id) REFERENCES users(id)
);
-- wishlists 테이블
CREATE TABLE wishlists (
    id                     	INT                 			AUTO_INCREMENT PRIMARY KEY
    ,user_id             		INT
    ,board_id             		INT
    ,created_at         		DATE                 		NOT NULL DEFAULT CURRENT_DATE
    ,updated_at         		DATE                 		NOT NULL DEFAULT CURRENT_DATE
    ,deleted_at         		DATE
    ,FOREIGN KEY (user_id) REFERENCES users(id)
    ,FOREIGN KEY (board_id) REFERENCES boards(id)
);

ALTER TABLE boards ADD CONSTRAINT fk_boards_user_id FOREIGN KEY(user_id) REFERENCES users(id);
ALTER TABLE wishlists ADD CONSTRAINT fk_wishlists_user_id FOREIGN KEY(user_id) REFERENCES users(id);
ALTER TABLE wishlists ADD CONSTRAINT fk_wishlists_board_id FOREIGN KEY(board_id) REFERENCES boards(id);

-- 2번 문제
ALTER TABLE boards ADD COLUMN views INT NOT NULL DEFAULT 0;

-- 3번 문제
INSERT INTO users (name, email) 
VALUES
('홍길동', '123@naver.com')
,('갑돌이', '456@naver.com')
,('갑순이', '789@naver.com')
;


-- 4번 문제 
-- boards 테이블에 아래 데이터 작성
-- 	홍길동 유저가 작성한 글 4개
-- 	갑돌이 유저가 작성한 글 3개
-- 	갑순이 유저가 작성한 글 2개

INSERT INTO boards (user_id, title, content)
VALUES 
(1, '홍길동의 글-1','홍길동의 글-1')
,(1, '홍길동의 글-2', '홍길동의 글-2')
,(1, '홍길동의 글-3', '홍길동의 글-3')
,(1, '홍길동의 글-4', '홍길동의 글-4')
,(2, '갑돌이의 글-1', '갑돌이의 글-1')
,(2, '갑돌이의 글-2', '갑돌이의 글-2')
,(2, '갑돌이의 글-3', '갑돌이의 글-3')
,(3, '갑순이의 글-1', '갑돌이의 글-1')
,(3, '갑순이의 글-2', '갑돌이의 글-2')
;

-- 5번 문제
INSERT INTO wishlists (user_id, board_id)
VALUES
(1,5)
,(1,6)
,(2,1)
,(2,2)
,(2,3)
,(2,4)
,(2,6)
,(3,1)
,(3,2)
,(3,3)
,(3,4)
,(3,5)
,(3,6)
,(3,7)
,(3,8)
,(3,9)
;
	

-- 6번 문제
UPDATE users
SET 
	deleted_at = DATE(NOW())
WHERE id = 1
;

-- 7번 문제
DROP TABLE wishlists;

-- 8번 문제
DROP DATABASE NEW;