<?php

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
$a = $obj_shark->breathe();
$b = $obj_shark->swim("검은수염 ");


