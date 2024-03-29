CREATE DATABASE just_do_it;

USE just_do_it;
CREATE TABLE users(
	user_no			INT				PRIMARY KEY AUTO_INCREMENT
	,user_name		VARCHAR(50)		NOT NULL	
	,user_id			VARCHAR(20)		NOT NULL UNIQUE	
	,user_pw			VARCHAR(30)		NOT NULL	
	,user_email		VARCHAR(50) 	NOT NULL 			
	,birth_date		DATE				NOT NULL	
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME		
	);
	
CREATE TABLE boards (
	board_no			INT				AUTO_INCREMENT PRIMARY key
	,user_no			INT				NOT NULL	
	,title			VARCHAR(50)		NOT NULL	
	,content			VARCHAR(1000)	NOT NULL	
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME		
	,task				INT				NOT NULL DEFAULT	0		COMMENT  'if task=0=uncompleted, task=1=completed'
	,FOREIGN KEY (user_no) REFERENCES users(user_no)	
);

INSERT users(user_name, user_id, user_pw, user_email, birth_date)
VALUE 
	('노경호','simple0714','123123123','simple_0714@naver.com',19980714)
	,('녹용호','gh980714','123123123','gh980714@naver.com',19980714)
	,('홍길동','hong123','123123123','hong@naver.com',20000101)
	,('밍기뉴','mong123','123123123','ming@naver.com',20020324)
	;

INSERT boards (user_no, title, content, task)
VALUE
	('1','첫 테스트 글입니다.','집에서 편하게 투모니터로 하고싶어요. 왜 강사님 혼자 모니터 두개 써요 ㅠㅠ',0)
	,('1','두번째  테스트 글입니다.','집에서 편하게 투모니터로 하고싶어요. 왜 강사님 혼자 모니터 두개 써요 ㅠㅠ',0)
	,('1','세번째  테스트 글입니다.','집에서 편하게 투모니터로 하고싶어요. 왜 강사님 혼자 모니터 두개 써요 ㅠㅠ',0)
	,('1','네번째  테스트 글입니다.','집에서 편하게 투모니터로 하고싶어요. 왜 강사님 혼자 모니터 두개 써요 ㅠㅠ',0)
	,('1','다섯번째  테스트 글입니다.','집에서 편하게 투모니터로 하고싶어요. 왜 강사님 혼자 모니터 두개 써요 ㅠㅠ',0)
;