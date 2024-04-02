-- 같이 푸는 숙제~

-- 1. 탈퇴한 회원의 정보를 출력해 주세요.
SELECT *
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
SELECT board.*
FROM boards board
	JOIN users 
	ON board.user_id = users.id
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
UPDATE boards 
SET 
	deleted_at = NOW()	
WHERE user_id IN (SELECT id FROM users WHERE NAME = '사람_173')
;
-- 동명이인이 있을 수 있기 때문에 '='이 아닌 IN을 사용한다
UPDATE wishlists
SET
	deleted_at = NOW()
WHERE user_id IN (SELECT id FROM users WHERE NAME = '사람_173')
;

-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.
UPDATE boards
SET
	deleted_at = NOW()
WHERE user_id IN (SELECT id FROM users WHERE deleted_at IS NOT NULL)
;

-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.
SELECT 
	boards.title
	,boards.content
FROM boards
	JOIN users
	ON	boards.user_id = users.id
;




SELECT	
	boards.title
	,boards.content
FROM users
	JOIN wishlists
		ON users.id = wishlists.user_id
		AND users.created_at >= 20200101000000
	JOIN boards
		ON wishlists.board_id = boards.id
; 