<?php
try {
    $dbHost = "localhost";      // 호스트 주소(localhost, 120.0.0.1)
    $dbName = "dbname";      // 데이타 베이스(DataBase) 이름
    $dbUser = "id";          // DB 아이디
    $dbPass = "password";        // DB 패스워드

    // PDO 연결하기
    $db = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass); //mySQL conneting

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}

class Pagination {
  	
    //클래스 내부에서 하단 페이지넘버 처리에 필요한 변수
    private
    $page,
    $total_page,
    $first_page,
    $last_page,
    $prev_page,
    $next_page,
    $total_block,
    $next_block,
    $next_block_page,
    $prev_block,
    $prev_block_page,
    $PHP_SELF = "현재페이지 경로";
    //설정에서 register_globals=Off 인 경우에 $PHP_SELF 수퍼변수는 동작하지 않기때문에 경로를 지정해주는것이 좋다.
	
    //클래스 외부에서 필요한 변수
    public
    $limit_idx,
    $page_set;
      
    //페이지 줄수, 블럭수, 데이터베이스이름을 받아 데이터 정리
    public function __construct($pg, $bl, $dbName) {
        
        //외부 데이터베이스 접속정보 선언
        global $db;

        $this->page_set = $pg; // 한페이지 줄수
        $block_set = $bl; // 한페이지 블럭수
        $query = 'SELECT count(id) AS total FROM ' . $dbName;
 
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result['total']; // 전체글수
    
        $this->total_page = ceil($total / $this->page_set); // 총페이지수(올림함수)
        $this->total_block = ceil($this->total_page / $block_set); // 총블럭수(올림함수)
    
        $this->page = ($_GET['pg']) ? $_GET['pg'] : 1; //파라미터로 현재 페이지정보를 받아옴
        $block = ceil($this->page/$block_set); // 현재블럭(올림함수)
        $this->limit_idx = ($this->page - 1) * $this->page_set; // limit시작위치
    
        $this->first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
        $this->last_page = min ($this->total_page, $block * $block_set); // 마지막 페이지번호
   
        $this->prev_page = $this->page - 1; // 이전페이지
        $this->next_page = $this->page + 1; // 다음페이지
    
        $this->prev_block = $block - 1; // 이전블럭
        $this->next_block = $block + 1; // 다음블럭
    
        // 이전블럭을 블럭의 마지막으로 하려면...
        $this->prev_block_page = $this->prev_block * $block_set; // 이전블럭 페이지번호    
    
        // 이전블럭을 블럭의 첫페이지로 하려면...
        //$prev_block_page = $prev_block * $block_set - ($block_set - 1);
    
        $this->next_block_page = $this->next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호
        
    }
    
    //하단 페이지 넘버링
    public function BottomPageNumber(){
      
        echo ($this->prev_page > 0) ? "<a href='$this->PHP_SELF&pg=$this->prev_page'>[prev]</a> " : "[prev] ";
        echo ($this->prev_block > 0) ? "<a href='$this->PHP_SELF&pg=$this->prev_block_page'>...</a> " : "... ";

        for ($i=$this->first_page; $i<=$this->last_page; $i++) {

            echo ($i != $this->page) ? "<a href='$this->PHP_SELF&pg=$i'>$i</a> " : "<b>$i</b> ";

        }

        echo ($this->next_block <= $this->total_block) ? "<a href='$this->PHP_SELF&pg=$this->next_block_page'>...</a> " : "... ";
        echo ($this->next_page <= $this->total_page) ? "<a href='$this->PHP_SELF&pg=$this->next_page'>[next]</a>" : "[next]";
                    
    }

}