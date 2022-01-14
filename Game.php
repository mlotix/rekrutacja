<?php
class Game {
    private int $number;
    private int $invalid = 0;
    private array $words;

    public function __construct(array $words = ['Foo', 'Bar', 'Baz']) {
        $this->words = $words;
    }

    private function isNumberValid(int $number) {
        if($number > 1000 || $number < 1) 
            return false;

        return true;
    }
    public function setNumber(int $a) {
        if($this->isNumberValid($a)) {
            $this->number = $a;
            return true;
        }
        //$this->setInvalid++;
        return false;
    }
    public function getNumber() {
        return $this->number;
    }

    public function setInvalid(int $invalid) {
        $this->invalid = $invalid;
    }
    public function increaseInvalid() {
        $this->invalid++;
    }
    public function getInvalid() {
        return $this->invalid;
    }
}



?>