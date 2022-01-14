<?php
class Game {
    private int $number;
    private int $invalid = 0;
    private array $words;

    public function __construct( array $words = array('Foo', 'Bar', 'Baz') ) {
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
        return false;
    }
    final public function getNumber() {
        return $this->number;
    }

    public function setInvalid(int $invalid) {
        $this->invalid = $invalid;
    }
    public function increaseInvalid() {
        $this->invalid++;
    }
    final public function getInvalid() {
        return $this->invalid;
    }


    final public function getWords() {
        return $this->words;
    }
    private function countWords() {
        return sizeof($this->getWords());
    }
    public function printWords() {
        $result = "";
        $words = $this->getWords();
        
        foreach($words as $word) {
            $result .= $word . " ";
        }
        return trim($result);
    }



    private function isNumberOne() {
        if( $this->getNumber() === 1 ) 
            return true;

        return false;
    }
    
    private function isNumberPrime() {
        if($this->isNumberOne()) 
            return false;

        $n = $this->getNumber();

        for($i = 2; $i*$i <= $n; $i++) {
            if( $n%$i === 0 ) 
                return false;
        }
        return true;
    }
    private function isDividedBy(int $value) {
        if( $this->getNumber() % $value === 0 )
            return true;

        return false;
    }


    public function getResponseToDisplay() {
        $words = $this->getWords();
        if($this->isNumberOne()) {
            return $words[0];

        } else if ($this->isNumberPrime()){
            return $this->printWords();

        }
        $result = "";
        
        for($i = 2; $i <= $this->countWords(); $i++ ) {
            if( $this->isDividedBy($i) )
                $result .= $words[$i - 1] . " "; 
        }

        return trim($result);
    }
}



?>