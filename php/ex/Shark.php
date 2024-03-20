<?php
namespace php\ex;

class Shark{
    private $name;

    public function __construct($name) {
        $this->name=$name;
    }
    public function swim() {
        echo $this->name." 헤엄칩니다.\n";
    }
    public function breathe(){
        echo $this->name." 호흡합니다.\n";
    }
}