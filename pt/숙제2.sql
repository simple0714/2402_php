--  1. 탈퇴한 회원의 정보를 출력해 주세요.

SELECT id AS 퇴사자
FROM users
WHERE deleted_at IS NOT NULL
;

-- 2. 삭제 되지 않은 게시글을 조회수가 높은 순서(조회수가 같을 경우 작성일이 최신순으로)대로 출력해 주세요.

SELECT id, title
FROM boards
WHERE deleted_at IS NULL 
ORDER BY views DESC, created_at DESC
;

-- 3. 찜한 게시글이 3개 이상인 회원의 번호를 출력해 주세요.

SELECT user_id
FROM wishlists
GROUP BY user_id
HAVING COUNT(user_id) >= 3
;

-- 4. 이메일이 'test_35@green.com'인 회원가 작성한 게시글의 정보를 수정일자가 최신순으로 출력해 주세요.

SELECT board.user_id, board.title, board.content, board.views
FROM boards board
	JOIN users users
	ON board.id = users.id
	AND users.email = 'test_35@green.com'
ORDER BY board.updated_at DESC
;

-- 5. 탈퇴한 회원이 작성했던 게시글의 pk를 출력해 주세요.

SELECT board.id
FROM boards board
	JOIN users users
	ON board.user_id = users.id
	AND users.deleted_at IS NOT NULL 
;

-- 6. 이름이 '사람_173'이 작성한 게시글과 찜목록을 모두 삭제처리 해주세요.

DELETE wishlists
FROM wishlists
	JOIN users
	ON wishlists.user_id = users.id
	AND users.name = '사람_173'
;

SELECT wish.id
FROM wishlists wish
	JOIN users
	ON wish.user_id = users.id
	AND users.name = '사람_173'
	;
	
	
DELETE users
FROM users
WHERE users.name = '사람_173'
;
 
 
DELETE boards
FROM boards
	JOIN users 
		ON boards.user_id = users.id
WHERE users.name = '사람_173'
;


DELIMITER $$
CREATE TRIGGER trigger_user_info
BEFORE DELETE 
ON users
FOR EACH ROW 
BEGIN
	DELETE FROM boards WHERE boards.user_id = users.id;
END $$
DELIMITER ; 

DELETE FROM users WHERE users.name = '사람_173' ;
-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.


-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.