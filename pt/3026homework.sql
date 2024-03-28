CREATE TABLE users (
    id                     INT                     	AUTO_INCREMENT PRIMARY KEY,
    NAME                 	VARCHAR(50)         			NOT NULL,
    email                 	VARCHAR(100)         		NOT NULL UNIQUE,
    created_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE,
    updated_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE,
    deleted_at         		DATE
);

-- boards 테이블 
CREATE TABLE boards (
    id                     INT                    		AUTO_INCREMENT PRIMARY KEY,
    user_id             	INT,
    title                 	VARCHAR(100)         		NOT NULL,
    content                VARCHAR(1000)         		NOT NULL,
    created_at         		DATE                     	NOT NULL DEFAULT CURRENT_DATE,
    updated_at        		DATE                     	NOT NULL DEFAULT CURRENT_DATE,
    deleted_at        		DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- wishlists 테이블 
CREATE TABLE wishlists (
    id                     INT                 AUTO_INCREMENT PRIMARY KEY,
    user_id             	INT,
    board_id             	INT,
    created_at         		DATE                 NOT NULL DEFAULT CURRENT_DATE,
    updated_at         		DATE                 NOT NULL DEFAULT CURRENT_DATE,
    deleted_at        		DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (board_id) REFERENCES boards(id)
);

-- 2.  boards 테이블에 아래 컬럼을 추가
--     views        INT        NULL
ALTER TABLE boards ADD COLUMN views INT;


-- 3. users 테이블에 아래 3명의 정보를 작성
-- 	- 홍길동, 갑돌이, 갑순이

INSERT INTO users (name, email) 
VALUES ('홍길동', '123@naver.com')
		,('갑돌이', '456@naver.com')
		,('갑순이', '789@naver.com')
;

-- 4. boards 테이블에 아래 데이터 작성
-- 	- 홍길동 유저가 작성한 글 4개
-- 	- 갑돌이 유저가 작성한 글 3개
-- 	- 갑순이 유저가 작성한 글 2개
INSERT INTO boards (user_id, title, content)
SELECT 1, ' 홍길동', ' 나 길동인디' 
FROM users
WHERE NAME = '홍길동'
;

-- 5. wishlists 테이블에 아래 데이터 작성
-- 	- 홍길동 유저가 찜한 글 2개
-- 	- 갑돌이 유저가 찜한 글 5개
-- 	- 갑순이 유저가 찜한 글 9개


-- 6. 홍길동 유저의 탈퇴 처리


-- 7. wishlists의 모든 데이터 물리적 삭제


-- 8. 모든 테이블 제거


















SHOW VARIABLES LIKE 'character_set_database';
SHOW VARIABLES LIKE 'character_set_database';
SHOW VARIABLES WHERE Variable_Name LIKE "%dir"


ALTER DATABASE test CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;
ALTER TABLE boards CONVERT TO CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;
ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;
ALTER TABLE wishlists CONVERT TO CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI;
ALTER TABLE test MODIFY your_column_name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci;