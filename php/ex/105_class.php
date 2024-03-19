<?php
// class : 동종의 객체들을 모아 정의한 것
//관습적으로 class명과 파일명을 동일하게 짓는다.
class Whale {
    //프로퍼티.
    //접근 제어 지시자
    //public : class 외부, 내부 어디서나 접근 가능
    public $str;
    //private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;
    //protected : class 내부에서만 접근 가능, 외부는 접근 불가능, 단 상속 관계에서는 접근이 가능
    protected $boo;

    private $name; 

    //생성자 메소드(무조건 public으로 만들어야 한다. __construct도 고정이다.)
    public function __construct($name) {
        $this ->name = $name;
        //$this : class내의 프로퍼티, 메소드에 접근하기 위해 사용
    }

    //getter / setter : private이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    //메소드
    public function swim($opt) {
        echo $opt.$this->name." 헤엄칩니다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡한다.\n";
    }

    //static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    public static function big() {
        echo "매우 크다";
    }
}

//클래스 인스턴스 생성 (swim 메소드 사용법)
// $obj_whale = new Whale("고래");
// $obj_whale->swim("흰 수염 "); //관습적으로 띄워쓰기를 하지 않음
// //불러올 수 있는 이유는 swim메소드가 public 프로퍼티이기 때문이다.
// echo $obj_whale->getName()."\n";
// $obj_whale->breathe();

// $obj_whale->setName("참새");
// $obj_whale->swim("흰 수염");
// $obj_whale->breathe();

// shark 클래스 만들어 주세요.
// 프로퍼티 : private $name
// 메소드 : public swim, piblic breathe

class Shark{
    private $name;

    public function __construct($name) {
        $this->name=$name;
    }
    public function swim($opt) {
        echo $opt.$this->name." 헤엄칩니다.\n";
    }
    public function breathe(){
        echo $this->name." 호흡합니다.\n";
    }
}

$obj_shark = new Shark("상어");
$obj_shark->breathe();
$obj_shark->swim("검은수염 ");

Whale::big();